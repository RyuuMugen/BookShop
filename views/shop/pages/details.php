<?php
$product = $data["details"];
$comments = $data["comment"];
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
    <div class="container3 ">
        <form action="<?= URL ?>index.php/home/postComment/<?= $product["id"] ?>" method="post">
            <h4 for="comment">Bình luận:</h4>
            <div style="display: flex; align-items: center;">
                <textarea class="form-control" id="editor" name="comment"></textarea>
                <?php if (isset($_SESSION['user_id'])): ?>
                <input type="submit" value="Gửi bình luận" style="margin-left: 10px;">
                <?php else: ?>
                <p>Vui lòng đăng nhập để bình luận.</p>
                <?php endif; ?>
            </div>
        </form>

        <?php $displayedComments = 5; ?>

        <div id="commentContainer">
            <?php foreach ($comments as $index => $comment) : ?>
            <?php if ($index < $displayedComments) : ?>
            <div class="comment">
                <img class='proo card-img-top' style='width: 32px; height: 32px; border-radius:16px;'
                    src='<?= URL ?>public/img/avatar/<?= $comment['avatar']?>' alt='<?= $comment['avatar']?>'>
                <b class="comment-author"><?php echo $comment['name']; ?>:</b></br>
                <span class="comment-content"><?php echo $comment['content']; ?></span>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Hiển thị nút "Xem thêm" nếu còn bình luận để hiển thị -->
        <?php if (count($comments) > $displayedComments) : ?>
        <button id="loadMoreBtn" onclick="loadMoreComments()">Xem thêm</button>
        <?php endif; ?>
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
    var displayedComments = <?php echo $displayedComments; ?>;
    var totalComments = <?php echo count($comments); ?>;
    var comments = <?php echo json_encode($comments); ?>;

    function loadMoreComments() {
        var commentContainer = document.getElementById('commentContainer');
        var loadMoreBtn = document.getElementById('loadMoreBtn');

        for (var i = displayedComments; i < displayedComments + 5; i++) {
            if (i >= totalComments) {
                loadMoreBtn.style.display = 'none';
                break;
            }

            var commentElement = document.createElement('div');
            commentElement.className = 'comment';
            commentElement.innerHTML = `
            <img class='proo card-img-top' style='width: 32px; height: 32px; border-radius:16px;'
                                            src='<?= URL ?>public/img/avatar/${comments[i].avatar}'
                                            alt='${comments[i].name}'>
        <b class="comment-author">${comments[i].name}:</b></br>
        <span class="comment-content">${comments[i].content}</span>
      `;
            commentContainer.appendChild(commentElement);
        }

        displayedComments += 5;
    }
    </script>