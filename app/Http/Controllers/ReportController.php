<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\SanPham;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Lấy giá trị từ request
        $timePeriod = $request->input('time_period');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Thiết lập khoảng thời gian dựa trên lựa chọn của người dùng
        switch ($timePeriod) {
            case 'today':
                $startDate = Carbon::today()->toDateString();
                $endDate = Carbon::today()->toDateString();
                break;
            case 'yesterday':
                $startDate = Carbon::yesterday()->toDateString();
                $endDate = Carbon::yesterday()->toDateString();
                break;
            case 'last_7_days':
                $startDate = Carbon::today()->subDays(6)->toDateString();
                $endDate = Carbon::today()->toDateString();
                break;
            case 'this_month':
                $startDate = Carbon::today()->startOfMonth()->toDateString();
                $endDate = Carbon::today()->endOfMonth()->toDateString();
                break;
        }

        // Lấy danh sách đơn hàng trong khoảng thời gian
        $donHangs = DonHang::whereBetween('NgayDatHang', [$startDate, $endDate])
            ->orderBy('NgayDatHang')
            ->get();

        // Tính tổng tiền và số lượng đơn hàng
        $tongTien = $donHangs->sum('tongtien');
        $soLuongDonHang = $donHangs->count();

        // Tính tổng số lượng sản phẩm đã bán trong khoảng thời gian
        $soLuongSanPham = DB::table('chitietdonhang')
            ->join('donhang', 'chitietdonhang.MaHD', '=', 'donhang.MaHD')
            ->whereBetween('donhang.NgayDatHang', [$startDate, $endDate])
            ->sum('SoLuong');

        // Trả về view với các giá trị đã tính toán
        return view('report.report_index', compact(
            'startDate',
            'endDate',
            'donHangs', 
            'tongTien', 
            'soLuongDonHang', 
            'soLuongSanPham'
        ));
    }

    public function generate()
    {
        return view('report.report_generate');
    }

    public function showProfit(Request $request)
    {
        // Lấy tháng và năm từ request
        $monthYear = $request->input('month');

        if ($request->input('time_period') === 'year') {
            // Trường hợp chỉ chọn năm
            $year = $request->input('year');

            // Lấy danh sách đơn hàng trong khoảng thời gian
            $donHangs = DonHang::whereYear('NgayDatHang', $year)
                ->orderBy('NgayDatHang')
                ->get();
        } else {
            // Trường hợp chọn cả tháng và năm
            $month = date('m', strtotime($monthYear));
            $year = date('Y', strtotime($monthYear));

            // Lấy danh sách đơn hàng trong khoảng thời gian
            $donHangs = DonHang::whereYear('NgayDatHang', $year)
                ->whereMonth('NgayDatHang', $month)
                ->orderBy('NgayDatHang')
                ->get();
        }

        // Khởi tạo biến $month
        $month = isset($month) ? $month : null;

        // Tính toán các thông tin cần thiết
        $totalPurchaseCost = 0;
        $totalSalesRevenue = 0;
        $profit = 0;
        $soLuongDonHang = $donHangs->count();
        $soLuongSanPham = 0;
        $checkProfit = '';

        if ($donHangs->isNotEmpty()) {
            // Tính tổng chi phí nhập hàng
            $totalPurchaseCost = DB::table('sanpham')
                ->whereYear('ngaynhaphang', $year)
                ->when(isset($month), function ($query) use ($month) {
                    return $query->whereMonth('ngaynhaphang', $month);
                })
                ->sum(DB::raw('gianhap * soLuongNhap'));

            // Tính tổng doanh thu bán hàng
            $totalSalesRevenue = DB::table('chitietdonhang')
                ->join('sanpham', 'chitietdonhang.MaSP', '=', 'sanpham.id')
                ->join('donhang', 'chitietdonhang.MaHD', '=', 'donhang.MaHD')
                ->whereYear('donhang.NgayDatHang', $year)
                ->when(isset($month), function ($query) use ($month) {
                    return $query->whereMonth('donhang.NgayDatHang', $month);
                })
                ->sum(DB::raw('sanpham.giaban * chitietdonhang.soLuong'));

            // Tính lợi nhuận
            $profit = $totalSalesRevenue - $totalPurchaseCost;

            // Tính tổng số lượng sản phẩm đã bán trong khoảng thời gian
            $soLuongSanPham = DB::table('chitietdonhang')
                ->join('donhang', 'chitietdonhang.MaHD', '=', 'donhang.MaHD')
                ->whereYear('donhang.NgayDatHang', $year)
                ->when(isset($month), function ($query) use ($month) {
                    return $query->whereMonth('donhang.NgayDatHang', $month);
                })
                ->sum('SoLuong');

            // Kiểm tra lợi nhuận
            if ($profit > 0) {
                $checkProfit = 'Lợi nhuận dương -> Đã phát sinh lời!';
            } elseif ($profit < 0) {
                $checkProfit = 'Lợi nhuận âm -> Chưa phát sinh lời!';
            } else {
                $checkProfit = 'Lợi nhuận bằng 0 -> Hòa vốn';
            }
        }

        // Trả về view với các giá trị đã tính toán
        return view('report.report_profit', compact(
            'monthYear',
            'donHangs',
            'soLuongDonHang',
            'soLuongSanPham',
            'totalPurchaseCost',
            'totalSalesRevenue',
            'profit',
            'checkProfit',
            'month' // Thêm biến $month vào danh sách truyền vào view
        ));
    }
}