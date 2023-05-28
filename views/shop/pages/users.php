<?php $user = $data['detailUser']; ?>
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
    <div class="col-9-1">
        <div class="text-center">
            <h1>THÔNG TIN TÀI KHOẢN</h1>
        </div>
        <div class="mt-5">
            <form action="<?= URL ?>index.php/home/postchangeinfo" method="post">
                <div class="form-row">
                    <div class="col-6 form-group">
                        <label class="" for="">Họ Tên</label>
                        <input class="form-control mt-1 change_data" type="text" name="name" value="<?= $user['name'] ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label for="">Số điện thoại</label>
                        <input class="form-control mt-1 change_data" type="text" name="phone" value="<?= $user['phone'] ?>" placeholder="Số Điện Thoại">

                    </div>
                    <div class="col-6 form-group">
                        <label for="">Email</label>
                        <input class="form-control mt-1 change_data" type="text" name="email" disabled value="<?= $user['email'] ?>" placeholder="Email">

                    </div>
                    <div class="col-12 form-group">
                        <label for="">Địa chỉ</label>
                        <input class="form-control mt-1 change_data" type="text" name="address" value="<?= $user['address'] ?>" placeholder="Địa chỉ">

                    </div>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </div>
            </form>
        </div>

    </div>
    <div class="clearfix"></div>
</div>