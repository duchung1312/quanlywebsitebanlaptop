<?php
require 'HTC_Dashboard/db_conn.php';
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = mysqli_query($links, "SELECT * FROM tintuc WHERE MaTT = '$id' ");
$item = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTC Store </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Đăng nhập</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
        
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Thông báo: Freeship từ 30/9 đến 15/10</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#">Hỗ trợ</a>
                            </div>
                            <div class="header__top__hover">
                                <span>VNĐ <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>VND</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Trang Chủ</a></li>
                            <li><a href="./shop.php">Cửa Hàng</a></li>
                            <li><a href="#">Khác</a>
                                <ul class="dropdown">
                                    <li><a href="./about.php">Về Chúng Tôi</a></li>
                                    <li><a href="./checkout.php">Thanh Toán</a></li>
                                </ul>
                            </li>
                            <li  class="active" ><a href="./blog.php">Tin Tức</a></li>
                            <li><a href="./contact.php">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <a href="wishlist.php"><img src="img/icon/heart.png" alt=""></a>
                        <a href="shopping-cart.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Tin tức</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Trang Chủ</a>
                            <span>Đọc thêm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__item"> 
                        <h2>
                        <?php echo $item['TieuDe'] ?>
                        </h2>
                    </div>
                    <div class="about__pic">
                        <img src="HTC_Dashboard/img/tintuc/<?php echo $item['Anh2'];?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
            <div style=" text-align: justify;" class="about__item"> 
                        <p style="font-size:20px">
                       &emsp; <?php echo $item['NoiDung'] ?>
                        </p>
                    </div>
            </div>
            <div style="text-align: end;" class="about__item"> 
                        <p style="font-size:25px">
                       Bài và ảnh: <?php echo $item['NguoiViet'] ?>
                        </p>
                    </div>
            </div>
        </div>

    </section>
    <section class="blog spad">
        <div class="container">
        <div class="col-lg-12">
                    <div class="section-title">
                        <span>Các tin liên quan</span>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://wallpapercave.com/wp/wp4159912.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 TH9 2021</span>
                                <h5>MicroSoft ra mắt bản nâng cấp Xbox Series X</h5>
                                <a href="#">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://file.hstatic.net/1000026716/article/gearvn-laptop-gaming-mong-nhe-danh-cho-sinh-vien-bannerss_b35f8ae43453400d916ae03b43f19f2c.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 TH9 2022</span>
                            <h5>Những chiếc Laptop Gaming mỏng nhẹ cho sinh viên</h5>
                            <a href="#">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="https://zentalk.vn/data/seo_thread_images/4rByRNS0qw.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 TH9 2021</span>
                            <h5>ASUS ROG Huracan G21CX Đánh giá và Cảm nhận</h5>
                            <a href="#">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                </div>
                </div>
    </section>
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="img/Logo_1.png" alt=""></a>
                        </div>
                        <p>Trải nghiệm Gaming Gear đỉnh cao cùng HTC Gear Store</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Cửa Hàng</h6>
                        <ul>
                            <li><a href="#">PC Gaming</a></li>
                            <li><a href="#">Laptop Gaming</a></li>
                            <li><a href="#">Console</a></li>
                            <li><a href="#">Ưu Đãi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Khác</h6>
                        <ul>
                            <li><a href="#">Giỏ Hàng</a></li>
                            <li><a href="#">Tin Tức</a></li>
                            <li><a href="#">Về Chúng Tôi</a></li>
                            <li><a href="#">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Nhận ưu đãi nhanh</h6>
                        <div class="footer__newslatter">
                            <p>Nhận thông tin khuyến mãi mới nhất từ HTC Gear Store</p>
                            <form action="#">
                                <input type="text" placeholder="Email của bạn">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            Đức Hùng,Mạnh Thời ft Rapper Cường
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- Footer Section End -->
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

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