@extends('layouts.main')

<link href="{{ asset('css/user_show.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="container">
        <h1>Danh sách người dùng</h1>
        
        <!-- Thanh lọc -->
        <div class="add">
            <a href="{{ route('account.user-create') }}" class="btn btn-primary">+ Thêm thành viên</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th> 
                    <th>Avatar</th>
                    <th>Họ và tên đầy đủ</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái khóa</th>
                    <th>Kích hoạt</th>
                    <th>Thống kê</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @php
                        $employee = $user->employee;
                    @endphp
                    
                    <tr id="user-{{ $user->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($employee && $employee->avatar)
                                <a href="{{ route('account.user_profile', ['id' => $user->id]) }}"><img src="{{ asset('uploads/employees/' . $employee->avatar) }}" width="70px" height="70px" alt="avatar" class="avatar"></a>
                             @else
                             <img src="{{ asset('img/AnhMacDinhKhongXoa.jpg') }}" width="70px" height="70px" alt="Avatar">
                               
                            @endif 
                        </td>
                        <td>{{$user->employee->hotendaydu}}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->vaitro)
                                Admin
                            @else
                                Nhân viên
                            @endif
                        </td>
                        <td>{{ $user->trangthaikhoa ? 'Đã khóa' : 'Không khóa' }}</td>
                        <td class="activation-status">
                            @if($user->vaitro)
                                Đã kích hoạt
                            @else
                                {{ $user->first_login ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('account.user.orders', ['id' => $user->id]) }}" class="btn btn-info">Xem</a>
                        </td>
                        <td>
                            @if(!$user->trangthaikichhoat)
                                <form action="{{ route('account.resend-email', ['id' => $user->id]) }}" method="POST" class="resend-email-form" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Gửi lại email</button>
                                </form>
                            @endif
                            @if($user->trangthaikhoa == 0)
                                <form class="user_lock" action="{{ route('account.user-lock', ['id' => $user->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này?')">Khóa</button>
                                </form>
                            @else
                                <form class="user_unlock" action="{{ route('account.user-unlock', ['id' => $user->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn mở khóa tài khoản này?')">Mở Khóa</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatarImages = document.querySelectorAll('.avatar');
            avatarImages.forEach(image => {
                image.onload = function () {
                    image.classList.add('loaded');
                }
                if (image.complete) {
                    image.classList.add('loaded');
                }
            });

            const deleteForms = document.querySelectorAll('.delete_user');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const confirmed = confirm('Bạn có chắc chắn muốn xóa tài khoản này?');
                    if (confirmed) {
                        const row = this.closest('tr');
                        row.classList.add('deleted-row');
                        setTimeout(() => {
                            this.submit();
                        }, 500);
                    }
                });
            });

            const resendEmailForms = document.querySelectorAll('.resend-email-form');
            resendEmailForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);
                    const userId = this.closest('tr').id.split('-')[1];
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success' && data.trangthaikichhoat) {
                            const userRow = document.getElementById('user-' + userId);
                            userRow.querySelector('.activation-status').innerText = 'Đã kích hoạt';
                            this.remove();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection
