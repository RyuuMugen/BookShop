<p>
	<a href="<?= URL ?>index.php/admin/bannerList?page=1"><button type="button" class="btn btn-primary">List</button></a>
	<a href=""><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>StartDate</th>
		<th>EndDate</th>
		<th>Banner</th>
		<th>Recover</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($data['banner'] as $value) : ?>
		<tr>
			<td><?= $value['id'] ?></td>
			<td><?= $value['title'] ?></td>
			<td><?= $value['date_start'] ?></td>
			<td><?= $value['date_end'] ?></td>
			<td><img style="width: 100px;" src="<?= URL ?>public/img/banner/<?= $value['image'] ?>" alt=""></td>
			<td><a onclick="actionChange('Khôi phục','<?= URL ?>index.php/admin/retoreTempBanner/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/recover.png" /></a></td>
			<td><a onclick="actionChange('Xóa','<?= URL ?>index.php/admin/deleteBanner/<?= $value['id'] ?>')"><img class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?= $data['paginator'] ?>