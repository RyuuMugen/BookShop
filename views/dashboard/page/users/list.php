<table class="table table-bordered table-hover">
	<tr>
		<th>id</th>
		<th>Email</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Status</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($data['user'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['email'] ?></td>
			<td><?= $value['name'] ?></td>
			<td><?= $value['phone'] ?></td>
			<td><?= $value['address'] ?></td>


			<td>
				<?php
				if ($value['status'] == 0) { ?>

					<a onclick="actionChange('Xác nhận khóa người dùng','<?= URL ?>index.php/admin/delStatusUsers/<?= $value['id'] ?>')" class="showcursor"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/status.png" /></a>
				<?php } else { ?>
					<a class="showcursor" onclick="actionChange('Mở khóa','<?= URL ?>index.php/admin/retoreStatusUsers/<?= $value['id'] ?>')"> <img class="icon " style="width:50px;" src="<?= URL ?>public/backend/images/forbidden.png" /></a>

				<?php } ?>


			</td>

			<td>
				<a onclick="actionChange('Xác nhận xóa , xóa rồi không thể khôi phục được','<?= URL ?>index.php/admin/deleteUsers/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>