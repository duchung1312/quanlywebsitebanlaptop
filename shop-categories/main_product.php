<?php
require_once("cart.php");
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
        $product_array = $db_handle->runQuery("SELECT * FROM sanpham ORDER BY DonGia ASC");
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <form method="post" action="shopping-cart.php?action=add&MaSP=<?php echo $product_array[$key]["MaSP"]; ?>">
                            <div class="product__item__pic set-bg" data-setbg="HTC_Dashboard/img/<?php echo $product_array[$key]["AnhSP"]; ?>">
                                <ul class="product__hover">
                                    <li><a href="./wishlist.php"><img src="img/icon/heart.png" alt=""></a></li>
                                    </li>
                                    <li><a href="shop-details.php?id=<?php echo $product_array[$key]["MaSP"] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6> <?php echo $product_array[$key]["TenSP"] ?></h6>
                                <a href="#"><input type="submit" value="+Thêm vào giỏ hàng" class="add-cart" /></a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5><?php echo number_format($product_array[$key]["DonGia"]) ?>₫</h5>
                                <div class="cart-action"><input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>