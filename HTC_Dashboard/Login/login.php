<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" type="image/png" href="./img/favicon.png">
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="validate.php" method="post" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <img src="./img/Logo.png">
                        </div>
                        <div class="heading">
                            <h2>Đăng Nhập</h2>
                            <h6>Bạn chưa có tài khoản?</h6>
                            <a class="toggle">Đăng ký</a>
                        </div>
                        <!-- Báo lỗi -->

                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="uname" class="input-field" autocomplete="off" required />
                                <label>Tài khoản</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" autocomplete="off" required />
                                <label>Mật khẩu</label>
                            </div>

                            <input type="submit" value="Đăng Nhập" class="sign-btn" />

                            <p class="text">
                                Bạn quên mật khẩu hoặc thông tin tài khoản?
                                <a href="#">Trợ giúp</a> đăng nhập
                            </p>
                        </div>
                    </form>

                    <form action="signup-check.php" method="post" autocomplete="off" class="sign-up-form">
                        <div class="logo">
                            <img src="./img/Logo.png">
                        </div>

                        <div class="heading">
                            <h2>Đăng Ký</h2>
                            <h6>Bạn đã có tài khoản?</h6>
                            <a class="toggle">Đăng Nhập</a>
                        </div>
                        <!-- Thông báo -->
                        
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <?php if (isset($_GET['name'])) { ?>
                                    <input type="text" name="name" placeholder="Tên Người Dùng" class="input-field" value="<?php echo $_GET['name']; ?>" autocomplete="off" required />
                                <?php } else { ?>
                                    <input type="text" name="name" placeholder="Tên Người Dùng" class="input-field" autocomplete="off" required><br>
                                <?php } ?>
                            </div>

                            <div class="input-wrap">
                                <?php if (isset($_GET['uname'])) { ?>
                                    <input type="text" name="uname" placeholder="Tài khoản" class="input-field" autocomplete="off" required value="<?php echo $_GET['uname']; ?>"><br>
                                <?php } else { ?>
                                    <input type="text" name="uname" placeholder="Tài khoản" class="input-field" autocomplete="off" required><br>
                                <?php } ?>
                                <!-- <label>Tài Khoản</label> -->
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" autocomplete="off" required />
                                <label>Mật khẩu</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="re_password" class="input-field" autocomplete="off" required />
                                <label>Nhập lại mật khẩu</label>
                            </div>

                            <input type="submit" value="Đăng Ký" class="sign-btn" />

                        </div>
                    </form>
                </div>
                <div class="carousel"> </div>
            </div>
        </div>
    </main>
    <!-- Javascript file -->
    <script src="login.js"></script>
</body>

</html>