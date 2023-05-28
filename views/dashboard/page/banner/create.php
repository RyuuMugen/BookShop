<form action="<?= URL ?>index.php/admin/postaddbanner" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label>Start date</label>
    <input type="date" name="startdate" class="form-control">
  </div>
  <div class="form-group">
    <label>End date</label>
    <input type="date" name="enddate" class="form-control">
  </div>
  <div class="form-group">
    <label>Avatar</label>
    <input type="file" name="avatar" class="form-control-file" accept=".jpg, .png, .jpeg">
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <option value="0">Hiện</option>
      <option value="1">Ẩn</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>