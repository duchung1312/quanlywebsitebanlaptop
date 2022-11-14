<?php
require_once 'db_conn.php';
require_once 'xoa.php';
require_once 'timkiem.php';
?>
<div class="col-lg-12 col-md-12">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h2>Danh sách hoá đơn</h2>
            </div>


            <div class="card-header d-flex justify-content-center">
                <?php
                if (isset($_POST['sbm'])) { ?>
                    <form method="GET" action="">
                        <button name="All" class='btn btn-danger text-light'>Tất cả hóa đơn</button>
                    </form>
                <?php
                }
                ?>
                <form method="POST" class="d-flex" action="">
                    <input name="search" type="search" class="form-control">
                    <button name="sbm" class="btn btn-success">Tìm kiếm</button>
                </form>
                <a href="hoadon.php?page_layout=them" class="btn btn-primary">
                    Thêm mới
                </a>
            </div>

            <div class="card-body">
                <?php
                if (isset($total_prd)) {
                    if ($total_prd !== 0) {
                        echo "<p class='text-success'>Tìm thấy $total_prd hoá đơn</p>";
                    } else {
                        echo "<p class='text-danger'> Không tìm thấy hoá đơn nào! </p>";
                    }
                }
                ?>
                <table class="table bordered">
                    <thead class="thead-dark">
                        <tr>

                            <th>Mã hoá đơn</th>
                            <th>Tên hoá đơn</th>
                            <th>Tên sản phẩm</th>
                            <th>Ngày Bán</th>
                            <th>Tổng Tiền</th>
                            <th width="15%">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $result_set = mysqli_query($links, $sql_query);
                        if (mysqli_num_rows($result_set) > 0) {
                            while ($row = mysqli_fetch_row($result_set)) {
                        ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[5]; ?></td>
                                    <td>
                                        <a class="btn btn-warning" onclick="return edit_id('<?php echo $row[0]; ?>')" href="hoadon.php?page_layout=sua&edit_id=<?php echo $row[0]; ?>">Sửa</a>
                                        <a href="javascript:delete_id('<?php echo $row[0]; ?>')" class="btn btn-danger">Xóa</a>
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
        </div>
    </div>
</div>

<script>
    function delete_id(MaSP) {
        if (confirm('Bạn có đồng ý xóa hoá đơn ?')) {
            window.location.href = 'hoadon.php?delete_id=' + MaSP;
        }
    }
</script>