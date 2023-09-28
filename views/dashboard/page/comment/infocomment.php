

<table class="table table-bordered table-hover">
	<tr>
        <th>id</th>
		<th>user id</th>
		<th>name</th>
		<th>comment</th>
        <th>delete</th>
	</tr>
	<?php foreach ($data['comment_info'] as $value) : ?>
		<tr>
            <td><?= $value['id'] ?></td>
			<td><?= $value['user_id'] ?></td>
			<td><?= $value['name'] ?></td>
            <td><?= $value['content'] ?></td>	
			<td><a onclick="actionChange('Xóa','<?= URL ?>index.php/admin/deleteComment?bookid=<?= $value['book_id'] ?>&id=<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>