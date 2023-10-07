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
    <link href="<?= URL ?>public/backend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= URL ?>public/backend/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= URL ?>public/backend/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= URL ?>public/backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= URL ?>index.php/home/">Trang chủ</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['user'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= URL ?>index.php/home/detailsUser"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= URL ?>/index.php/home/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= URL ?>index.php/admin/bannerList?page=1"><i class="fa fa-fw fa-image"></i>Quản lí banner</a>
                    </li>
                    <li>
                        <a href="<?= URL ?>index.php/admin/cateList?page=1"><i class="fa fa-fw fa-bar-chart-o"></i>Quản lí danh mục</a>
                    </li>
                    <li>
                        <a href="<?= URL ?>index.php/admin/productList?page=1"><i class="fa fa-fw fa-table"></i> Quản lí sản phẩm </a>
                    </li>
                    <li>
                        <a href="<?= URL ?>index.php/admin/usersList?page=1"><i class="fa fa-fw fa-users"></i>Quản lí người dùng</a>
                    </li>
                    <li>
                        <a href="<?= URL ?>index.php/admin/orderList?page=1"><i class="fa fa-fw fa-desktop"></i>Quản lí đơn hàng</a>
                    </li>
                    <li>
                        <a href="<?= URL ?>index.php/admin/newsList?page=1"><i class="fa fa-fw fa-newspaper-o"></i> Quản lí tin tức</a>
                    </li>
    


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quản lí
                        </h1>

                    </div>
                </div>

                <!-- /.row -->
                <?php
                $this->view($data['page'], $data);
                ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= URL ?>public/backend/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= URL ?>public/backend/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

            })
            .catch(error => {
                console.log(error);
            });
    </script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= URL ?>public/backend/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= URL ?>public/backend/js/plugins/morris/morris.min.js"></script>
    <script src="<?= URL ?>public/backend/js/plugins/morris/morris-data.js"></script>

</body>
<script>
    function actionChange(a, i) {

        var r = confirm(a);
        if (r == true) {
            window.location.href = i;
        }
    }
</script>

</html>