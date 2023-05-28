<div class="container-fluid">
    <div class="container2 sign-up">
        <form action="<?= URL ?>index.php/home/postRegister" enctype="multipart/form-data" method="post">
            <div class="form-row text-center">
                <div class="col-6 sign">
                    <a class="btn " href="login">ĐĂNG NHẬP</a>
                </div>
                <div class="col-6  sign">
                    <a class="btn" href="#">ĐĂNG KÍ</a>
                </div>
                <div class=" mt-4 form-group col-12">
                    <div class="form-group">
                        <label>Name</label>
                        <i class="fa fa-user"></i>
                        <input class="email" type="text" name="name" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <i class="fa fa-envelope"></i>
                        <input class="email mt-3" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <i class="fa fa-key"></i>
                        <input class="email mt-3" type="password" name="password" placeholder="Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <i class="fa fa-phone-square"></i>
                        <input class="email mt-3" type="number" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <i class="fa fa-map-marker"></i>
                        <input class="email mt-3" type="text" name="address" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <i class="fa fa-image"></i>
                        <input type="file" name="avatar" class="email mt-3" accept=".jpg, .png, .jpeg">
                    </div>

                    <span class="require-login text-danger">* Các thông tin không được để trống</span></br>

                    <button type="submit" class="btn btn-outline-danger signup mt-3">ĐĂNG KÍ</button>
                </div>
            </div>
        </form>
    </div>
</div>