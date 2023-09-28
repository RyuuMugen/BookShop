<div class="container-fluid all-show">
<section class="login-block">
    <div class="containerl">
        <div class="rowl">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Đăng Nhập</h2>
                <form class="login-form" action="<?= URL ?>index.php/home/postLogin" method="post">
                <h6 class="text-center"> <?php if(isset($data["thongbao"])){echo $data["thongbao"];}  ?> </h6>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Email <i class="fa fa-user" aria-hidden="true"></i></label>
                        <input class="form-control" name="email" type="text" placeholder="Nhập email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu <i class="fa fa-key" aria-hidden="true"></i></label>
                        <input class="form-control " name="password" type="password" placeholder="Mật Khẩu">
                    </div>


                    <div class="form-check">
                        <button type="submit" class="btn btn-outline-danger float-right mt-3">ĐĂNG NHẬP</button>
                    </div>

                </form>
                <div class="copy-text">Chưa có tài khoản nhấn <a href="register">ĐĂNG KÝ</a> ngay</div>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?= URL ?>public/images/cove.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h3 class="tc">Khám Phá Vùng Đất Phiêu Lưu Tưởng Tượng</h3>
                                    <p class="tc" >Đọc sách là cuộc phiêu lưu tưởng tượng độc đáo. 
                                        Bạn mở cửa vào một thế giới mới, nơi mọi giới 
                                        hạn biến mất và tất cả là có thể. Những cuốn sách 
                                        là nguồn tri thức và sự tư duy, nhưng cũng là cách thư 
                                        giãn và giải trí tuyệt vời. Khi bạn đọc, bạn có thể tận 
                                        hưởng những giây phút yên bình trong thế giới của chính 
                                        mình hoặc chia sẻ cuốn sách với người thân yêu. Đọc sách 
                                        không bao giờ lỗi thời và luôn là cách tuyệt vời để tăng 
                                        cường tư duy và tưởng tượng.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
</div>

