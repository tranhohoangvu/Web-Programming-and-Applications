<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\Employee;
use App\Models\SanPham;
use App\Models\KhachHang;
// use Dompdf\Dompdf;

use Barryvdh\DomPDF\Facade\Pdf; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'TenNhanVien' => 'required|exists:employees,id',
        ]);

        // Lấy danh sách sản phẩm và số lượng từ request
        $productNames = $request->input('products');
        $quantities = $request->input('quantities');
        $soTienKhachDua = $request->input('soTienKhachDua');

        // Kiểm tra nếu không có sản phẩm nào được thêm vào
        // if (empty($productNames) || empty($quantities) || empty($soTienKhachDua) || empty($request->input('MaHD')) || empty($request->input('MaKhachHang')) || empty($request->input('TenKhachHang')) || empty($request->input('phoneNumber')) || empty($request->input('NgayDatHang')) || empty($request->input('GioDatHang')) || empty($request->input('diaChi')) || empty($request->input('PhuongThucThanhToan')) || empty($request->input('TenNhanVien'))) {
        if (empty($productNames) || empty($quantities)) {
            return redirect()->route('new.order.form')->with('error', 'Vui lòng thêm ít nhất một sản phẩm vào đơn hàng!');
        }

        // Tạo mảng để lưu ID của các sản phẩm dựa trên tên sản phẩm
        $productIds = [];
        foreach ($productNames as $productName) {
            $product = SanPham::where('tensanpham', $productName)->first();
            if ($product) {
                $productIds[] = $product->id;
            }   
        }

        // Kiểm tra số lượng còn lại của từng sản phẩm và cập nhật số lượng
        foreach ($productIds as $index => $productId) {
            $product = SanPham::find($productId);
            if ($product->soLuongConLai < $quantities[$index]) {
                return redirect()->route('new.order.form')->with('error', 'Không đủ số lượng cho sản phẩm ' . $product->tensanpham);
            }

            // Cập nhật số lượng còn lại của sản phẩm
            $product->soLuongConLai -= $quantities[$index];
            $product->trangthai = true;
            $product->save();
        }   

        // Calculate total amount of the order
        $totalAmount = 0;
        foreach ($productIds as $index => $productId) {
            $product = SanPham::find($productId);
            $totalAmount += $product->giaban * $quantities[$index];
        }

        // Tính số tiền cần trả lại khách và lưu vào cột soTienTraLaiKhach của bảng ChiTietDonHang
        $changeAmount = 0;
        if ($soTienKhachDua >= $totalAmount) {
            $changeAmount = $soTienKhachDua - $totalAmount;
        } else {
            return redirect()->route('new.order.form')->with('error', 'Số tiền khách đưa không đủ để thanh toán!');
        }

        $phoneNumber = $request->input('phoneNumber');
        $customer = KhachHang::where('soDienThoai', $phoneNumber)->first();

        if (!$customer) {
            $customer = new KhachHang();
            $customer->MaKhachHang = $request->input('MaKhachHang');
            $customer->TenKhachHang = $request->input('TenKhachHang');
            $customer->soDienThoai = $phoneNumber;
            $customer->ngaysinh = $request->input('ngaysinh');
            $customer->diaChi = $request->input('diaChi');
            $customer->save();
        }

        // Tạo đối tượng mới cho đơn hàng
        $order = new DonHang();
        $order->MaHD = $request->input('MaHD');
        $order->MaKhachHang = $request->input('MaKhachHang');
        $order->TenKhachHang = $request->input('TenKhachHang');
        $order->soDienThoai = $request->input('phoneNumber');
        $order->NgayDatHang = $request->input('NgayDatHang');
        $order->GioDatHang = $request->input('GioDatHang');
        $order->diaChi = $request->input('diaChi');
        $order->PhuongThucThanhToan = $request->input('PhuongThucThanhToan');
        $order->tongtien = $totalAmount;
        $order->MANV = $validatedData['TenNhanVien'];
        $order->save();

        // Lưu thông tin chi tiết đơn hàng
        foreach ($productIds as $index => $productId) {
            $detail = new ChiTietDonHang();
            $detail->MaHD = $order->MaHD;
            $detail->MaSP = $productId;
            $detail->soLuong = $quantities[$index];
            $detail->soTienKhachDua = $soTienKhachDua;
            $detail->soTienTraLaiKhach = $changeAmount;
            $detail->save();
        }

        // Redirect to order history page with success message
        // return redirect()->route('confirm.order')->with('success', 'Đơn hàng đã được tạo thành công!');
        return redirect()->route('confirm.order');
    }

    public function confirmOrder($order_id)
    {
        // Retrieve the order details
        $order = DonHang::findOrFail($order_id);

        // Retrieve the corresponding order details
        $orderDetails = ChiTietDonHang::where('MaHD', $order->MaHD)->get();

        // Pass the order and order details to the view
        return view('order.confirm_order', [
            'order' => $order,
            'orderDetails' => $orderDetails
        ]);
    }

    public function showNewOrderForm()
    {
        $products = SanPham::all();
        $employees = Employee::all();
        return view('order.new_order_form', compact('products', 'employees'));
    }

    public function showOrderHistory()
    {
        $orders = DonHang::with('chiTietDonHangs')->get();
        return view('order.history_order', compact('orders'));
    }

    public function deleteOrder($id)
    {
        // Delete order and its details from the database
        DB::transaction(function () use ($id) {
            DonHang::where('id', $id)->delete();
            ChiTietDonHang::where('MaHD', $id)->delete();
        });

        // Return 200 OK if deletion is successful
        return response()->json(['message' => 'Đơn hàng đã được xóa thành công!'], 200);
    }   

    public function showOrderDetail($id)
    {
        $order = DonHang::with('chiTietDonHangs', 'khachHang')->find($id);
        if (!$order) {
            abort(404);
        }
        return view('order.order_detail', compact('order'));
    }

    public function showConfirmOrder()
    {
        // Lấy thông tin đơn hàng mới nhất từ database
        $order = DonHang::latest()->first();
        $detail = ChiTietDonHang::latest()->first();

        // Hiển thị giao diện xác nhận đặt hàng với thông tin đơn hàng mới nhất
        return view('order.confirm_order', compact('order', 'detail'));
    }

    public function cancelOrder($id)
    {
        // Delete order and its details from the database
        DB::transaction(function () use ($id) {
            DonHang::where('id', $id)->delete();
            ChiTietDonHang::where('MaHD', $id)->delete();
        });

        // Trả về thông báo thành công khi hủy đơn hàng
        return redirect()->route('new.order.form')->with('error', 'Đơn hàng đã được hủy thành công!');
    }

    public function generateMaHD()
    {
        $lastOrder = DonHang::orderBy('MaHD', 'desc')->first();
        if ($lastOrder) {
            $lastMaHD = $lastOrder->MaHD;
            $number = (int) substr($lastMaHD, 2) + 1;
            $newMaHD = 'AK' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            $newMaHD = 'AK001';
        }
        return response()->json(['newMaHD' => $newMaHD]);
    }

    public function generateMaKH()
    {
        $lastCustomer = KhachHang::orderBy('MaKhachHang', 'desc')->first();
        if ($lastCustomer) {
            $lastMaKH = $lastCustomer->MaKhachHang;
            $number = (int) substr($lastMaKH, 2) + 1;
            $newMaKH = 'KH' . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            $newMaKH = 'KH001';
        }
        return response()->json(['newMaKH' => $newMaKH]);
    }

    public function checkPhoneNumber(Request $request)
    {
        $phoneNumber = $request->query('phoneNumber');
        $customer = KhachHang::where('soDienThoai', $phoneNumber)->first();

        if ($customer) {
            return response()->json([
                'exists' => true,
                'customer' => [
                    'MaKH' => $customer->MaKhachHang,
                    'TenKH' => $customer->TenKhachHang,
                    'diaChi' => $customer->diaChi,
                    'ngaysinh' => $customer->ngaysinh
                ]
            ]);
        } else {
            return response()->json(['exists' => false]);
        }
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->input('keyword');

        // Thực hiện tìm kiếm sản phẩm theo từ khóa
        $products = SanPham::where('tensanpham', 'like', "%$keyword%")
                        ->orWhere('MaVach', 'like', "%$keyword%")
                        ->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json($products);
    }

    public function searchOrder(Request $request)
    {
        $searchOrderId = $request->input('searchOrderId');
        $searchCustomerName = $request->input('searchCustomerName');
        $searchOrderDate = $request->input('searchOrderDate');
        $searchEmployeeName = $request->input('searchEmployeeName');

        // Tìm kiếm đơn hàng dựa trên các điều kiện tìm kiếm
        $orders = DonHang::query()
            ->when($searchOrderId, function ($query) use ($searchOrderId) {
                return $query->where('MaHD', $searchOrderId);
            })
            ->when($searchCustomerName, function ($query) use ($searchCustomerName) {
                return $query->where('TenKhachHang', 'like', '%' . $searchCustomerName . '%');
            })
            ->when($searchOrderDate, function ($query) use ($searchOrderDate) {
                return $query->whereDate('NgayDatHang', $searchOrderDate);
            })
            ->whereHas('nhanVien', function ($query) use ($searchEmployeeName) {
                $query->where('hotendaydu', 'like', '%' . $searchEmployeeName . '%');
            })
            ->get();

        return view('order.history_order', ['orders' => $orders]);
    }
    
    public function details($orderId)
    {
        // Tìm đơn hàng theo ID
        $order = DonHang::find($orderId);

        // Lấy chi tiết đơn hàng
        $orderDetails = ChiTietDonHang::where('MaHD', $order->MaHD)->get();

        // Truyền dữ liệu tới view
        return view('details', compact('order', 'orderDetails'));
    }

    public function exportPDF($orderId)
    {
        // Lấy thông tin đơn hàng từ ID
        $order = DonHang::findOrFail($orderId);

        // Load view và truyền dữ liệu đơn hàng vào
        $pdf = PDF::loadView('order.order_invoice_pdf', compact('order'))->setOptions(['defaultFont' => 'sans-serif']);

        // Mở file PDF trong một tab mới
        return $pdf->stream('invoice.pdf');
    }
}