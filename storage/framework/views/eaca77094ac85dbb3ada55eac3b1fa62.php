<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link đã hết hạn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Customize modal */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .modal-header {
            background-color: #008C28;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .modal-title {
            font-weight: bold;
        }
        .modal-body {
            padding: 20px;
            font-size: 16px;
            text-align: center;
            padding-top: 20%;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-secondary {
            background-color: #ff0000;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="lockedAccountModal" tabindex="-1" role="dialog" aria-labelledby="lockedAccountModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lockedAccountModalLabel">AN KHANG STORE Thông báo</h5>
                </div>
                <div class="modal-body">
                    <p class="text-danger display-4">Link đã hết hạn</p>
                    <p>Vui lòng liên hệ với quản trị viên qua số điện thoại 0389950228 để biết thêm chi tiết.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script to show modal automatically -->
    <script>
        $(document).ready(function() {
            $('#lockedAccountModal').modal('show');
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\store.com\resources\views/errors/invalid_signature.blade.php ENDPATH**/ ?>