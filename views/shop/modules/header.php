<nav class="navbar navbar-expand-lg navbar-red navbar-dark fixed-top">
    <div class="wrapper"></div>

    <div class="container-fluid all-show">
        <a href="<?= URL ?>index.php/home">
            <div class="logo">
                <img src="<?php echo URL; ?>public/img/book/BS.jpg" alt="">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse media2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto md-sm-lg-0">
                <li class="nav-item">
                    <div class="menubut">
                        <a class="nav-link menuitem" href="<?= URL ?>index.php/home">TRANG CHỦ <span
                                class="sr-only">(current)</span></a>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="menubut">
                        <a class="nav-link menuitem" href="<?= URL ?>index.php/home/sale?page=1" tabindex="-1"
                            aria-disabled="true">GIẢM GIÁ</a>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="menubut">
                        <a class="nav-link menuitem" href="<?= URL ?>index.php/home/news?page=1" tabindex="-1"
                            aria-disabled="true">TIN TỨC</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown menubut">
                        <a class="nav-link menuitem dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                            tabindex="-1" aria-disabled="true">DANH MỤC</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php foreach ($data["category"] as $value) : ?>
                            <a class="dropdown-item"
                                href="<?= URL ?>index.php/home/category?category=<?= $value["id"] ?>&page=1"
                                style="color: #6c757d; font-size: 16px;"><?= $value["category_name"] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="navbar narbar2 navbar-light">

                    <div class="input-group">
                        <form id="searchForm" action="<?= URL ?>index.php/home/search?value=value&page=1" method="post"
                            class="form-inline">
                            <input id="searchInput" type="text" name="search" class="form-control resi"
                                style="height: 48px;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-light btn-lg btn-outline-light res"
                                    style="height: 48px;">
                                    <i class="fas fa-search icn"></i>
                                </button>
                            </div>
                        </form>
                    </div>



                </li>
            </ul>
            <ul class="navbar-nav ml-auto sm-lg-0">
                <div class="navbar narbar2 navbar-light">

                    <a href="<?= URL ?>index.php/home/cartview" class="mr-2">
                        <button type="button" class="btn btn-primary btn-lg btn-outline-primary res"><i
                                class="fas fa-shopping-cart icn"></i></button>

                    </a>
                    <li class="nav-item dropdown cartli">
                        <?php
                            if (isset($_SESSION['user'])) {
                            ?>
                        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <button type="button" class="btn btn-primary btn-lg btn-outline-primary res2">
                                <div> <img class='proo card-img-top ui'
                                        style='width: 32px; height: 32px; border-radius:16px;'
                                        src='<?= URL ?>public/img/avatar/<?= $_SESSION['avatar']?>'
                                        alt='<?= $_SESSION['avatar']?>'>
                                    <span class="uname"><?= $_SESSION['user'] ?></span>
                                </div>
                            </button>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                            <?php
                                        if ($_SESSION['role'] != 0) {
                                            echo "<a href='" . URL . "index.php/admin' class='dropdown-item'>Quản lý</a>";
                                        }
                                        ?>
                            <a class="dropdown-item" href="<?= URL ?>index.php/home/detailsUser">Chi tiết</a>
                            <a class="dropdown-item" href="<?= URL ?>index.php/home/logout">Đăng xuất</a>

                        </div>
                </div>


                <?php
                            } else {


                ?>
                <a href="<?= URL ?>index.php/home/login" class="mr-2">
                    <button type="button" class="btn btn-primary btn-lg btn-outline-primary">Đăng nhập</button>
                </a>
                <a href="<?= URL ?>index.php/home/register" class="mr-2">
                    <button type="button" class="btn btn-primary btn-lg btn-outline-primary">Đăng ký</button>
                </a>
                <?php
                            }
                ?>
                </li>
            </ul>
        </div>
    </div>
    <a href="#" title="Back to top" style="position: fixed; bottom: 20px; right: 20px; ">
        <img style="height: 100px;width: 100px;" src="<?= URL ?>\public\images\go-to-top.png" alt="">
    </a>
</nav>
<nav class="navbar navbar-expand-md "></nav>
<script>
document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var searchValue = document.getElementById("searchInput").value;
    var formAction = "<?= URL ?>index.php/home/search?value=" + searchValue + "&page=1";
    document.getElementById("searchForm").action = formAction;
    this.submit();
});

</script>