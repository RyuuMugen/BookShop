<?php $user = $data['detailUser']; ?>
<div class="container product">
<div class="row">
    <div class="col-3 text-center  bg-light border paddingcol">
        <div class="chil ">
            <div class="text-danger ">
                <h1>TÀI KHOẢN</h1>
            </div>
            <img class="mt-9" src="<?= URL ?>public/img/avatar/<?= $_SESSION['avatar']?>" alt=""
                style="width: 90%; border-radius:50%;">
            <div id="thanh2" class="mt-2">
            </div>
            <div>
                <div><button class="btn btn-primary btn-lg btn-block" id="button1">Đổi Mật Khẩu</button></div>
                <div><button class="btn btn-primary btn-lg btn-block" id="button2">Đổi thông tin</button></div>
                <div><button class="btn btn-primary btn-lg btn-block" id="button3">Xem đơn hàng</button></div>
                <a class="btn btn-primary btn-lg btn-block" href="<?= URL ?>index.php/home/logout"><i
                        class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>
        </div>
    </div>
    <div class="col-9 bg-light border  paddingcol">
        <div class="chil bg-light">
            <div class="col-12" id="form2">
                <div class="text-center">
                    <h1>THÔNG TIN TÀI KHOẢN</h1>
                </div>
                <div class="mt-5">
                    <form action="<?= URL ?>index.php/home/postchangeinfo" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-12 form-group">
                                <label class="" for="">Họ Tên</label>
                                <input class="form-control mt-1 change_data" type="text" name="name"
                                    value="<?= $user['name'] ?>">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Số điện thoại</label>
                                <input class="form-control mt-1 change_data" type="text" name="phone"
                                    value="<?= $user['phone'] ?>" placeholder="Số Điện Thoại">

                            </div>
                            <div class="col-12 form-group">
                                <label for="">Email</label>
                                <input class="form-control mt-1 change_data" type="text" name="email" disabled
                                    value="<?= $user['email'] ?>" placeholder="Email">

                            </div>
                            <div class="col-12 form-group">
                                <label for="">Địa chỉ</label>
                                <input class="form-control mt-1 change_data" type="text" name="address"
                                    value="<?= $user['address'] ?>" placeholder="Địa chỉ">
                            </div>
                            <div class="col-12 form-group">
                                <label>Avatar</label>
                                <i class="fa fa-image"></i>
                                <input type="file" name="avatar" class="email mt-3" accept=".jpg, .png, .jpeg">
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg btn-block">Cập nhật</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-12" id="form1" style="display: none;">
                <div class="text-center">
                    <h1>ĐỔI MẬT KHẨU</h1>
                </div>
                <div class="mt-5">
                    <form action="<?= URL ?>index.php/home/postchangepass" method="post">
                        <div class="mt-5">
                            <div class="form-row">
                                <div class="col-12 form-group">
                                    <label for="">Mật khẩu cũ</label>
                                    <input class="form-control mt-1" name="password" type="password" placeholder="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input class="form-control mt-1" name="newpassword" type="password" placeholder="">
                                </div>
                                <div class="col-12 form-group">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input class="form-control mt-1" name="passwordagain" type="password"
                                        placeholder="">
                                    <h1 class="mb-3 mt-3 text-danger">
                                        <?php if (isset($data["thongbao"])) : ?>
                                        <?= $data["thongbao"] ?>
                                        <?php endif; ?>
                                    </h1>
                                </div>
                                <button type="submit" class="btn btn-warning ml-3 btn-lg btn-block">Đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12" id="form3" style="display: none;">
                <div class="text-center">
                    <h1>THÔNG TIN ĐƠN HÀNG</h1>
                </div>
                <div class="mt-5">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th>
                                <th>Ngày order</th>
                                <th>Trạng thái</th>
                                <th>Xóa đơn hàng</th>
                                <th>Chi tiết</th>

                            </tr>
                        </thead>
                        <?php foreach ($data['detailUserOrder'] as $user) : ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><?= number_format($user['total'], 0, '', ',')  ?>VNĐ</td>
                            <td><?= $user['note'] ?></td>
                            <td><?php $date = date_create($user['order_date']);
                            echo date_format($date, "d/m/Y H:i"); ?></td>
                            <td>
                                <?php
                            if ($user['delivered'] == 0) {
                                echo "Đang xử lí";
                            } elseif ($user['delivered'] == 1) {
                                echo "Đã giao hàng";
                            } elseif ($user['delivered'] == 2) {
                                echo "Đang giao hàng";
                            } elseif ($user['delivered'] == 3) {
                                echo "Đã hủy đơn";
                            }
                            ?>
                            </td>
                            <td>
                                <?php if ($user['delivered'] == 1) {
                                echo "Đơn đã được giao";
                            } else { ?>
                                <a class="btn btn-primary"
                                    onclick="actionChange('Hủy đơn hàng, đơn hàng sẽ bị xóa khỏi hệ thống','<?= URL ?>index.php/home/cancelOrder/<?= $user['id'] ?>')"
                                    style="color :white">Hủy đơn hàng</a>

                                <?php } ?>

                            </td>
                            <td>
                                <a href="<?= URL ?>index.php/home/orderdetails/<?= $user['id'] ?>"
                                    class="btn btn-primary">Xem</a>
                            </td>


                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
var button1 = document.getElementById("button1");
var button2 = document.getElementById("button2");
var button3 = document.getElementById("button3");
var form1 = document.getElementById("form1");
var form2 = document.getElementById("form2");
var form3 = document.getElementById("form3");

button1.addEventListener("click", function() {
    form1.style.display = "block";
    form2.style.display = "none";
    form3.style.display = "none";
});

button2.addEventListener("click", function() {
    form1.style.display = "none";
    form2.style.display = "block";
    form3.style.display = "none";
});

button3.addEventListener("click", function() {
    form1.style.display = "none";
    form2.style.display = "none";
    form3.style.display = "block";
});
</script>