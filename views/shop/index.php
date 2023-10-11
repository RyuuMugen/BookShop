<!DOCTYPE html>
<html>

<head>
    <title>BookStore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL; ?>public/backend/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/style-1.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/style-user.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/stylecard.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/login.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/banner.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/menu.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/detail.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/public/css/media.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo URL; ?>public/img/book/BS2.ico"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400500600&display=swap" rel="stylesheet">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0">
    </script>
    <script src="<?= URL ?>/public/js/control.js"></script>
    <script src="<?= URL ?>/public/js/banner.js"></script>
    <script src="<?= URL ?>/public/js/detail.js"></script>
    <script src="<?= URL ?>/public/js/jqueryimgbox.js"></script>

</head>

<body>
    <!-- --header-- -->
    <?php $this->view("shop/modules/header",$data); ?>
    
    <!-- ---- -->

    <!-- --body-- -->
    <!-- --banner-- -->
    <div class="banner">
        <?php $this->view("shop/modules/banner" , $data); ?>
    </div>
    <!-- ---- -->
    <!-- --product-- -->
    <?php $this->view($data['page'], $data); ?>
    <!-- ---- -->
    <!-- --footer-- -->
    <?php $this->view("shop/modules/footer"); ?>


    <!-- ---- -->
</body>
<script src="<?= URL ?>/public/js/index.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>