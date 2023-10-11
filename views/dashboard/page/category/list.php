<p>
    <a href="<?= URL ?>index.php/admin/addCate"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/admin/trashCate?page=1"><button type="button"
            class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
</p>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>Category_id</th>
        <th>Category_name</th>
        <th>Illustration</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <?php foreach ($data['category'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['category_name'] ?></td>
        <td><img style="width: 50px; height:80px;" src="<?= URL ?>public/img/illustration/<?= $value['illustration'] ?>" alt="">
        </td>

        <td>
            <?php
				if ($value['status'] == 0) { ?>
            <a onclick="actionChange('Xác nhận ẩn','<?= URL ?>index.php/admin/delStatusCate/<?= $value['id'] ?>')"
                class="showcursor"> <img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/status.png" /></a>

            <?php } else { ?>
            <a class="showcursor"
                onclick="actionChange('Xác nhận hiện','<?= URL ?>index.php/admin/retoreStatusCate/<?= $value['id'] ?>')">
                <img class="icon " style="width:50px;" src="<?= URL ?>public/backend/images/forbidden.png" /></a>
            <?php } ?>
        </td>

        <td><a href="<?= URL ?>index.php/admin/editCate/<?= $value['id'] ?>"><img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/edit.png" /></a></td>
        <td><a onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempCate/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/delete.png" /></a></td>
    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>