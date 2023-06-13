<?php
$p = $data['edit'];
?>
<form action="<?= URL ?>index.php/admin/posteditorder/<?= $p['id'] ?>" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label>Khách hàng</label>
    <input type="text" value="<?= $p['name'] ?>"  disabled name="name" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>

  <div class="form-group">
    <label>Số điện thoại</label>
    <input type="text" value="<?= $p['phone'] ?>" disabled name="phone" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Địa chỉ</label> 
    <input type="text" value="<?= $p['address'] ?>" disabled name="address" class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Ghi Chú</label>
    <input type="text" value="<?= $p['note'] ?>" name="note" disabled class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Tổng đơn</label>
    <input type="text" value="<?= $p['total'] ?>" name="product_name" disabled class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Ngày đặt hàng</label>
    <input type="text" value="<?= $p['order_date'] ?>" name="product_name" disabled class="form-control" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <?php
      if ($p['delivered'] == 0) {
        echo "<option  value='1'>Đã giao hàng</option><option selected value='0'>Chờ xử lý</option><option  value='2'>Đang giao hàng</option>";
      } elseif ($p['delivered'] == 1) {
        echo "<option selected  value='1'>Đã giao hàng</option><option value='0'>Chờ xử lý</option> <option  value='2'>Đang giao hàng</option>";
      } elseif ($p['delivered'] == 2) {
        echo "<option value='1'>Đã giao hàng</option><option value='0'>Chờ xử lý</option> <option selected value='2'>Đang giao hàng</option>";
      }


      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>