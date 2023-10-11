<?php
$r = $data['edit'];
?>
<form action="<?= URL ?>index.php/admin/posteditnews/<?= $r['id'] ?>" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="<?= $r['title'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Sort des</label>
    <input type="text" name="short_description" value="<?= $r['short_description'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea class="form-control" name="content" id="editor" cols="30" rows="30"><?= $r['content'] ?></textarea>
  </div>
  <div class="form-group">
    <label>Illustration</label>
    <img style="width: 50px;" src="<?= URL ?>/public/img/news/<?= $r['avatar'] ?>" alt="">
    <input type="file" name="avatar" class="form-control-file" accept=".jpg, .png, .jpeg">
    
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