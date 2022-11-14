<?php
include_once '../db_conn.php';
if (isset($_GET['edit_id'])) {
	$sql_query = "SELECT * FROM nguoidung WHERE Id=" . $_GET['edit_id'];
	$result_set = mysqli_query($links, $sql_query);
	$fetched_row = mysqli_fetch_array($result_set);
}
if (isset($_POST['btn-update'])) {

	$ID = $_POST['ID'];
	$TK = $_POST['TK'];
	$MK = $_POST['MK'];
	$T = $_POST['Ten'];

	$sql_query = "UPDATE nguoidung SET Id='$ID',TaiKhoan='$TK',MatKhau='$MK',TenNguoiDung='$T' WHERE Id=" . $_GET['edit_id'];

	if (mysqli_query($links, $sql_query)) {
?>
		<script type="text/javascript">
			alert('Cập nhật dữ liệu thành công !');
			window.location.href = 'taikhoan.php';
		</script>
	<?php
	} else {
	?>
		<script type="text/javascript">
			alert('Cập nhật dữ liệu thất bại !');
		</script>
	<?php
	}
	// sql query execution function
}
if (isset($_POST['btn-cancel'])) {
	?>
	<script type="text/javascript">
		window.location.href = 'taikhoan.php';
	</script>
<?php
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header d-flex justify-content-center align-items-center">
			<h2>Sửa thông tin tài khoản</h2>
		</div>

		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>ID</label>
					<input type="text" name="ID" class="form-control" value="<?php echo $fetched_row['Id']; ?>" required />

				</div>
				<div class="form-group">
					<label>Tài khoản</label>
					<input type="text" name="TK" class="form-control" value="<?php echo $fetched_row['TaiKhoan']; ?>" required />
				</div>

				<div class="form-group">
					<label>Mật khẩu</label>
					<input type="text" name="MK" class="form-control" value="<?php echo $fetched_row['MatKhau']; ?>" required />
				</div>

				<div class="form-group">
					<label>Tên người dùng</label>
					<input type="text" name="Ten" class="form-control" value="<?php echo $fetched_row['TenNguoiDung']; ?>" required />
				</div>

				<div class="card-footer d-flex justify-content-between">
					<button name="btn-update" class="btn btn-success">Sửa</button>
                    <a href="taikhoan.php" class="btn btn-danger">Quay Lại</a>
                </div>

			</form>
		</div>
	</div>
</div>