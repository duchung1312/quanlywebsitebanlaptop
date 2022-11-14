<?php
include_once 'dbconfig.php';
if (isset($_POST['btn-save'])) {
    $MSP = $_POST['MSP'];
    $TSP = $_POST['TSP'];
    $TDM = $_POST['TDM'];
    $G = $_POST['G'];
    $SL = $_POST['SL'];
    $MT = $_POST['MT'];
    $TNSX = $_POST['TH'];
    $GC = $_POST['GC'];
    $A = $_FILES['A']['name'];
    $image_tmp = $_FILES['A']['tmp_name'];

    $sql_query = "INSERT INTO sanpham(MaSP,TenNSX,TenSP,AnhSP,TenDM,DonGia,SoLuong,MoTa,GiaCu) VALUES('$MSP','$TNSX','$TSP','$A','$TDM','$G','$SL','$MT','$GC')";
    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Thêm thông tin thành công ! ');
            window.location.href = 'sanpham.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Lỗi khi thêm !');
        </script>
<?php
    }
    move_uploaded_file($image_tmp, 'img/' . $A);
    // sql query execution function
}
$sql_brand = "SELECT * FROM nhasx";
$query_brand = mysqli_query($links, $sql_brand);

$sql_dm = "SELECT * FROM danhmuc";
$query_dm = mysqli_query($links, $sql_dm);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sản phẩm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="MSP" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="TSP" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <select class="form-control" name="TDM">
                        <?php
                        while ($row_dm = mysqli_fetch_assoc($query_dm)) { ?>
                            <option value="<?php echo $row_dm['TenDM']; ?>"><?php echo $row_dm['TenDM']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <input type="file" name="A">
                </div>

                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="SL" require class="form-control">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="G" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Giá cũ:</label>
                    <input type="text" name="GC" require class="form-control">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" name="MT" require class="form-control">
                </div>

                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="TH">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_brand)) { ?>
                            <option value="<?php echo $row_brand['TenNSX']; ?>"><?php echo $row_brand['TenNSX']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-save" class="btn btn-success">Thêm</button>
                    <a href="sanpham.php" class="btn btn-danger">Quay Lại</a>
                </div>

            </form>
        </div>
    </div>
</div>