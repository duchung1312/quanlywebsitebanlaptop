<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="shortcut icon" type="image/png" href="./img/logo.png">
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="dangnhap.php" method="post" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="./img/logo.png">
                            <h4>HTC Gear Store</h4>
                        </div>
                        <div class="heading">
                            <h2>Đăng Nhập</h2>
                            <h6>Bạn chưa có tài khoản?</h6>
                            <a  class="toggle">Đăng ký</a>
                        </div>
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="uname" class="input-field" autocomplete="off" required />
                                <label>Tài khoản</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" autocomplete="off"
                                    required />
                                <label>Mật khẩu</label>
                            </div>

                            <input type="submit" value="Đăng Nhập" class="sign-btn" />

                            <p class="text">
                                Bạn quên mật khẩu hoặc thông tin tài khoản?
                                <a href="#">Trợ giúp</a> đăng nhập
                            </p>
                        </div>
                    </form>

                    <form autocomplete="off" class="sign-up-form">
                        <div class="logo">
                            <img src="./img/logo.png">
                            <h4>HTC Gear Store</h4>
                        </div>

                        <div class="heading">
                            <h2>Đăng Ký</h2>
                            <h6>Bạn đã có tài khoản?</h6>
                            <a  class="toggle">Đăng Nhập</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Tên</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" class="input-field" autocomplete="off" required />
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Mật khẩu</label>
                            </div>

                            <input type="submit" value="Đăng Ký" class="sign-btn" />

                            <p class="text">
                                By signing up, I agree to the
                                <a href="#">Terms of Services</a> and
                                <a href="#">Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="carousel"> </div>
            </div>
        </div>
    </main>
    <!-- Javascript file -->
    <script src="js/dangnhap.js"></script>
</body>

</html>