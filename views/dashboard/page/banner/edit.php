<?php
$r = $data['edit'];
?>
<form action="<?= URL ?>index.php/admin/posteditbanner/<?= $r['id'] ?>" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="<?= $r['title'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Start date</label>
    <input type="date" value="<?= $r['date_start'] ?>" name="startdate" class="form-control">
  </div>
  <div class="form-group">
    <label>End date</label>
    <input type="date" value="<?= $r['date_end'] ?>" name="enddate" class="form-control">
  </div>
  <div class="form-group">
    <label>Banner</label>
    <img style="width: 200px; padding-bottom: 20px;" src="<?= URL ?>/public/img/banner/<?= $r['image'] ?>" alt="">
    <input type="file" name="avatar" class="form-control-file" accept=".jpg, .png, .jpeg">
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <?php
      if ($r['status'] == 0) {
        echo "<option selected value='0'>Hiện</option><option value='1'>Ẩn</option>";
      } else {
        echo "<option value='0'>Hiện</option><option selected value='1'>Ẩn</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>