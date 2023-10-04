<?php
$product = $data["news"];
?>
<div class="container product">
<div class="container2 p-0 chitiettintuc">
    <div class="newss">
        <div class="content container2">
            <div class="title">
            </div>
            <div href="#" class="title-name h5">
                <h2>
                    Tin Tức/<?= $product["title"] ?>
                </h2>
            </div>
            <div>
                <img src="<?= URL ?>public/img/news/<?= $product["avatar"] ?>" style="font-size:40px" alt="">
            </div>
            <div>
                <h5 style="padding-top :20px; padding-bottom :20px;"><?= $product["short_description"] ?></h5>
            </div>
            <div>
                <?= $product["content"] ?>
            </div>

        </div>
    </div>
    </div>