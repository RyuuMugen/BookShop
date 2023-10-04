<div class="container product">

<div class="container-fluid all-show">
    <section class="login-block2">
        <div class="containerl">
            <div class="rowl">
                <div class="col-md-12 login-sec">
                    <h2 class="text-center">Đăng kí ngay</h2>
                    <form class="login-form" action="<?= URL ?>index.php/home/postRegister"
                        enctype="multipart/form-data" method="post">
                        <h6 class="text-center"> <?php if(isset($data["thongbao"])){echo $data["thongbao"];}  ?> </h6>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Tên người dùng
                                <i class="fa fa-user"></i></label>
                            <input class="form-control" type="text" name="name" placeholder="Họ và tên">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Email
                                <i class="fa fa-envelope"></i></i></label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu
                                <i class="fa fa-key" aria-hidden="true"></i></label>

                            <input class="form-control" type="password" name="password" placeholder="Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Số điện thoại
                                <i class="fa fa-phone-square"></i></label>

                            <input class="form-control" type="number" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Địa chỉ
                                <i class="fa fa-map-marker"></i></label>

                            <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Avatar
                                <i class="fa fa-image"></i>
                                <input type="file" name="avatar" class="form-control" accept=".jpg, .png, .jpeg">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-danger float-left mt-3">ĐĂNG Kí</button>
                        </div>

                    </form>
                    <div class="copy-text">đã có tài khoản nhấn <a href="login">ĐĂNG NHẬP</a> ngay</div>
                </div>
                
            </div>
    </section>
</div>
</div>