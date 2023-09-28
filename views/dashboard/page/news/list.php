<p>
	<a href="<?= URL ?>index.php/admin/addNews"><button type="button" class="btn btn-primary">Add</button></a>
	<a href="<?= URL ?>index.php/admin/trashNews?page=1"><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Sort_Des</th>
		<th>Content</th>
		<th>Avatar</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($data['news'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['title'] ?></td>
			<td>
				<div class="limit_text"> <?= $value['short_description'] ?></div>
			</td>
			<td>
				<div class="limit_text"> <?= $value['content'] ?></div>
			</td>
			<td><img style="width: 100px;" src="<?= URL ?>public/img/news/<?= $value['avatar'] ?>" alt=""></td>

			<td>

				<?php
				if ($value['status'] == 0) { ?>

					<a onclick="actionChange('Ẩn Tin tức','<?= URL ?>index.php/admin/delStatusNews/<?= $value['id'] ?>')" class="showcursor"> <img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/status.png" /></a>

				<?php } else { ?>
					<a onclick="actionChange('Hiện Tin Tức','<?= URL ?>index.php/admin/retoreStatusNews/<?= $value['id'] ?>')" class="showcursor"> <img class="icon " style="width:50px;" src="<?= URL ?>public/backend/images/forbidden.png" /></a>
				<?php } ?>
			</td>

			<td><a href="<?= URL ?>index.php/admin/editNews/<?= $value['id'] ?>"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/edit.png" /></a></td>
			<td><a onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempNews/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>