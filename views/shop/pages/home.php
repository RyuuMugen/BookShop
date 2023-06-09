<?php
require("public/function/function.php");
?>

<div class="h3 mb-5 container">Sản phẩm Mới</div>
<div class="col-12 row" id="newsu">
    <div class="col-10 row-2">
        <?php foreach ($data["new_products"] as $value) : ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-6 mt-3">
            <div class="card product p-2" style="width: auto;">
                <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'>
                    <img class='proo card-img-top' style='width: 100%; height: 400px;'
                        src='<?= URL ?>public/img/book/<?= $value["image"] ?>' alt='<?= $value["image"] ?>'>
                </a>
                <div class="card">
                    <div class='card-title product-title text-center h5'>
                        <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'
                            class='proo'><?= $value["product_name"] ?></a>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php if ($value['sale'] == 1) : ?>
                        <p class='price text-center h6' style='text-decoration-line:line-through'>
                            <?= number_format($value["price"], 0, '', ',') ?> VNĐ</p>
                        <p class='price text-center h6'>
                            <?= number_format($value["price"] - ($value["price"] * ($value["saleprice"] / 100)), 0, '', ',') ?>
                            VNĐ</p>
                        <?php else : ?>

                        <div class='price text-center h6'><?= number_format($value["price"], 0, '', ',') ?> VNĐ</div>
                        <div class='price text-center h6' style='color: transparent;'>.</div>
                        <?php endif; ?>
                    </h6>
                    <span class='text-center add-to-cart add-cart btn btn-outline-warning' onclick='tks()'>
                        <a onclick='notification();' href='<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </span>
                    <div class='price text-center h6' style='color: transparent;'>.</div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="col-2 row-2 menu-right">
        <?php $this->view("shop/modules/sidebar", $data); ?>
    </div>

</div>
<?php if (isset($_SESSION['user_id']) && !empty($data["recomment"])) : ?>
<div class="h3 mt-5 over">Sản phẩm đề xuất
    <a style="float:right; font-size:20px;" href="<?= URL ?>index.php/home/recommend/1" tabindex="-1"
        aria-disabled="true">xem thêm</a>
</div>
<div class="row" id="newsu">
    <div class="col-12 row">
        <?php foreach ($data["recomment"] as $value) : ?>
        <div class='col-lg-3 col-md-6 col-sm-6 col-6 mt-3'>
            <div class="card product p-2" style="width: auto;">
                <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'>
                    <img class='proo card-img-top' style='width: 100%; height: 400px;'
                        src='<?= URL ?>public/img/book/<?= $value["image"] ?>' alt='<?= $value["image"] ?>'>
                </a>
                <div class="card">
                    <div class='card-title product-title text-center h5'>
                        <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'
                            class='proo'><?= $value["product_name"] ?></a>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php if ($value['sale'] == 1) : ?>
                        <p class='price text-center h6' style='text-decoration-line:line-through'>
                            <?= number_format($value["price"], 0, '', ',') ?> VNĐ</p>
                        <p class='price text-center h6'>
                            <?= number_format($value["price"] - ($value["price"] * ($value["saleprice"] / 100)), 0, '', ',') ?>
                            VNĐ</p>
                        <?php else : ?>

                        <div class='price text-center h6'><?= number_format($value["price"], 0, '', ',') ?> VNĐ</div>
                        <div class='price text-center h6' style='color: transparent;'>.</div>
                        <?php endif; ?>
                    </h6>
                    <span class='text-center add-to-cart add-cart btn btn-outline-warning' onclick='tks()'>
                        <a onclick='notification();' href='<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </span>
                    <div class='price text-center h6' style='color: transparent;'>.</div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
<div class="h3 mt-5 over">Sản phẩm Giảm giá
    <a style="float:right; font-size:20px;" href="<?= URL ?>index.php/home/sale/1" tabindex="-1"
        aria-disabled="true">xem thêm</a>
</div>
<div class="row" id="newsu">
    <div class="col-12 row">
        <?php foreach ($data["sale_products"] as $value) : ?>
        <div class='col-lg-3 col-md-6 col-sm-6 col-6 mt-3'>
            <div class="card product p-2" style="width: auto;">
                <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'>
                    <img class='proo card-img-top' style='width: 100%; height: 400px;'
                        src='<?= URL ?>public/img/book/<?= $value["image"] ?>' alt='<?= $value["image"] ?>'>
                </a>
                <div class="card">
                    <div class='card-title product-title text-center h5'>
                        <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'
                            class='proo'><?= $value["product_name"] ?></a>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <p class='price text-center h6' style='text-decoration-line:line-through'>
                            <?= number_format($value["price"], 0, '', ',') ?> VNĐ</p>
                        <p class='price text-center h6'>
                            <?= number_format($value["price"] - ($value["price"] * ($value["saleprice"] / 100)), 0, '', ',') ?>
                            VNĐ</p>
                    </h6>
                    <span class='text-center add-to-cart add-cart btn btn-outline-warning' onclick='tks()'>
                        <a onclick='notification();' href='<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>'>
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </span>
                    <div class='price text-center h6' style='color: transparent;'>.</div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


</div>
<div class="h3 mt-5">Tin tức mới nhất
    <a style="float:right;font-size:20px;" href="<?= URL ?>index.php/home/newss/1" tabindex="-1"
        aria-disabled="true">xem thêm</a>
</div>
<div class="row">
    <div class="col-12 row">
        <?php foreach ($data["news_list"] as $value) : ?>
        <div class='col-lg-4 col-md-6 col-sm-6 col-6 mt-3'>
            <div class="card product p-2" style="width: auto;">
                <a href='<?= URL ?>index.php/home/details_news/<?= $value["id"] ?>'><img class='proo card-img-top'
                        style='width: 100%; height: 180px;' src='<?= URL ?>public/img/news/<?= $value["avatar"] ?>'
                        alt='<?= $value["avatar"] ?>'></a>
                <div class="card">
                    <div class='card-title product-title text-center h5'><a
                            href='<?= URL ?>index.php/home/details_news/<?= $value["id"] ?>'
                            class='proo'><?= $value["title"] ?></a></div>
                    <div class='text-center h6 card-title2'><?= $value["short_description"] ?></div>
                    <div class='price text-center h6' style='color: transparent;'>.</div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


</div>

</div>