<p>
    <a href="<?= URL ?>index.php/admin/cateList?page=1"><button type="button" class="btn btn-primary">List</button></a>
    <a href=""><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>Category_id</th>
        <th>Category_name</th>
        <th>Illustration</th>
        <th>Recover</th>
        <th>Delete</th>
    </thead>
    <?php foreach ($data['trash'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['category_name'] ?></td>
        <td><img style="width: 100px;" src="<?= URL ?>public/img/illustration/<?= $value['illustration'] ?>" alt="">
        </td>
        <td><a onclick="actionChange('Khôi phục','<?= URL ?>index.php/admin/retoreTempCate/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/recover.png" /></a></td>
        <td><a onclick="actionChange('Xóa','<?= URL ?>index.php/admin/deleteCategory/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>