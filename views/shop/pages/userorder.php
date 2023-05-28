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
    <div class="col-9-1">
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
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($user['delivered'] == 1) {
                                echo "Đơn đã được giao";
                            } else { ?>
                                <a class="btn btn-primary" onclick="actionChange('Hủy đơn hàng, đơn hàng sẽ bị xóa khỏi hệ thống','<?= URL ?>index.php/home/deleteOrder/<?= $user['id'] ?>')" style="color :white">Hủy đơn hàng</a>

                            <?php } ?>

                        </td>
                        <td>
                            <a href="<?= URL ?>index.php/home/orderdetails/<?= $user['id'] ?>" class="btn btn-primary">Xem</a>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
    <div class="clearfix"></div>
</div>