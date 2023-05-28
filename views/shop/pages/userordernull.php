<?php $user = $data['detailUserOrder']; ?>
<div class="row">
    <div class="col-3-1 text-center bg-light">
        <div class="text-danger ">
            <h1>TÀI KHOẢN</h1>
        </div>
        <img class="mt-3" src="<?= URL ?>public/img/avt.png" alt="" style="width: 100px;">
        <div id="thanh2" class="mt-2">
        </div>
        <div class="btn-form">
            <div><a href="<?= URL ?>index.php/home/changepass" class="btn btn-primary btn-lg btn-block">Đổi Mật Khẩu</a></div>
            <div><a href="<?= URL ?>index.php/home/detailsUser" class="btn btn-primary btn-lg btn-block">Đổi thông tin</a></div>
            <div><a href="<?= URL ?>index.php/home/detailsUserOrder" class="btn btn-primary btn-lg btn-block">Xem đơn hàng</a></div>
            <a class="btn btn-primary btn-lg btn-block" href="<?= URL ?>index.php/home/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="col-9-1 text-center">

        <div class="mt-5">
            <h1>Bạn chưa có đơn nào hết</h1>
        </div>

    </div>
    <div class="clearfix"></div>
</div>