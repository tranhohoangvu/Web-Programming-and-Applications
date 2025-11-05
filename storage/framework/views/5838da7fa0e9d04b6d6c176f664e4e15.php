<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo báo cáo</title>
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
                    <?php if(auth()->user()->vaitro): ?>
                        <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('dashboard.index')); ?>">ANKHANG STORE</a>
                    <?php else: ?> 
                        <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('dashboard.nhanvien')); ?>">ANKHANG STORE</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">TẠO BÁO CÁO</div>

                    <div class="card-body">
                        <form method="GET" action="<?php echo e(route('report.index')); ?>" id="reportForm">
                            <div class="form-group">
                                <label for="time_period" class="mb-2">Khoảng thời gian:</label>
                                <select class="form-control" id="time_period" name="time_period">
                                    <option value="" selected>Chọn khoảng thời gian</option>
                                    <option value="today">Hôm nay</option>
                                    <option value="yesterday">Hôm qua</option>
                                    <option value="last_7_days">7 ngày qua</option>
                                    <option value="this_month">Tháng này</option>
                                    <option value="custom">Tùy chỉnh</option>
                                </select>
                            </div>

                            <div class="form-group" id="custom_date_range" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-6 my-2">
                                        <label for="start_date" class="mb-2">Từ ngày:</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="col-sm-6 my-2">
                                        <label for="end_date" class="mb-2">Tới ngày:</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                </div>    
                            </div>

                            <div class="d-grid justify-content-center">
                                <div>
                                    <button type="reset" class="btn btn-secondary mt-3" id="resetBtn">Làm mới</button>
                                    <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Xem báo cáo</button>  
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
            // Show custom date range if selected
            $('#time_period').change(function() {
                if ($(this).val() === 'custom') {
                    $('#custom_date_range').show();
                } else {
                    $('#custom_date_range').hide();
                }
            });

            // Hide custom date range when reset button is clicked
            $('#resetBtn').click(function() {
                $('#custom_date_range').hide();
            });

            // Disable submit button if no time period selected
            $('#submitBtn').click(function() {
                var timePeriod = $('#time_period').val();
                if (!timePeriod) {
                    alert('Vui lòng chọn khoảng thời gian!');
                    return false;
                } else {
                    $('#reportForm').submit();
                }
            });
        });
    </script>
</html>
<?php /**PATH C:\xampp\htdocs\store.com\resources\views/report/report_generate.blade.php ENDPATH**/ ?>