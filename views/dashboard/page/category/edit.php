<?php
$r = $data['edit'];
?>
<form action="<?= URL ?>index.php/admin/posteditcate/<?= $r['id'] ?>" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Category name</label>
    <input type="text" name="category_name" value="<?= $r['category_name'] ?>" class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label>Avatar</label>
    <img style="width: 200px; padding-bottom: 20px;" src="<?= URL ?>/public/img/illustration/<?= $r['illustration'] ?>" alt="">
    <input type="file" name="illustration" class="form-control-file" accept=".jpg, .png, .jpeg">
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <?php
      if ($r['status'] == 1) {
        echo "<option value='0'>Hiện</option>";
        echo "<option selected value='1'>Ẩn</option>";
      } else {
        echo "<option selected value='0'>Hiện</option>";
        echo "<option  value='1'>Ẩn</option>";
      }

      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>