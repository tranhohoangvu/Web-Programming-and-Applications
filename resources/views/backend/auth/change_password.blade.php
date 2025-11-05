<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/change_password.css') }}" rel="stylesheet">
    <title>Đổi mật khẩu nhân viên mới</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đổi Mật Khẩu') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" role="form" action="{{ route('auth.change_password.submit') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="newpasswordInput" class="form-label">Mật Khẩu Mới</label>
                                <input id="newPasswordInput" name ="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" required>
                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                                <input id="confirmNewPasswordInput" type="password" class="form-control" name="newpassword_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>