<div class="container2">
  <form action="<?= URL ?>index.php/home/Ordercomplete" method="post">

    <fieldset class="border m-2 p-3">
      <legend class="small text-primary fw-bold">Thông tin người nhận hàng</legend>
      <div class="form-group row mb-3">
        <label class="col-sm-2 col-form-label">Họ tên</label>
        <div class="col-sm-10"><input type="text" value="<?= $_SESSION['user'] ?>" class="form-control" name="name"></div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Số điện thoại</label>
        <div class="col-sm-10"> <input type="text" class="form-control" name="phone" required> </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Địa chỉ</label>
        <div class="col-sm-10"> <input type="text" class="form-control" id="email" name="address" required> </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ghi Chú</label>
        <div class="col-sm-10"> <input type="text" class="form-control" id="email" name="note"> </div>
      </div>
      <div class="m-2 d-flex">
        <fieldset class="border p-3 mr-2 col-6">
          <legend class="small text-primary fw-bold">Phương thức thanh toán</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" value="option1">
            <p style="padding-left: 50px; padding-bottom:20px;">Thanh toán khi nhận hàng</p>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" value="option2">
            <p style="padding-left: 50px; padding-bottom:20px;">Chuyển Khoản</p>
            </label>
          </div>
        </fieldset>
        <fieldset class="border p-3 ml-3 col-6">
          <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexampleRadios" value="option1">
            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng nhanh</p>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexampleRadios" value="option2">
            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng tiết kiệm</p>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexampleRadios" value="option3">
            <p style="padding-left: 50px; padding-bottom:20px;">Viettel post</p>
            </label>
          </div>
        </fieldset>
      </div>
      <div class="py-2 m-2 d-flex justify-content-end">
        <div class="col-2 text-center">
          <button class="btn btn-success" type="submit">Mua hàng</button>
        </div>
      </div>
    </fieldset>

  </form>
</div>