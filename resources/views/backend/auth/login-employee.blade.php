<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - ANKHANG STORE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #71b7e6, #008c28);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .login-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-box h1 {
            font-size: 3rem;
            color: #008c28;
            margin-bottom: 20px;
        }
        .login-box h3, .login-box p {
            color: #333;
        }
        .btn-primary {
            background-color: #008c28;
            border-color: #008c28;
        }
        .btn-primary:hover {
            background-color: #005a1d;
            border-color: #005a1d;
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <div class="login-box text-center">
        <h1 class="mb-4">AK+</h1>
        <h3>Cửa hàng điểm bán thiết bị di động AN KHANG STORE</h3>
        <p>Uy tín - Chất lượng - Nhanh chóng - Sang trọng</p>
        <p><em>-- Nhân viên cửa hàng An Khang Store --</em></p>

        <!-- In hết tất cả lỗi hiện có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" class="m-t" role="form" action="{{ route('auth.login.employee.submit') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                @if($errors->has('username'))
                    <span class="error-message">*{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if($errors->has('password'))
                    <span class="error-message">*{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            <a href="#" class="d-block mt-3"><small>Quên mật khẩu?</small></a>
        </form>
    </div>

    <!-- Mainly scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
