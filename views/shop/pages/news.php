<?php
require("public/function/function.php");

?>

<div class="contentbody">
<div class="container2 text-center">
    <div class="h2 mb-5">Sản phẩm giảm giá</div>
    <div class="row" id="newsu">
        <div class="col-12 row">
            <?php foreach ($data["new_list"] as $value) : ?>
            <div class='col-lg-3 col-md-6 col-sm-6 col-6 mt-3'>
            <div class='card2 product p-2 news2'>
                        <a href='<?= URL ?>index.php/home/details_new/<?= $value["id"] ?>'><img
                                class='proo card-img-top' style='width:100%; height: 180px; border-radius:10px;'
                                src='<?= URL ?>public/img/news/<?= $value["avatar"] ?>'
                                alt='<?= $value["avatar"] ?>'></a>
                        <div class='card-title product-title text-center h5'><a
                                href='<?= URL ?>index.php/home/details_new/<?= $value["id"] ?>'
                                class='proo'><?= $value["title"] ?></a></div>
                        <div class='text-center h6 card-title3'><?= $value["short_description"] ?></div>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?= $data['paginator'] ?>
    </div>
</div>
</div>