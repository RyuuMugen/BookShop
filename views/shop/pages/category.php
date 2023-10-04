<?php require("public/function/function.php"); ?>
<div class="container product">

<div class="row">
    <div class="col-10 row" id="newsu">
    <div class="h3 mb-5">Sản phẩm</div>
        <?php if (count($data["product_cate"]) == 0) : ?>
        <div class='h1 text-warning'>Không có sản phẩm vui lòng chọn danh mục khác</div>
        <?php else : ?>
        <?php foreach ($data["product_ed"] as $value) : ?>
        <div class='col-lg-4 col-md-6 col-sm-6 col-6 mt-3'>
            <div class='card product p-2' style='width:auto'>
                <a href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'><img class='proo card-img-top'
                        style='width: 250px; height: 400px;' src='<?= URL ?>public/img/book/<?= $value["image"] ?>'
                        alt='<?= $value["image"] ?>'></a>
                <div class='card-title product-title text-center h5'><a
                        href='<?= URL ?>index.php/home/details/<?= $value["id"] ?>'
                        class='proo'><?= $value["product_name"] ?></a></div>
                <?php if ($value['sale'] == 1) { ?>
                <div class='price text-center h6' style='text-decoration-line:line-through'>
                    <?= number_format($value["price"], 0, '', ',') ?> VNĐ</div>
                <div class='price text-center h6'>
                    <?= number_format($value["price"] - ($value["price"] * ($value["saleprice"] / 100)), 0, '', ',') ?>
                    VNĐ</div>
                <?php } else { ?>
                <div class='price text-center h6'><?= number_format($value["price"], 0, '', ',') ?> VNĐ</div>
                <div class='price text-center h6' style='color: transparent;'>.</div>
                <?php } ?>
                <span class='text-center add-to-cart add-cart btn btn-outline-warning' onclick='tks()'>
                    <a href='<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>'>
                        <i class='fas fa-cart-plus'></i>
                    </a>
                </span>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if (count($data["product_ed"]) > 0) : ?>
        <?= $data['paginator'] ?>
        <?php endif; ?>

    </div>

    <div class="col-2 menu-right">
        <?php $this->view("shop/modules/sidebar", $data); ?>
    </div>
</div>
</div>