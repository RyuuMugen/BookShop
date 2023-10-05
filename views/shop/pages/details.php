<?php
$product = $data["details"];
$comments = $data["comment"];
?>
<div class="contentbody">
    <div class="container p-0 chitietsanpham " id="newsu2">
        <h3>Sản phẩm/<?= $product["product_name"] ?></h3>

        <div class="sanpham">
            <div class="hinhanh mt-3">
                <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="mainImage" class="ac" src="<?= URL ?>public/img/book/<?= $product["image"] ?>"
                                alt="" style='width: 80%; height: 600px;'>
                        </div>
                        <?php foreach ($data["cover"] as $index => $value) : ?>
                        <div class="carousel-item">
                            <img class='proo card-img-top ac' id="thumbnail<?= $index ?>"
                                src='<?= URL ?>public/img/bookinfo/<?= $value["book_images"] ?>'
                                alt='<?= $value["image"] ?>' style='width: 80%; height: 600px;'>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div id="thumbSlider" class="carousel slide" data-interval="false">
                    <div class="carousel-inner clear">
                        <div class="carousel-item active">
                            <div class="row listimg">
                                <div data-target="#myCarousel" data-slide-to="0" class="thumb col-sm-4 active">
                                    <img id="mainImage" class="proo card-img-top"
                                        src="<?= URL ?>public/img/book/<?= $product["image"] ?>" alt="">
                                </div>
                                <?php foreach ($data["cover"] as $index => $value) : ?>
                                <div data-target="#myCarousel" data-slide-to="<?= $index+=1 ?>" class="thumb col-sm-4">
                                    <img class='proo card-img-top'
                                        src='<?= URL ?>public/img/bookinfo/<?= $value["book_images"] ?>'
                                        alt='<?= $value["image"] ?>'>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

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
                    VNĐ giảm:<span style="color:red"> <?= number_format($product["saleprice"], 0, '', ',') ?> %</span>
                </div>
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
        <div class="container2 ">
            <div class="container pd">
                <form action="<?= URL ?>index.php/home/postComment/<?= $product["id"] ?>" method="post">
                    <h4 for="comment">Bình luận:</h4>
                    <div class="row ">
                        <div style="display: flex; align-items: center;">
                            <div class="col-10">
                                <textarea class="form-control" id="editor" name="comment" cols="8"></textarea>
                            </div>
                            <div class="col-2">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                <input type="submit" value="Gửi bình luận" style="margin-left: 10px;">
                                <?php else: ?>
                                <p>Vui lòng <a href="<?= URL ?>index.php/home/login" class="mr-2">đăng nhập</a> để bình
                                    luận.</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container pd">

                <?php foreach ($data['comment'] as $value) : ?>
                <div class="row commentContainer">
                    <div class="col-2">
                        <img class='round' src='<?= URL ?>public/img/avatar/<?= $value['avatar']?>'
                            alt='<?= $value['avatar']?>'>
                    </div>
                    <div class="col-8 eclip">
                        <h4><?= $value['name'] ?></h4>
                        <div class="content">
                            <?= $value['content'] ?>
                        </div>
                    </div>
                    <div class="col-2">
                        <p><?= $value['date'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>



                <?= $data['paginator'] ?>
            </div>

        </div>
    </div>
</div>
</div>

<script>
$(".ac").imgbox({
    zoom: true,
    drag: true
});
ClassicEditor
    .create(document.querySelector('#editor'), {

    })
    .catch(error => {
        console.log(error);
    });
</script>