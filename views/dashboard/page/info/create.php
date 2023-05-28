<form action="<?= URL ?>index.php/admin/postaddinfo/<?= $data['id'] ?>" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <label>Id</label>
    <input type="text" name="id" value="<?= $data['id'] ?>" class="form-control" readonly>
  </div>
  <div class="form-group">
    <label>File</label>
    <input type="file" name="img[]" class="form-control-file" multiple accept=".jpg, .png, .jpeg">

  </div>
  <div class="form-group">
    <label>Type</label>
    <select class="form-control" name="type">
      <option value="cover">cover</option>
      <option value="read">read</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>