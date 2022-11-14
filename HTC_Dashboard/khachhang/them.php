<?php
include_once 'db_conn.php';
if (isset($_POST['btn-save'])) {
    // variables for input data
    $MaKH = $_POST['MaKH'];
    $TenKH = $_POST['TenKH'];
    $DiaChi = $_POST['DiaChi'];
    $GioiTinh = $_POST['GioiTinh'];
    $SDT = $_POST['SDT'];
    $NgaySinh = $_POST['NgaySinh'];
    // variables for input data

    // sql query for inserting data into database
    $sql_query = "INSERT INTO khachhang(MaKH,TenKH,DiaChi,GioiTinh,SDT,NgaySinh) VALUES('$MaKH','$TenKH','$DiaChi','$GioiTinh','$SDT','$NgaySinh')";
    // sql query for inserting data into database

    // sql query execution function
    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Dữ liệu khách hàng đã được thêm');
            window.location.href = 'khachhang.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Lỗi ');
        </script>
<?php
    }
    // sql query execution function
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Thêm thông tin khách hàng</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã khách hàng</label>
                    <input type="text" name="MaKH" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" name="TenKH" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="DiaChi" require class="form-control">
                </div>


                <div class="form-group">
                    <label>Giới tính</label>
                    <select class="form-control" name="GioiTinh">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" name="SDT" require class="form-control">
                </div>

                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="NgaySinh" require class="form-control">
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-save" class="btn btn-success">Thêm mới</button>
                    <a href="khachhang.php" class="btn btn-danger">Quay Lại</a>
                </div>

            </form>
        </div>
    </div>
</div>