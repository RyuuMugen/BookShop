<p>
	<a href="<?= URL ?>index.php/admin/orderList/<?= $_SESSION['pages'] ?>"><button type="button" class="btn btn-primary">Back</button></a>

</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>Tên Sản Phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Tổng tiền</th>

	</tr>

	<?php foreach ($data['order_details'] as $value) : ?>
		<tr>

			<td>
				<?php foreach ($data['product'] as $product) {
					if ($product['id'] == $value['product_id']) {
						echo $product['product_name'];
					}
				}

				?>
			</td>
			<td><?= $value['qty'] ?></td>

			<td><?= number_format($value['product_price'], 0, '', ',')  ?>VNĐ</td>
			<td><?= number_format($value['total'], 0, '', ',')  ?>VNĐ</td>


		</tr>
	<?php endforeach; ?>
</table>