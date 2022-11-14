<?php
require_once 'db_conn.php';

if (isset($_POST['btn-add'])) {
    $MHD = $_POST['MaHD'];
    $MKH = $_POST['MaKH'];
    $THD = $_POST['Ten'];
    $TSP = $_POST['TenSP'];
    $NB = $_POST['NgayBan'];
    $TT = $_POST['TongTien'];
    $sql_query = "INSERT INTO hoadon(MaHD,MaKH,TenHD,TenSP,NgayBan,TongTien) VALUES('$MHD','$MKH','$THD','$TSP','$NB','$TT')";

    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Thêm Dữ Liệu Thành Công ');
            window.location.href = 'hoadon.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Thêm Dữ Liệu Thất Bại !!');
        </script>
<?php
    }
    move_uploaded_file($image_tmp, 'img/' . $A);
}


$sql_sp = "SELECT * FROM sanpham";
$query_sp = mysqli_query($links, $sql_sp);

$sql_kh = "SELECT * FROM khachhang";
$query_kh = mysqli_query($links, $sql_kh);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header  d-flex justify-content-center align-items-center">
            <h2>Thêm hoá đơn</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Mã hoá đơn</label>
                    <input type="text" name="MaHD" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mã Khách Hàng</label>
                    <select class="form-control" name="MaKH">
                        <?php
                        while ($row_kh = mysqli_fetch_assoc($query_kh)) { ?>
                            <option value="<?php echo $row_kh['MaKH']; ?>"><?php echo $row_kh['TenKH']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" name="Ten" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="TenSP" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ngày Bán</label>
                    <input type="date" name="NgayBan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tổng Tiền</label>
                    <input type="number" name="TongTien" class="form-control">
                </div>

                <!-- Button -->
                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-add" class="btn btn-success">Thêm Mới</button>
                    <a href="hoadon.php" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>