<?php
include_once 'db_conn.php';
$id = $_GET['edit_id'];
$sql = "SELECT * FROM sanpham WHERE MaSP = $id";
$result_set = mysqli_query($links, $sql);
$fetched_row = mysqli_fetch_array($result_set);
if (isset($_POST['btn-update'])) {
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

    $sql_query = "UPDATE sanpham SET MaSP='$MSP',TenNSX='$TNSX',TenSP='$TSP', AnhSP='$A',TenDM='$TDM',DonGia='$G',SoLuong='$SL',MoTa='$MT',GiaCu='$GC' WHERE MaSP=" . $_GET['edit_id'];
    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Sửa thông tin thành công ! ');
            window.location.href = 'sanpham.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Lỗi khi sửa !');
        </script>
<?php
    }
    move_uploaded_file($image_tmp, 'img/' . $A);
}
$sql_brand = "SELECT * FROM nhasx";
$query_brand = mysqli_query($links, $sql_brand);

$sql_dm = "SELECT * FROM danhmuc";
$query_dm = mysqli_query($links, $sql_dm);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa thông tin sản phẩm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã sản phẩm</label>

                    <input type="number" name="MSP" class="form-control" value="<?php echo $fetched_row['MaSP']; ?>">
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="TSP" class="form-control" value="<?php echo $fetched_row['TenSP']; ?>">
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
                    <input type="number" name="SL" class="form-control" value="<?php echo $fetched_row['SoLuong']; ?>">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" name="G" class="form-control" value="<?php echo $fetched_row['DonGia']; ?>">
                </div>
                <div class="form-group">
                    <label>Giá cũ</label>
                    <input type="text" name="GC" class="form-control" value="<?php echo $fetched_row['GiaCu']; ?>">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" name="MT" class="form-control" value="<?php echo $fetched_row['MoTa']; ?>">
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
                    <button name="btn-update" class="btn btn-success">Sửa</button>
                    <a href="sanpham.php" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>