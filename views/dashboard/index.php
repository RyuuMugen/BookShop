<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="<?= URL ?>public/backend/css/sb-admin.css" rel="stylesheet">
    <link href="<?= URL ?>public/backend/css/viewer.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= URL ?>public/backend/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= URL ?>public/backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




</head>

<body class="bg-dark">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= URL ?>index.php/home/">Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" id="toggleButton"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button aria-current="page" class="btn btn-lg res2" type="button"
                    id="toggleButton2"><i class="navbar-toggler-icon"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                    </ul>
                    <div class="d-flex">
                        <div class="nav-item dropdown bg-dark">
                            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <button type="button" class="btn  btn-lg btn-outline-primary res2">
                                    <div> <img class='proo card-img-top ui'
                                            style='width: 32px; height: 32px; border-radius:16px;'
                                            src='<?= URL ?>public/img/avatar/<?= $_SESSION['avatar']?>'
                                            alt='<?= $_SESSION['avatar']?>'>
                                        <span class="uname"><?= $_SESSION['user'] ?></span>
                                    </div>
                                </button>
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item light list-group-item bg-dark text-decoration-none"
                                    href="<?= URL ?>index.php/home/detailsUser">Chi tiết</a>
                                <a class="dropdown-item light list-group-item bg-dark text-decoration-none"
                                    href="<?= URL ?>index.php/home/logout">Đăng xuất</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-2 clear" id="contentDiv2">

            <ul class="list-group bg-dark">

                <a href="<?= URL ?>index.php/admin/bannerList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-image"></i>Quản lí banner
                </a>
                <a href="<?= URL ?>index.php/admin/cateList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-bar-chart-o"></i>Quản lí danh mục
                </a>
                <a href="<?= URL ?>index.php/admin/productList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-table"></i> Quản lí sản phẩm
                </a>
                <a href="<?= URL ?>index.php/admin/usersList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-users"></i>Quản lí người dùng
                </a>
                <a href="<?= URL ?>index.php/admin/orderList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-desktop"></i>Quản lí đơn hàng
                </a>
                <a href="<?= URL ?>index.php/admin/newsList?page=1"
                    class="light list-group-item bg-dark text-decoration-none">
                    <i class="fa fa-fw fa-newspaper-o"></i> Quản lí tin tức
                </a>
            </ul>
        </div>
        <div class="col-10 clear" id="contentDiv3">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản lí
                        </h1>

                    </div>
                </div>
                <?php
            $this->view($data['page'], $data); ?>

            </div>

        </div>


    </div>


</body>
<script src="<?= URL ?>public/backend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= URL ?>public/backend/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= URL ?>public/backend/js/plugins/morris/raphael.min.js"></script>
<script src="<?= URL ?>public/backend/js/plugins/morris/morris.min.js"></script>
<script src="<?= URL ?>public/backend/js/plugins/morris/morris-data.js"></script>
<script src="<?= URL ?>public/backend/js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>