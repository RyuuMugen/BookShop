<?php if (isset($data["banner"])) : ?>
    <script>
        $('.carousel').carousel({
            interval: 200
        })
    </script>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($data["banner"]); $i++) : ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>" <?= $i === 0 ? ' class="active"' : '' ?>>
                </li>
            <?php endfor; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($data["banner"] as $key => $banner) : ?>
                <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>" style="height: 400px;">
                    <img src="<?= URL . 'public/img/banner/' . $banner['image'] ?>" class="d-block w-100" alt="..."
                         style="height: 400px;">
                    <div class="carousel-caption d-none d-md-block">
            
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php endif; ?>
