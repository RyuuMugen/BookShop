<div class="container product">
    <div class="container2">
        <button class="btn btn-primary" id="button1">Thanh toán khi nhận hàng</button>
        <button class="btn btn-primary" id="button2">Thanh toán QR MOMO</button>
        <button class="btn btn-primary" id="button3">Thanh toán bằng thẻ ngân hàng</button>
        <div id="form1" >
            
            <form action="<?= URL ?>index.php/home/Ordercomplete" id="checkoutForm1" method="post">
            <h2 class="paymentt">Thanh toán khi nhận hàng</h2>
            <fieldset class="m-2 p-3">
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
                    <div class="col-sm-10"> <input type="text" class="form-control" id="note" name="note"> </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10"> <input type="hidden" class="form-control" id="payment" name="payment" value="0"> </div>
                </div>
                <div class="m-2 d-flex">
                    <fieldset class="border p-3 ml-3 col-6">
                        <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" id="method" value="0" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng nhanh</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" id="method" value="1" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng tiết kiệm</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" id="method" value="2" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Viettel post</p>
                        </div>
                    </fieldset>
                </div>
               
            </fieldset>
                <button class="btn btn-success" type="submit">Thanh toán khi nhận hàng</button>
            </form>
        </div>

        <div id="form2" style="display: none;">
            <form action="<?= URL ?>index.php/home/momopayment" enctype="application/x-www-form-urlencoded" method="post">
            <h2 class="paymentt">Thanh toán QR MOMO</h2>
            <input type="hidden" value="<?php echo $_SESSION['total'] ?>" name="total">
                <fieldset class="m-2 p-3">
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
                    <div class="col-sm-10"> <input type="text" class="form-control" id=" note" name="note"> </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10"> <input type="hidden" class="form-control" id="payment" name="payment" value="1"> </div>
                </div>
                <div class="m-2 d-flex">
                    <fieldset class="border p-3 ml-3 col-6">
                        <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="method" name="method" value="0" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng nhanh</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="method" name="method" value="1" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng tiết kiệm</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="method" name="method" value="2" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Viettel post</p>
                        </div>
                    </fieldset>
                </div>
               
            </fieldset>
                <button class="btn btn-success" type="submit">Thanh toán trực tiếp</button>
            </form>
        </div>

        <div id="form3" style="display: none;">
            <form action="<?= URL ?>index.php/home/momoatm" enctype="application/x-www-form-urlencoded" method="post">
            <h2 class="paymentt">Thanh toán ATM</h2>
            <input type="hidden" value="<?php echo $_SESSION['total'] ?>" name="total">
                <fieldset class="m-2 p-3">
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
                    <div class="col-sm-10"> <input type="text" class="form-control" id="note" name="note"> </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10"> <input type="hidden" class="form-control" id="payment" name="payment" value="1"> </div>
                </div>
                <div class="m-2 d-flex">
                    <fieldset class="border p-3 ml-3 col-6">
                        <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
                        <div class="form-check">
                            <input class="form-check-input" id="method" type="radio" name="method" value="0" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng nhanh</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="method" name="method" value="1" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng tiết kiệm</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="method" name="method" value="2" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Viettel post</p>
                        </div>
                    </fieldset>
                </div>
               
            </fieldset>
                <button class="btn btn-success" type="submit">Thanh toán bằng thẻ</button>
            </form>
        </div>
    </div>
    </div>
    <script>
        var button1 = document.getElementById("button1");
        var button2 = document.getElementById("button2");
        var button3 = document.getElementById("button3");
        var form1 = document.getElementById("form1");
        var form2 = document.getElementById("form2");
        var form3 = document.getElementById("form3");

        button1.addEventListener("click", function() {
            form1.style.display = "block";
            form2.style.display = "none";
            form3.style.display = "none";
        });

        button2.addEventListener("click", function() {
            form1.style.display = "none";
            form2.style.display = "block";
            form3.style.display = "none";
        });

        button3.addEventListener("click", function() {
            form1.style.display = "none";
            form2.style.display = "none";
            form3.style.display = "block";
        });
    </script>
