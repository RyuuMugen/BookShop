<form action="<?= URL ?>index.php/admin/postaddproduct" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Name Product</label>
    <input type="text" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Brands</label>
    <select class="form-control" name="brand_id">
      <!-- <option value="0">0</option> -->
      <?php
      foreach ($data['brand'] as $val) {
        echo "<option value='" . $val['id'] . "'>" . $val['brand_name'] . "</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category_id">
      <?php
      foreach ($data['category'] as $val) {
        echo "<option value='" . $val['id'] . "'>" . $val['category_name'] . "</option>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Sale</label>
    <select class="form-control" name="sale">
      <option value="0">Không</option>
      <option value="1">Có</option>
    </select>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control-file">
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" name="quantity" min="0" value="0" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="number" name="price" min="0" value="0" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Details</label>
    <textarea class="form-control" name="product_detail" id="editor" cols="30" rows="30"></textarea>
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