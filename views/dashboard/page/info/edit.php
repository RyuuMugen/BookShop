<?php
$r = $data['edit'];

?>
<form action="<?= URL ?>index.php/admin/posteditinfo/<?= $r['id'] ?>" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <img style="width: 100px;" src="<?= URL ?>public/img/bookinfo/<?= $r['book_images'] ?>" alt="">
  </div>
  <div class="form-group">
    <label>File</label>
    <input type="file" name="avatar" class="form-control-file" accept=".jpg, .png, .jpeg">

  </div>
  <div class="form-group">
    <label>Type</label>
    <select class="form-control" name="status">
      <?php
      if ($r['types'] == 'cover') {
        echo "<option selected value='cover'>cover</option><option value='read'>read</option>";
      } else {
        echo "<option value='cover'>cover</option><option selected value='read'>read</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>