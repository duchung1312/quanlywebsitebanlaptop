<?php
include_once '../db_conn.php';
if (isset($_GET['edit_id'])) {
	$sql_query = "SELECT * FROM khachhang WHERE MaKH=" . $_GET['edit_id'];
	$result_set = mysqli_query($links, $sql_query);
	$fetched_row = mysqli_fetch_array($result_set);
}
if (isset($_POST['btn-update'])) {
	// variables for input data
	$MaKH = $_POST['MaKH'];
	$TenKH = $_POST['TenKH'];
	$DiaChi = $_POST['DiaChi'];
	$GioiTinh = $_POST['GioiTinh'];
	$SDT = $_POST['SDT'];
	$NgaySinh = $_POST['NgaySinh'];
	// variables for input data

	// sql query for update data into database
	$sql_query = "UPDATE khachhang SET MaKH='$MaKH',TenKH='$TenKH',DiaChi='$DiaChi', GioiTinh='$GioiTinh',SDT='$SDT',NgaySinh='$NgaySinh' WHERE MaKH=" . $_GET['edit_id'];

	if (mysqli_query($links, $sql_query)) {
?>
		<script type="text/javascript">
			alert('Thông tin khách hàng đã được cập nhật');
			window.location.href = 'khachhang.php';
		</script>
	<?php
	} else {
	?>
		<script type="text/javascript">
			alert('Thông tin khách hàng chưa được cập nhật');
		</script>
	<?php
	}
	// sql query execution function
}
if (isset($_POST['btn-cancel'])) {
	?>
	<script type="text/javascript">
		window.location.href = 'khachhang.php';
	</script>
<?php
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header d-flex justify-content-center align-items-center">
			<h2>Sửa thông tin khách hàng</h2>
		</div>

		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã khách hàng</label>
					<input type="text" name="MaKH" class="form-control" value="<?php echo $fetched_row['MaKH']; ?>" required />

				</div>
				<div class="form-group">
					<label>Tên khách hàng</label>
					<input type="text" name="TenKH" class="form-control" value="<?php echo $fetched_row['TenKH']; ?>" required />
				</div>
				<div class="form-group">
					<label>Địa chỉ</label>
					<input type="text" name="DiaChi" class="form-control" value="<?php echo $fetched_row['DiaChi']; ?>" required />
				</div>


				<div class="form-group">
					<label>Giới tính</label>
					<select class="form-control" name="GioiTinh" class="form-control" value="<?php echo $fetched_row['GioiTinh']; ?>" required>
						<option>Nam</option>
						<option>Nữ</option>
						<option>Khác</option>
					</select>
				</div>

				<div class="form-group">
					<label>Số điện thoại</label>
					<input type="number" name="SDT" class="form-control" value="<?php echo $fetched_row['SDT']; ?>" required />
				</div>

				<div class="form-group">
					<label>Ngày sinh</label>
					<input type="date" name="NgaySinh" class="form-control" value="<?php echo $fetched_row['NgaySinh']; ?>" required />
				</div>

				<div class="card-footer d-flex justify-content-between">
					<button name="btn-update" class="btn btn-success">Sửa thông tin</button>
                    <a href="khachhang.php" class="btn btn-danger">Quay Lại</a>
                </div>

			</form>
		</div>
	</div>
</div>