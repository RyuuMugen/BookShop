<?php require("public/function/function.php"); ?>
<div class="contentbody">

    <div class="row " id="newsu">
        <div class="col-10 over" >
            <div class="h3 mb-5">Sản phẩm</div>
            <?php if (count($data["product_cate"]) == 0) : ?>
            <div class='h1 text-warning'>Không có sản phẩm vui lòng chọn danh mục khác</div>
            <?php else : ?>
            <?php foreach ($data["product_ed"] as $value) : ?>
            <div class='col-lg-3 col-md-6 col-sm-6 col-6 mt-3'>
                <div class="card2 product p-2" style="width: auto;">
                    <a href='<?= URL ?>index.php/home/details?id=<?= $value["id"] ?>&page=1'>
                        <img class='proo card-img-top' style='width: 100%; height: 400px;'
                            src='<?= URL ?>public/img/book/<?= $value["image"] ?>' alt='<?= $value["image"] ?>'>
                    </a>
                    <div class="card">
                        <div class='card-title product-title text-center h5'>
                            <a href='<?= URL ?>index.php/home/details?id=<?= $value["id"] ?>&page=1'
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

                            <div class='price text-center h6'><?= number_format($value["price"], 0, '', ',') ?> VNĐ
                            </div>
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
            <?php endif; ?>
        </div>
        <div class="col-2 menu-right over">
            <?php $this->view("shop/modules/sidebar", $data); ?>
        </div>
        <div class="col-10 over center">
            <?= $data['paginator'] ?>
        </div>
    </div>
</div>