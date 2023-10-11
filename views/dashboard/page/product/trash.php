<p>
    <a href="<?= URL ?>index.php/admin/productList?page=1"><button type="button"
            class="btn btn-primary">List</button></a>
    <a href=""><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>id</th>
        <th>Product name</th>
        <th>Publisher</th>
        <th>Category</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Info</th>
        <th>Recover</th>
        <th>Delete</th>
    </thead>
    <?php foreach ($data['trash'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['product_name'] ?></td>
        <td><?= $value['publisher'] ?></td>
        <td>
            <?php
				foreach ($data['allCate'] as $p) {
					if ($value['category_id'] == $p['id']) {
						echo $p['category_name'];
					}
				}
				?>

        </td>
        <td><img src="<?= URL ?>public/img/book/<?= $value['image'] ?>" style="width: 50px;" alt=""></td>
        <td><?= $value['quantity'] ?></td>
        <td><?= number_format($value["price"], 0, '', ',')  ?>VND</td>
        <td>
            <?php
				if ($value['sale'] == 1) { ?>
            Có

            <?php } else { ?>
            Không
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/admin/infoProduct?id=<?= $value['id'] ?>&page=1"><img class="icon"
                    style="width:50px;" src="<?= URL ?>public/backend/images/booki.png" /></a></td>
        <td><a onclick="actionChange('Khôi phục','<?= URL ?>index.php/admin/retoreTempProduct/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/recover.png" /></a></td>
        <td><a
                onclick="actionChange('Xóa luôn sản phẩm','<?= URL ?>index.php/admin/deleteProduct/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>