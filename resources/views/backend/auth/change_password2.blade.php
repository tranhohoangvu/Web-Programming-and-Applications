{{-- @extends('layouts.main') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/change_password.css') }}" rel="stylesheet">
   
    <title>Đổi mật khẩu</title>
   
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

                        <form method="POST" role="form" action="{{ route('auth.change_password2.submit') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="currentPasswordInput" class="form-label">Mật Khẩu Hiện Tại</label>
                                <input id="currentPasswordInput" name="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" required>
                                @error('currentpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật Khẩu Mới</label>
                                <input id="newPasswordInput" name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" required>
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

                           
                            <div class="nut">
                                @if(auth()->user()->vaitro)
                                    <a href="{{ route('dashboard.index') }}" class="btn">Quay về</a>
                                @else
                                    <a href="{{ route('dashboard.nhanvien') }}" class="btn">Quay về</a>   
                                @endif 
                                <button type="submit" class="btn">Đổi mật khẩu</button>
                            </div>
                            
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


  
