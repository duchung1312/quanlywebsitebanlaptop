<?php
require_once("shop-categories/cart.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTC Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="shortcut icon" type="image/png" href="./img/favicon.png">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        td,
        th,
        tr {
            text-align: center;
        }
        .empty{
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include_once('shop-categories/header.php'); ?>
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <a href="wishlist.php">
                            <h4>Yêu Thích</h4>
                        </a>
                        <div class="breadcrumb__links">
                            <a href="index.php">Trang chủ</a>
                            <a href="shop.php">Cửa Hàng</a>
                            <span>Yêu Thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <?php
                        if (isset($_SESSION["cart_item"])) {
                            $total_quantity = 0;
                            $total_price = 0;
                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th width="15%">Mã</th>
                                        <th width="20%">Ảnh</th>
                                        <th width="20%">Đơn Giá</th>
                                        <th width="20%">Số lượng</th>
                                        <th width="20%">Tổng Tiền</th>
                                        <th>Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        $item_price = $item["quantity"] * $item["DonGia"];
                                    ?>
                                        <tr>
                                            <td><?php echo $item["MaSP"]; ?></td>
                                            <td class="cart__price"><img src="HTC_Dashboard/img/<?php echo $item["AnhSP"]; ?>" alt=""><?php echo $item["TenSP"]; ?></td>
                                            <td><?php echo number_format($item["DonGia"]) ?>₫</td>
                                            <td><?php echo $item["quantity"]; ?></td>
                                            <td><?php echo number_format($item_price); ?>₫</td>
                                            <td class="cart__close"><a href="wishlist.php?action=remove&MaSP=<?php echo $item["MaSP"]; ?>" class="btnRemoveAction"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                    <?php
                                        $total_quantity += $item["quantity"];
                                        $total_price += ($item["DonGia"] * $item["quantity"]);
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" class="cart__price">Tổng cộng:</td>
                                        <td colspan="1"><?php echo $total_quantity; ?></td>
                                        <td colspan="2"><strong><?php echo number_format($total_price); ?>₫</strong></td>
                                    </tr>
                                    <td colspan="6">
                                        <div class="continue__btn btn-empty">
                                            <a href="wishlist.php?action=empty" class="btn-empty">
                                                <i class="fa fa-close"></i>
                                                Xoá tất cả
                                            </a>
                                        </div>
                                    </td>
                                <?php
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="6"><h5 class="empty">Danh sách yêu thích bạn trống!</h5></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                            </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Tiếp Tục Mua Hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="index.php"><i class="fas fa-pound-sign"></i> Trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Footer -->
    <?php include_once('shop-categories/footer.php'); ?>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>