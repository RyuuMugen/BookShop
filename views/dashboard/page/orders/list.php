<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>id</th>
        <th>Customer name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Total amount</th>
        <th>Payment methods</th>
        <th>Order date</th>
        <th>Shipping method</th>
        <th>Status</th>
        <th>Info</th>
        <th>Edit</th>
        <th>Delete</th>

    </thead>
    <?php foreach ($data['order'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><?= $value['address'] ?></td>
        <td><?= number_format($value['total'], 0, '', ',')  ?>VNĐ</td>
        <td>
            <?php
				if ($value['payment'] == "" || $value['payment'] == 0) {
					echo "Ship COD";
				} elseif ($value['payment'] == "" || $value['payment'] == 1) {
					echo "Đã thanh toán";
				}
				?>
        </td>
        <td><?php $date = date_create($value['order_date']);
				echo date_format($date, "d/m/Y H:i"); ?></td>
        <td>
            <?php
				if ($value['method'] == "" || $value['method'] == 0) {
					echo "Giao hàng nhanh";
				} elseif ($value['method'] == "" || $value['method'] == 1) {
					echo "Giao hàng tiết kiệm";
				} elseif ($value['method'] == "" || $value['method'] == 2) {
					echo "Viettel post";
				}
				?>
        </td>
        <td>
            <?php
				if ($value['delivered'] == "" || $value['delivered'] == 0) {
					echo "Chờ xử lý";
				} elseif ($value['delivered'] == "" || $value['delivered'] == 1) {
					echo "Đã giao hàng";
				} elseif ($value['delivered'] == "" || $value['delivered'] == 2) {
					echo "Đang giao hàng";
				}
				?>
        </td>
        <td>
            <a href="<?= URL ?>index.php/admin/orderDetails/<?= $value['id'] ?>"><img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/booki.png" /></a>
        </td>
        <td>
            <a href="<?= URL ?>index.php/admin/editorder/<?= $value['id'] ?>"><img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/edit.png" /></a>
        </td>
        <td>
            <a
                onclick="actionChange('Xóa đơn hàng, đơn hàng sẽ bị xóa khỏi hệ thống','<?= URL ?>index.php/admin/deleteOrder/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a>
        </td>
        <!-- -->

    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>