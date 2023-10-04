<?php if (isset($data["banner"])) : ?>
    <div class="carousel-container position-relative row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($data["banner"] as $key => $banner) : ?>
                <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>" data-slide-number="<?= $key ?>">
                    <img src="<?= URL . 'public/img/banner/' . $banner['image'] ?>" class="bannerimg" alt="...">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row mx-0 center">
                    <?php foreach ($data["banner"] as $key => $banner) : ?>
                    <div id="carousel-selector-<?= $key ?>" class="thumb col-4 col-sm-2 px-1 py-2 selected"
                        data-target="#myCarousel" data-slide-to="<?= $key ?>">
                        <img src="<?= URL . 'public/img/banner/' . $banner['image'] ?>" class="img-fluid" alt="...">
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
<?php endif; ?>