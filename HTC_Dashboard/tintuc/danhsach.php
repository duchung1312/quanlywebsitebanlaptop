<?php
require_once 'db_conn.php';
if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM tintuc WHERE MaTT =" . $_GET['delete_id'];
    mysqli_query($links, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-center align-items-center">
            <h2>Tin tức</h2>
        </div>

        <div class="card-header d-flex justify-content-between">
            <a href="tintuc.php?page_layout=them" class="btn btn-primary">
                Thêm mới
            </a>
        </div>

        <div class="card-body">
            <table class="table bordered">
                <thead class="thead-dark">
                    <tr align="center">
                        <th width="30%">Tiêu Đề</th>
                        <th width="25%">Ảnh mô tả</th>
                        <th width="15%">Ngày đăng</th>
                        <th>Người viết</th>
                        <th width="10%" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_query = "SELECT * FROM  tintuc";

                    $result_set = mysqli_query($links, $sql_query);
                    if (mysqli_num_rows($result_set) > 0) {
                        while ($row = mysqli_fetch_row($result_set)) {
                    ?>
                            <tr align="center">
                                <td align="left"><?php echo $row[1]; ?></td>
                                <td>
                                    <img src="img/tintuc/<?php echo $row[2]; ?>" width="150">
                                </td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo $row[5]; ?></td>
                                <td>
                                    <a href="javascript:delete_id('<?php echo $row[0]; ?>')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">Ko tìm thấy dữ liệu!</td>
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
    function delete_id(MaTT) {
        if (confirm('Bạn có đồng ý xóa tin này ?')) {
            window.location.href = 'tintuc.php?delete_id=' + MaTT;
        }
    }
</script>