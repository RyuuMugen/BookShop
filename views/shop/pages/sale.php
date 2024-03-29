<div class="contentbody">
    <div class="container2 text-center">
        <div class="h2 mb-5">Sản phẩm giảm giá</div>
        <div class="row" id="newsu">
            <div class="col-12 row">
                <?php foreach ($data["sale_products"] as $value) : ?>
                <div class='col-lg-2 col-md-6 col-sm-6 col-6 mt-3'>
                    <div class='card2 product p-2' style='width:auto'>
                        <a href="<?= URL ?>index.php/home/details?id=<?= $value["id"] ?>&page=1">
                            <img class='proo card-img-top' id="myImage<?= $index ?>"
                                src='<?= URL ?>public/img/book/<?= $value["image"] ?>' alt='<?= $value["image"] ?>'></a>
                        <div class='card-title product-title text-center h5'>
                            <a href="<?= URL ?>index.php/home/details?id=<?= $value["id"] ?>&page=1"
                                class='proo'><?= $value["product_name"] ?></a>
                        </div>
                        <div class='price text-center h6' style='text-decoration-line:line-through'>
                            <?= number_format($value["price"], 0, '', ',') ?> VNĐ
                        </div>
                        <div class='price text-center h6'>
                            <?= number_format($value["price"] - ($value["price"] * ($value["saleprice"] / 100)), 0, '', ',') ?>
                            VNĐ
                        </div>
                        <span class='text-center add-to-cart add-cart btn btn-outline-warning' onclick='tks()'>
                            <a onclick='notification();' href='<?= URL ?>index.php/home/addcart/<?= $value["id"] ?>'>
                                <i class='fas fa-cart-plus'></i>
                            </a>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?= $data['paginator'] ?>
        </div>
    </div>
</div>