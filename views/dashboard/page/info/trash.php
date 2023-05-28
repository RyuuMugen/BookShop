<p>
	<a href="<?= URL ?>index.php/admin/infoProduct/<?= $data['id'] ?>/1"><button type="button" class="btn btn-primary">List</button></a>
	<a href="<?= URL ?>index.php/admin/readInfo/<?= $data['id'] ?>/1"><button type="button" class="btn btn-primary">Read</button></a>

</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Book id</th>
		<th>Book images</th>
		<th>type</th>
		<th>edit</th>
		<th>delete</th>

	</tr>
	<?php foreach ($data['trash'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['book_id'] ?></td>
			<td><img style="width: 100px;" src="<?= URL ?>public/img/bookinfo/<?= $value['book_images'] ?>" alt=""></td>
			<td><?= $value['types'] ?></td>
			<td><a onclick="actionChange('Khôi phục','<?= URL ?>index.php/admin/retoreTempInfo/<?= $value['book_id'] ?>/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/recover.png" /></a></td>
			<td><a onclick="actionChange('Xóa','<?= URL ?>index.php/admin/deleteInfo/<?= $value['book_id'] ?>/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>