

<table class="table table-bordered table-hover">
	<tr>
		<th>id</th>
		<th>Product name</th>
		<th>Image</th>
		<th>Info</th>
	</tr>
	<?php foreach ($data['product'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['product_name'] ?></td>	
			<td><img src="<?= URL ?>public/img/book/<?= $value['image'] ?>" style="width: 50px;" alt=""></td>	
			<td><a href="<?= URL ?>index.php/admin/infoComment?id=<?= $value['id'] ?>&page=1"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/booki.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>