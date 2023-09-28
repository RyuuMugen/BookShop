<p>
	<a href="<?= URL ?>index.php/admin/addCate"><button type="button" class="btn btn-primary">Add</button></a>
	<a href="<?= URL ?>index.php/admin/trashCate?page=1"><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>Category_id</th>
		<th>Category_name</th>

		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($data['category'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['category_name'] ?></td>


			<td>
				<?php
				if ($value['status'] == 0) { ?>
					<a onclick="actionChange('Xác nhận ẩn','<?= URL ?>index.php/admin/delStatusCate/<?= $value['id'] ?>')" class="showcursor"> <img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/status.png" /></a>

				<?php } else { ?>
					<a class="showcursor" onclick="actionChange('Xác nhận hiện','<?= URL ?>index.php/admin/retoreStatusCate/<?= $value['id'] ?>')"> <img class="icon " style="width:50px;" src="<?= URL ?>public/backend/images/forbidden.png" /></a>
				<?php } ?>
			</td>

			<td><a href="<?= URL ?>index.php/admin/editCate/<?= $value['id'] ?>"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/edit.png" /></a></td>
			<td><a onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempCate/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>