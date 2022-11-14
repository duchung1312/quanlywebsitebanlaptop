<?php
include_once 'db_conn.php';
if (isset($_POST['btn-update'])) {
    $ID = $_POST['ID'];
    $TK = $_POST['TK'];
    $MK = $_POST['MK'];
    $T = $_POST['Ten'];
    $sql_query = "INSERT INTO nguoidung(Id,TaiKhoan,MatKhau,TenNguoiDung) VALUES('$ID','$TK','$MK','$T')";

    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Dữ liệu người dùng đã được thêm');
            window.location.href = 'taikhoan.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Lỗi khi thêm ! ');
        </script>
<?php
    }
    // sql query execution function
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Thêm tài khoản </h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="ID" class="form-control">

                </div>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" name="TK" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="MK" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" name="Ten" class="form-control">
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-update" class="btn btn-success">Thêm</button>
                    <a href="taikhoan.php" class="btn btn-danger">Quay Lại</a>
                </div>
                
            </form>
        </div>
    </div>
</div>