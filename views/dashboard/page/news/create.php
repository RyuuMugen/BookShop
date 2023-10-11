<form action="<?= URL ?>index.php/admin/postaddnews" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label>Sort des</label>
    <input type="text" name="short_description" class="form-control">
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea class="form-control" name="content" id="editor" cols="30" rows="30"></textarea>
  </div>
  <div class="form-group">
    <label>Illustration</label>
    <input type="file" name="avatar" class="form-control-file" accept=".jpg, .png, .jpeg">

    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status">
        <option value="0">Hiện</option>
        <option value="1">Ẩn</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>