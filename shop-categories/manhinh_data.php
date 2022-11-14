<?php

require 'HTC_Dashboard/db_conn.php';

$sql = "SELECT * FROM sanpham WHERE TenDM='Màn Hình' ";

$result = mysqli_query($links, $sql);

?>
<div class="col-lg-9">
    <div class="shop__product__option">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__left">
                    <p>Tìm Thấy 1-12 Sản Phẩm Trong 126 </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__right">
                    <p>Sắp xếp theo giá:</p>
                    <select>
                        <option value="">Thấp - Cao</option>
                        <option value="">Cao - Thấp</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($value = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="HTC_Dashboard/img/<?php echo $value['AnhSP']; ?>">
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                </li>
                                <li><a href="shop-details.php?id=<?php echo $value['MaSP'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6> <?php echo $value['TenSP'] ?></h6>
                            <a href="shopping-cart.php?id=<?php echo $value['MaSP'] ?> " class="add-cart">+ Thêm vào giỏ hàng</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><?php echo number_format ($value['DonGia']) ?>đ</h5>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>