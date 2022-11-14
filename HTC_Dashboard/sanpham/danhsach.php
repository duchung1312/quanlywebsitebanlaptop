<?php
require_once 'db_conn.php';
require_once 'xoa.php';
require_once 'timkiem.php';
?>

<div class="container-fluid">
    <div class="card">
        <!-- 1 -->
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <!-- 2 -->
        <div class="card-header d-flex justify-content-center align-items-center">
            <?php
            if (isset($_POST['sbm']) && !empty($_POST['search'])) { ?>
                <form method="POST" action="">
                    <button name="all_prd" class='btn btn-danger text-high '>Tất cả sản phẩm</button>
                </form>
            <?php } ?>
            <form method="POST" class="d-flex" action="">
                <input name="search" type="search" class="form-control">
                <button name="sbm" class="btn btn-success">Tìm kiếm</button>
            </form>
            <a href="sanpham.php?page_layout=them" class="btn btn-primary">
                Thêm mới
            </a>
        </div>
        <div class="card-body">
            <?php
            if (isset($total_prd)) {
                if ($total_prd !== 0) {
                    echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
                } else {
                    echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                }
            }
            ?>
            <table class="table bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="3%">#</th>
                        <th width="15%">Tên sản phẩm</th>
                        <th width="10%" style="text-align: center;">Ảnh sản phẩm</th>
                        <th width="10%">Mã danh mục</th>
                        <th width="7%">Giá bán</th>
                        <th width="7%">Giá cũ</th>
                        <th width="6%">Số lượng</th>
                        <th width="20%" style="text-align: center;">Mô tả</th>
                        <th width="10%">Thương hiệu</th>
                        <th width="10%" colspan="2">Hành động</th>
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
                                <td>
                                    <img src="img/<?php echo $row[3]; ?>" width="150">

                                </td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo number_format($row[5]) ?>đ</td>
                                <td><?php echo number_format($row[8]) ?>đ</td>
                                <td><?php echo $row[6]; ?></td>
                                <td><?php echo $row[7]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td>
                                    <a class="btn btn-warning" onclick="return edit_id('<?php echo $row[0]; ?>')" href="sanpham.php?page_layout=sua&edit_id=<?php echo $row[0]; ?>">Sửa</a>
                                    <a href="javascript:delete_id('<?php echo $row[0]; ?>')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">Không có thông tin trong bảng!</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function delete_id(MaSP) {
        if (confirm('Bạn có đồng ý xóa sản phẩm ?')) {
            window.location.href = 'sanpham.php?delete_id=' + MaSP;
        }
    }
</script>