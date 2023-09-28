<p>
	<a href="<?= URL ?>index.php/admin/addBanner"><button type="button" class="btn btn-primary">Add</button></a>
	<a href="<?= URL ?>index.php/admin/trashBanner?page=1"><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>StartDate</th>
		<th>EndDate</th>
		<th>Banner</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($data['banner'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['title'] ?></td>
			<td><?= $value['date_start'] ?></td>
			<td><?= $value['date_end'] ?></td>
			<td><img style="width: 100px;" src="<?= URL ?>public/img/banner/<?= $value['image'] ?>" alt=""></td>

			<td>

				<?php
				if ($value['status'] == 0) { ?>

					<a onclick="actionChange('Ẩn Tin tức','<?= URL ?>index.php/admin/delStatusBanner/<?= $value['id'] ?>')" class="showcursor"> <img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/status.png" /></a>

				<?php } else { ?>
					<a onclick="actionChange('Hiện Tin Tức','<?= URL ?>index.php/admin/retoreStatusBanner/<?= $value['id'] ?>')" class="showcursor"> <img class="icon " style="width:50px;" src="<?= URL ?>public/backend/images/forbidden.png" /></a>
				<?php } ?>
			</td>

			<td><a href="<?= URL ?>index.php/admin/editBanner/<?= $value['id'] ?>"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/edit.png" /></a></td>
			<td><a onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempBanner/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>