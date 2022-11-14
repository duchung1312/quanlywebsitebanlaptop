<?php
include_once 'db_conn.php';
if (isset($_POST['btn-save'])) {
    $MTT = $_POST['MTT'];
    $TD = $_POST['TD'];
    $ND = $_POST['ND'];
    $NĐ = $_POST['NĐ'];
    $NV = $_POST['NV'];
    $A = $_FILES['A']['name'];
    $image_tmp = $_FILES['A']['tmp_name'];

    $A2 = $_FILES['A2']['name'];
    $image_tmp = $_FILES['A2']['tmp_name2'];


    $sql_query = "INSERT INTO tintuc (MaTT,TieuDe,Anh,Anh2,NgayDang,NguoiViet,NoiDung) VALUES ('$MTT','$TD','$A','$A2','$NĐ','$NV','$ND')";
    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Thêm thông tin thành công! ');
            window.location.href = 'tintuc.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Lỗi khi thêm !');
        </script>
<?php
    }
    move_uploaded_file($image_tmp, 'img/tintuc/' . $A);

    // sql query execution function
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Thêm tin tức</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã tin tức</label>
                    <input type="text" name="MTT" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="TD" require class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh</label> <br>
                    <input type="file" name="A">
                </div>

                <div class="form-group">
                    <label>Ảnh nội dung </label> <br>
                    <input type="file" name="A2">
                </div>

                <div class="form-group">
                    <label>Ngày đăng</label>
                    <input type="date" name="NĐ" require class="form-control">
                </div>

                <div class="form-group">
                    <label>Tác giả</label>
                    <input type="text" name="NV" require class="form-control">
                </div>
                <label>Nội dung</label>
                <div class="form-group">
                    <textarea type="text"  name="ND" require class="form-control"></textarea>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-save" class="btn btn-success">Thêm mới</button>
                    <a href="tintuc.php" class="btn btn-danger">Quay Lại</a>
                </div>

            </form>
        </div>
    </div>
</div>