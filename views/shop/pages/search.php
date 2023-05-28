<div class="container2 text-center">
    <div class="h2 mb-5">Kết quả tìm kiếm</div>
    <div class="row" id="newsu">
        <div class="col-12 row">
            <?php
            if ($data["search"] == NULL) { ?>
            <h5>Không có kết quả tìm kiếm</h5>
            <?php } else {
                foreach ($data["search"] as $value) : ?>
            <div class='col-lg-3 col-md-6 col-sm-6 col-6 mt-3'>
                <div class='card product p-2' styte='width:auto'>
                    <a href="<?= URL ?>index.php/home/details/<?= $value["id"] ?>">
                        <img class='proo card-img-top' style='width: 100%; height: 400px;'
                            src="<?= URL ?>public/img/book/<?= $value["image"] ?> " alt="<?= $value["image"] ?>">
                    </a>
                    <div class='card-title product-title text-center h5'><a
                            href="<?= URL ?>index.php/home/details/<?= $value["id"] ?>"
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
                        <a onclick='notification();' href="<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>">
                            <i class='fas fa-cart-plus'></i>
                        </a>
                    </span>
                </div>
            </div>
            <?php endforeach;
            } ?>


        </div>
        <?= $data['paginator'] ?>
    </div>