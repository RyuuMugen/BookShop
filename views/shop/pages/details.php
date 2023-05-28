<?php
$product = $data["details"];
?>
<div class="container p-0 chitietsanpham">
    <h3>Sản phẩm/<?= $product["product_name"] ?></h3>

    <div class="sanpham">
        <div class="hinhanh mt-3">
            <img id="mainImage" src="<?= URL ?>public/img/book/<?= $product["image"] ?>" alt=""
                style='width: 80%; height: 600px;'>

            <div class="listimg" id="imageCarousel">
                <img class='proo card-img-top' id="thumbnail0" src="<?= URL ?>public/img/book/<?= $product["image"] ?>"
                    alt='<?= $value["image"] ?>'>
                <?php foreach ($data["cover"] as $index => $value) : ?>
                <img class='proo card-img-top' id="thumbnail<?= $index ?>"
                    src='<?= URL ?>public/img/bookinfo/<?= $value["book_images"] ?>' alt='<?= $value["image"] ?>'>
                <?php endforeach; ?>
            </div>

            <div class="mt-4 mb-4 container2" style='width: 80%; height: auto;'>
                <h3>Giới thiệu: </h3><?=$product["product_detail"]; ?>
            </div>
        </div>


        <div class="content container2 mt-3">
            <div class="title">
                <div href="#" class="title-name h5"><?= $product["product_name"] ?></div>
                <div class="title-ma">Mã sản phẩm: <b><?= $product["id"] ?></b> </div>
                <div class="title-ma">Nhà xuất bản: <b><?= $product["publisher"] ?></b></div>
                <div class="title-ma">Tác giả: <b><?= $product["author"] ?></b></div>
                <div class="title-trangthai">Số lượng: <b><?= $product["quantity"] ?></b> </div>
            </div>

            <?php if ($product["sale"] == 1) { ?>
            <div class="price" style='text-decoration-line:line-through'>
                <?= number_format($product["price"], 0, '', ',') ?> VNĐ</div>
            <div class="price">
                <?= number_format($product["price"] - ($product["price"] * ($product["saleprice"] / 100)), 0, '', ',') ?>
                VNĐ giảm:<span style="color:red"> <?= number_format($product["saleprice"], 0, '', ',') ?> %</span></div>
            <?php } elseif ($product["sale"] == 0) { ?>
            <div class="price"><?= number_format($product["price"], 0, '', ',') ?> VNĐ</div>
            <?php } ?>
            <?php if ($product["quantity"] <= 0) { ?>
            <button class="btn btn-primary">Hết hàng</button>
            <?php } else { ?>
            <a onclick='notification();' href="<?= URL ?>index.php/home/addcart/<?= $product["id"] ?> "
                class="btn btn-primary themhang">Thêm vào giỏ</a>
            <?php } ?>
            <div class="content-footer">
                <div class="giaohang">
                    <div><i class="fas fa-truck"></i></div>
                    <div class="giaohang-content">
                        <h4>MIỄN PHÍ GIAO HÀNG TOÀN QUỐC</h4>
                        <p>(Sản phẩm trên 300,000đ)</p>
                    </div>

                </div>
                <div class="giaohang">
                    <div><i class="fas fa-file-invoice"></i></div>
                    <div class="giaohang-content">
                        <h4>ĐỔI TRẢ DỄ DÀNG</h4>
                        <p>(Đổi trả 24h cho tất cả sản phẩm đầy đủ tem mác)</p>
                    </div>

                </div>
                <div class="giaohang">
                    <div><i class="fas fa-phone-alt"></i></div>
                    <div class="giaohang-content">
                        <h4>TỔNG ĐÀI BÁN HÀNG 1800 1162</h4>
                        <p>(Miễn phí từ 8h30 - 21:30 mỗi ngày)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.proo').click(function() {
            var imageSrc = $(this).attr('src');
            var thumbnailId = $(this).attr('id');
            var index = thumbnailId.replace('thumbnail', '');
            var mainImage = $('#mainImage');
            mainImage.attr('src', imageSrc);
            mainImage.attr('alt', thumbnailId);
        });
    });
    </script>