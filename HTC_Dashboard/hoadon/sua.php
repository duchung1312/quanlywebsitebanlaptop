<?php
include_once '../db_conn.php';
if (isset($_GET['edit_id'])) {
    $sql_query = "SELECT * FROM hoadon WHERE MaHD=" . $_GET['edit_id'];
    $result_set = mysqli_query($links, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set);
}
if (isset($_POST['btn-update'])) {
    $MHD = $_POST['MaHD'];
    $MKH = $_POST['MaKH'];
    $THD = $_POST['Ten'];
    $TSP = $_POST['TenSP'];
    $NB = $_POST['NgayBan'];
    $TT = $_POST['TongTien'];

    $sql_query = "UPDATE hoadon SET MaKH='$MKH',TenHD='$THD',TenSP='$TSP', NgayBan='$NB',TongTien='$TT' WHERE MaHD=" . $_GET['edit_id'];

    if (mysqli_query($links, $sql_query)) {
?>
        <script type="text/javascript">
            alert('Sửa dữ liệu thành công');
            window.location.href = 'hoadon.php';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Sửa dữ liệu thất bại');
        </script>
    <?php
    }
    // sql query execution function
}
if (isset($_POST['btn-cancel'])) {
    ?>
    <script type="text/javascript">
        window.location.href = 'hoadon.php';
    </script>
<?php
}

$sql_sp = "SELECT * FROM sanpham";
$query_sp= mysqli_query($links, $sql_sp);

$sql_kh = "SELECT * FROM khachhang";
$query_kh= mysqli_query($links, $sql_kh);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header  d-flex justify-content-center align-items-center">
            <h2>Sửa hoá đơn</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
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
                    <label>Tên Hóa Đơn</label>
                    <input type="text" name="Ten" class="form-control" value="<?php echo $fetched_row['TenHD']; ?>">
                </div>

                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="TenSP" class="form-control" value="<?php echo $fetched_row['TenSP']; ?>">
                </div>

                <div class="form-group">
                    <label>Ngày Bán</label>
                    <input type="date" name="NgayBan" class="form-control"  value="<?php echo $fetched_row['NgayBan']; ?>">
                </div>

                <div class="form-group">
                    <label>Tổng Tiền</label>
                    <input type="number" name="TongTien" class="form-control"  value="<?php echo $fetched_row['TongTien']; ?>">
                </div>
       
<!-- Button -->
                <div class="card-footer d-flex justify-content-between">
                    <button name="btn-update" class="btn btn-primary">Sửa</button>
                    <a href="hoadon.php" class="btn btn-danger">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>