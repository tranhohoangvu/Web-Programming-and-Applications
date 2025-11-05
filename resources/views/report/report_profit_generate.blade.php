<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem lợi nhuận</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .card-header {
            background-color: #008c28;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
        }
        body {
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #008c28;
            color: #fff;
        }
        .card {
            margin-top: 100px;
            /* margin-bottom: 200px; */
        }
        label {
            font-weight: bold;
        }
        footer {
            background-color: #008c28;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            flex-shrink: 0; /* Không co giãn footer khi nội dung quá ít */
        }
        footer h5 {
            margin-bottom: 20px;
        }
        footer p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container my-3">   
                <div>
                    @if (auth()->user()->vaitro)
                        <a class="navbar-brand fw-bold fs-2 text-light" href="{{ route('dashboard.index') }}">ANKHANG STORE</a>
                    @else 
                        <a class="navbar-brand fw-bold fs-2 text-light" href="{{ route('dashboard.nhanvien') }}">ANKHANG STORE</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">XEM LỢI NHUẬN</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('report.profit') }}" id="profitForm">
                            <div class="form-group">
                                <label for="time_period" class="mb-2">Khoảng thời gian:</label>
                                <select class="form-control" id="time_period" name="time_period">
                                    <option value="" selected>Chọn khoảng thời gian</option>
                                    <option value="month">Tháng</option>
                                    <option value="year">Năm</option>
                                </select>
                            </div>

                            <div class="form-group" id="choose-month" style="display: none;">
                                <div class="row">
                                    <div class="my-2">
                                        <label for="month" class="mb-2">Tháng:</label>
                                        <input type="month" class="form-control" id="month" name="month">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="choose-year" style="display: none;">
                                <div class="row">
                                    <div class="my-2">
                                        <label for="year" class="mb-2">Năm:</label>
                                        <input type="number" class="form-control" id="year" name="year" min="1900" max="2100" step="1" value="{{ date('Y') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid justify-content-center">
                                <div>
                                    <button type="reset" class="btn btn-secondary mt-3" id="resetBtn">Làm mới</button>
                                    <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Xem lợi nhuận</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container mt-auto">
            <div class="row">
                <div class="col-md-4">
                    <h5>ANKHANG STORE</h5>
                    <p>Trụ sở: Tầng 6 - Tòa nhà LandMark81 - Quận 1 - TP.HCM</p>
                    <p>Chi nhánh: Tầng 5 - Tòa nhà DEPZAI - Quận 1 - Hà Nội</p>
                </div>
                <div class="col-md-4">
                    <h5>Tổng đài hỗ trợ</h5>
                    <p>Tư vấn dịch vụ: 1800 1234</p>
                    <p>Email hỗ trợ: support@ankhangstore.vn</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ với chúng tôi</h5>
                    <p>Facebook: fb.com/ankhangstore</p>
                    <p>Instagram: @ankhangstore</p>
                </div>
            </div>
        </div>
    </footer>
</body>
    <script>
        $(document).ready(function() {
            $('#time_period').change(function() {
                if ($(this).val() === 'month') {
                    $('#choose-month').show();
                } else {
                    $('#choose-month').hide();
                }
                if ($(this).val() === 'year') {
                    $('#choose-year').show();
                } else {
                    $('#choose-year').hide();
                }
            });

            $('#resetBtn').click(function() {
                $('#choose-year').hide();
                $('#choose-month').hide();
            });

            // Disable submit button if no time period selected
            $('#submitBtn').click(function() {
                var timePeriod = $('#time_period').val();
                var month = $('#month').val();
                var year = $('#year').val();
                if (timePeriod === 'month' && !month) {
                    alert('Vui lòng chọn tháng!');
                    return false;
                } else if (timePeriod === 'year' && !year) {
                    alert('Vui lòng chọn năm!');
                    return false;
                } else if (!timePeriod) {
                    alert('Vui lòng chọn khoảng thời gian!');
                    return false;
                } else {
                    $('#profitForm').submit();
                }
            });
        });
    </script>
</html>
