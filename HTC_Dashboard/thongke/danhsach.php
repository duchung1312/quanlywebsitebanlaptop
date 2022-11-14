<?php
require_once 'db_conn.php';
require_once 'timkiem.php';
?>
<div class="main-content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-warning">
                        <span class="material-icons">group</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Khách Hàng</strong></p>
                    <h3 class="card-title"><?php echo ($kh )?></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-info">info</i>
                        <a href="#">Xem báo cáo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-rose">
                        <span class="material-icons">shopping_cart</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Đơn Hàng</strong></p>
                    <h3 class="card-title"><?php echo ($kh )?></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i>
                        Đơn đặt hàng nhiều nhất
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-success">
                        <span class="material-icons">attach_money</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>doanh Thu</strong></p>
                    <h3 class="card-title"><?php echo number_format($sum )?>đ</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Doanh Thu Hàng Ngày
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-info">
                        <span class="material-icons">follow_the_signs</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Người theo dõi</strong></p>
                    <h3 class="card-title">+24500</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i>
                        tổng lượt theo dõi
                    </div>
                </div>
            </div>
        </div>


    </div>



    <!---row-second----->
    <div class="col-lg-12 col-md-12">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Thống kê hoá đơn</h2>
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
                                    <button type="submit" name="sbm" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

                                <th>Mã Khách Hàng</th>
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
                                        <td><?php echo $row[1]; ?></td>
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

                <div class="card-footer d-flex justify-content-between">
                    <a href="hoadon.php?page_layout=them" class="btn btn-primary">
                        Thêm mới
                    </a>
                    <a href="index.php" class="btn btn-danger">
                        Quay Lại
                    </a>
                    <?php
                    if (isset($_GET['sbm']) && !empty($_GET['batdau']) && !empty($_GET['ketthuc'])) { ?>
                        <form method="GET" action="">
                            <button name="All" class='btn btn-success text-light'>Tất cả hóa đơn !</button>
                        </form>
                    <?php
                    }
                    ?>
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
</div>