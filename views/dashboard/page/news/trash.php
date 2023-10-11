<p>
    <a href="<?= URL ?>index.php/admin/newsList?page=1"><button type="button" class="btn btn-primary">List</button></a>
    <a href=""><button type="button" class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>ID</th>
        <th>Title</th>
        <th>Sort_Des</th>
        <th>Content</th>
        <th>Illustration</th>
        <th>Recover</th>
        <th>Delete</th>
    </thead>

    <?php foreach ($data['news'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['title'] ?></td>
        <td><?= $value['short_description'] ?></td>
        <td><?= $value['content'] ?></td>
        <td><img style="width: 100px;" src="<?= URL ?>public/img/news/<?= $value['avatar'] ?>" alt=""></td>
        <td><a onclick="actionChange('Khôi phục','<?= URL ?>index.php/admin/retoreTempNews/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/recover.png" /></a></td>
        <td><a onclick="actionChange('Xóa','<?= URL ?>index.php/admin/deleteNews/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>