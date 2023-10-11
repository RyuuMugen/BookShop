<p>
    <a href="<?= URL ?>index.php/admin/addProduct"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/admin/trashProduct?page=1"><button type="button"
            class="btn btn-primary">Trash(<?= count($data['trash']) ?>)</button></a>
<form id="searchForm" method="post" class="form-inline">
    <div class="row">
        <div class="col-4">
            <select class="form-select" id="searchtype" aria-label=" select">
                <option selected value="id">Id</option>
                <option value="product_name">Product name</option>
				<option value="author">Author</option>
                <option value="publisher">Publisher</option>
				<option value="category_name">Category</option>
            </select>
        </div>
        <div class="col-5">
            <input id="searchInput" type="text" name="search" class="form-control resi">

        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>


</form>
</p>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <th>id</th>
        <th>Product name</th>
        <th>Publisher</th>
        <th>Category</th>
		<th>Author</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sale</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Info</th>
        <th>Comment</th>
        <th>Trash</th>
    </thead>
    <?php foreach ($data['product'] as $value) : ?>
    <tbody>
        <td><?= $value['id'] ?></td>
        <td><?= $value['product_name'] ?></td>
        <td><?= $value['publisher'] ?></td>
        <td>
            <?php
				foreach ($data['allCate'] as $p) {
					if ($value['category_id'] == $p['id']) {
						echo $p['category_name'];
					}
				}
				?>

        </td>
		<td><?= $value['author'] ?></td>
        <td><img src="<?= URL ?>public/img/book/<?= $value['image'] ?>" style="width: 50px;" alt=""></td>
        <td><?= $value['quantity'] ?></td>
        <td><?= number_format($value["price"], 0, '', ',')  ?>VND</td>
        <td>
            <?php
				if ($value['sale'] == 1) { ?>
            Có

            <?php } else { ?>
            Không
            <?php } ?>
        </td>
        <td>
            <?php
				if ($value['status'] == 0) { ?>

            <a onclick="actionChange('Ẩn Sản phẩm','<?= URL ?>index.php/admin/delStatusProduct/<?= $value['id'] ?>')"
                class="showcursor"> <img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/status.png" /></a>

            <?php } else { ?>
            <a onclick="actionChange('Hiện Sản phẩm','<?= URL ?>index.php/admin/retoreStatusProduct/<?= $value['id'] ?> class= "
                showcursor" href="<?= URL ?>index.php/admin/retoreStatusProduct/<?= $value['id'] ?>"> <img class="icon "
                    style="width:50px; height:80px" src="<?= URL ?>public/backend/images/forbidden.png" /></a>
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/admin/editProduct/<?= $value['id'] ?>"><img class="icon" style="width:50px;"
                    src="<?= URL ?>public/backend/images/edit.png" /></a></td>
        <td><a href="<?= URL ?>index.php/admin/infoProduct?id=<?= $value['id'] ?>&page=1"><img class="icon"
                    style="width:50px;" src="<?= URL ?>public/backend/images/booki.png" /></a></td>
        <td><a href="<?= URL ?>index.php/admin/infoComment?id=<?= $value['id'] ?>&page=1"><img class="icon"
                    style="width:50px;" src="<?= URL ?>public/backend/images/1647114.png" /></a></td>
        <td><a
                onclick="actionChange('Chuyển vào trash','<?= URL ?>index.php/admin/delTempProduct/<?= $value['id'] ?>')"><img
                    class="icon" style="width:50px;" src="<?= URL ?>public/backend/images/bookdelete.png" /></a></td>
    </tbody>
    <?php endforeach; ?>
</table>
<?= $data['paginator'] ?>

<script>
document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var searchValue = document.getElementById("searchInput").value;
	var searchType = document.getElementById("searchtype").value;
    var formAction = "<?= URL ?>index.php/admin/productSearch?value=" + searchValue +"&type=" +searchType+ "&page=1";
    document.getElementById("searchForm").action = formAction;
    this.submit();
});
</script>