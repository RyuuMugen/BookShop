<p>
    <a href="<?= URL ?>index.php/admin/orderList?page=1"><button type="button" class="btn btn-primary">Back</button></a>

</p>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>Tên Sản Phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tổng tiền</th>

    </thead>

    <?php foreach ($data['order_details'] as $value) : ?>
    <tbody>

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


    </tbody>
    <?php endforeach; ?>
</table>