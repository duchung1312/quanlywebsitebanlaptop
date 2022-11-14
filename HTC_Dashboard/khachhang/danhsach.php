<?php
require_once 'db_conn.php';
require_once 'xoa.php';
require_once 'timkiem.php';
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Danh sách khách hàng</h2>
        </div>

        <!-- tìm kiếm -->
        <div class="card-header d-flex justify-content-center align-items-center">
            <a href="khachhang.php?page_layout=them" class="btn btn-primary">
                Thêm mới
            </a>

            <?php
            if (isset($_GET['sbm']) && !empty($_GET['batdau']) && !empty($_GET['ketthuc'])) { ?>
                <form method="GET" action="">
                    <button name="All" class='btn btn-danger text-light'>Làm mới</button>
                </form>
            <?php
            }
            ?>
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Từ ngày</label>
                            <input type="date" name="batdau" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tới ngày</label>
                            <input type="date" name="ketthuc" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Chọn tìm kiếm</label> <br>
                            <button type="submit" name="sbm" class="btn btn-success">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="card-body">

            <table class="table bordered">
                <thead class="thead-dark">
                    <tr align="center">
                        <th>Mã khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th width="12%" colspan="2">Chức năng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $result_set = mysqli_query($links, $sql_query);
                    if (mysqli_num_rows($result_set) > 0) {
                        while ($row = mysqli_fetch_row($result_set)) {
                    ?>
                            <tr align="center">
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo $row[5]; ?></td>
                                <td align="center">
                                    <a class="btn btn-warning" onclick="return edit_id('<?php echo $row[0]; ?>')" href="khachhang.php?page_layout=sua&edit_id=<?php echo $row[0]; ?>">Sửa</a>
                                    <a class="btn btn-danger" href="javascript:delete_id('<?php echo $row[0]; ?>')">Xóa</a>
                                </td>

                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">Ko tìm thấy dữ liệu trong bảng!</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between">

        </div>

    </div>
</div>

<script>
    function delete_id(MaKH) {
        if (confirm('Bạn có chắc chắn xóa khách hàng ?')) {
            window.location.href = 'khachhang.php?delete_id=' + MaKH;
        }
    }
</script>