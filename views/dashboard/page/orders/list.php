<table class="table table-bordered table-hover">
	<tr>
		<th>id</th>
		<th>Tên KH</th>
		<th>Điện thoại</th>
		<th>Địa chỉ</th>
		<th>Tổng tiền</th>
		<th>Ghi chú</th>
		<th>Ngày order</th>
		<th>Trạng thái</th>
		<th>Chi tiết</th>

	</tr>
	<?php foreach ($data['order'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['name'] ?></td>
			<td><?= $value['phone'] ?></td>
			<td><?= $value['address'] ?></td>
			<td><?= number_format($value['total'], 0, '', ',')  ?>VNĐ</td>
			<td><?= $value['note'] ?></td>
			<td><?php $date = date_create($value['order_date']);
				echo date_format($date, "d/m/Y H:i"); ?></td>
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
				<a href="<?= URL ?>index.php/admin/orderDetails/<?= $value['id'] ?>" class="btn btn-primary">Xem</a>
				<a href="<?= URL ?>index.php/admin/editorder/<?= $value['id'] ?>" class="btn btn-primary">Trạng thái</a>
			</td>
			<!-- -->

		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>