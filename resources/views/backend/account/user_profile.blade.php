<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .header-col {
            background-color: #008c28;
        }
        .card {
            border-radius: 15px;
        }
        .labels {
            font-weight: bold;
        }   
        .border-rounded {
            border-radius: 10px;
        }
        .profile-button {
            width: 150px;
        }
        .labels {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px; 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light header-col">
            <div class="container my-3">   
                <div>
                    @if(auth()->user()->vaitro)
                        <a class="navbar-brand fw-bold fs-1 text-light" href="{{ route('dashboard.index') }}">ANKHANG STORE</a>
                        <br>
                        <a class="navbar-brand fs-6 text-light">Quản trị viên</a>
                    @else
                        <a class="navbar-brand fw-bold fs-1 text-light" href="{{ route('dashboard.nhanvien') }}">ANKHANG STORE</a>
                        <br>
                        <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <img id="avatarImage" class="rounded-circle border border-primary mt-3" width="150px" 
                        src="{{ $user->employee && $user->employee->avatar ? asset('uploads/employees/' . $user->employee->avatar) : asset('img/AnhMacDinhKhongXoa.jpg') }}" 
                        alt="Avatar" style="cursor: pointer;">
                   
                        <h5 class="mt-3 mb-0">{{ $user->employee->hotendaydu }}</h5>
                        <p class="text-muted">{{ $user->email }}</p>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <a href="{{ route('auth.change_password2') }}" class="btn btn-primary btn-sm w-50">Đổi mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin cá nhân</h4>
                        <hr>
                        <!-- Bootstrap alert for edit mode notification -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="edit-mode-alert" style="display: none;">
                            Bạn đang ở chế độ chỉnh sửa.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" id="edit-profile-form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="labels">Họ tên đầy đủ:</label>
                                    @if (auth()->user()->vaitro == 1) {{-- Kiểm tra nếu là admin --}}
                                        <input type="text" class="form-control" name="hotendaydu" value="{{ $user->employee->hotendaydu}}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{ $user->employee->hotendaydu}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{ $user->employee->hotendaydu}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Username:</label>
                                    @if(auth()->user()->vaitro == 1)
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->username}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->username}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Số điện thoại:</label>
                                    @if(auth()->user()->vaitro == 1)
                                        <input type="text" class="form-control" name="sodienthoai" value="{{ $user->employee->sodienthoai }}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->sodienthoai}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->sodienthoai}}</div>
                                     @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Địa chỉ:</label>
                                    @if(auth()->user()->vaitro == 1)
                                        <input type="text" class="form-control" name="diachi" value="{{ $user->employee->diachi }}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->diachi}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->diachi}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Ngày sinh:</label>
                                    @if(auth()->user()->vaitro==1)
                                        <input type="date" class="form-control" name="ngaysinh" value="{{\Carbon\Carbon::parse($user->employee->ngaysinh)->format('Y-m-d')}}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{\Carbon\Carbon::parse($user->employee->ngaysinh)->format('d/m/Y')}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{\Carbon\Carbon::parse($user->employee->ngaysinh)->format('d/m/Y')}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Ngày vào làm:</label>
                                    @if(auth()->user()->vaitro==1)
                                        <input type="date" class="form-control" name="ngayvaolam" value="{{\Carbon\Carbon::parse($user->employee->ngayvaolam)->format('Y-m-d')}}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{\Carbon\Carbon::parse($user->employee->ngayvaolam)->format('d/m/Y')}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{\Carbon\Carbon::parse($user->employee->ngayvaolam)->format('d/m/Y')}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Trạng thái tài khoản:</label>
                                    @if(auth()->user()->vaitro==1)
                                        <select name="trangthaikhoa" id="trangthaikhoa" class="form-control" style="display: none;">
                                            <option value="0" {{ !$user->trangthaikhoa ? 'selected' : '' }}>Không khóa</option>
                                            <option value="1" {{ $user->trangthaikhoa ? 'selected' : '' }}>Đã khóa</option>
                                        </select>
                                        <div style="border: 1px solid #ccc; padding: 5px;">
                                            @if(!$user->trangthaikhoa)
                                                Không khóa
                                            @else
                                                Đã khóa
                                            @endif
                                        </div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">
                                            @if(!$user->trangthaikhoa)
                                                Không khóa
                                            @else
                                                Đã khóa
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Email:</label>
                                    @if(auth()->user()->vaitro==1)
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->email}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->email}}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Trình độ học vấn:</label>
                                    @if(auth()->user()->vaitro==1)
                                        <input type="text" class="form-control" name="trinhdo" value="{{ $user->employee->trinhdo }}" style="display: none;">
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->trinhdo}}</div>
                                    @else
                                        <div style="border: 1px solid #ccc; padding: 5px;">{{$user->employee->trinhdo}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                @if(auth()->user()->vaitro)
                                    <button type="button" class="btn btn-primary" id="edit-profile-button">Chỉnh sửa</button>
                                    <button type="submit" class="btn btn-success" id="save-profile-button" style="display: none;">Lưu</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Avatar Upload -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avatarModalLabel">Đổi avatar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="avatarForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Chọn ảnh mới:</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Thành công!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Avatar của bạn đã được cập nhật thành công!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#avatarImage').click(function() {
                $('#avatarModal').modal('show');
            });

            $('#avatarForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('profile.updateAvatar.submit') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response.success) {
                            $('#avatarImage').attr('src', response.avatarPath);
                            $('#avatarModal').modal('hide');
                            // alert('Avatar của bạn đã được cập nhật thành công.');
                            $('#successModal').modal('show');
                        } else {
                            alert('Cập nhật avatar thất bại!');
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại!');
                    }
                });
            });

            $('#edit-profile-button').click(function() {
                $(this).hide();
                $('#save-profile-button').show();
                $('#edit-mode-alert').show();

                $('input[type="text"], input[type="email"], input[type="date"], select').each(function() {
                    $(this).siblings('div').hide();
                    $(this).show();
                });
            });
        });
    </script>
</body>
</html>
