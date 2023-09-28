<p>
	<a href="<?= URL ?>index.php/admin/addInfo/<?= $data['id'] ?>"><button type="button" class="btn btn-primary">Add</button></a>
	<a href="<?= URL ?>index.php/admin/readInfo?id=<?= $data['id'] ?>&page=1"><button type="button" class="btn btn-primary">Read</button></a>
	<a href="<?= URL ?>index.php/admin/trashInfo?id=<?= $data['id'] ?>&page=1"><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Book id</th>
		<th>Book images</th>
		<th>type</th>
		<th>page</th>
		<th>edit</th>
		<th>delete</th>

	</tr>
	<?php foreach ($data['book_info'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['book_id'] ?></td>
			<td><img style="width: 100px;" src="<?= URL ?>public/img/bookinfo/<?= $value['book_images'] ?>" alt=""></td>
			<td><?= $value['types'] ?></td>
			<td><?= $value['pages'] ?></td>
			<td><a href="<?= URL ?>index.php/admin/editInfo/<?= $value['book_id'] ?>/<?= $value['id'] ?>"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/edit.png" /></a></td>
			<td><a onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempInfo/<?= $value['book_id'] ?>/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>