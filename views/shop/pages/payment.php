<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container2">
        <form action="<?= URL ?>index.php/home/Ordercomplete" id="checkoutForm" method="post">
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
                    <div class="col-sm-10"> <input type="text" class="form-control" id="email" name="note"> </div>
                </div>
                <div class="m-2 d-flex">
                    <fieldset class="border p-3 mr-2 col-6">
                        <legend class="small text-primary fw-bold">Phương thức thanh toán</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="0">
                            <p style="padding-left: 50px; padding-bottom:20px;">Thanh toán khi nhận hàng</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" value="1">
                            <p style="padding-left: 50px; padding-bottom:20px;">Chuyển Khoản</p>
                        </div>
                    </fieldset>
                    <fieldset class="border p-3 ml-3 col-6">
                        <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexampleRadios" value="0" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng nhanh</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexampleRadios" value="1" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Giao hàng tiết kiệm</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexampleRadios" value="2" required>
                            <p style="padding-left: 50px; padding-bottom:20px;">Viettel post</p>
                        </div>
                    </fieldset>
                </div>
               
            </fieldset>
        </form>
        
            <div class="py-2 m-2 d-flex justify-content-end">
                <div class="col-2 text-center">
                <form action="<?= URL ?>index.php/home/momopayment" enctype="application/x-www-form-urlencoded" method="post">
                    <input type="hidden" value="<?php echo $_SESSION['total'] ?>" name="total">
                    <input id="momoButton" name="momo" class="btn btn-success d-none" type="submit" value="QR MOMO">
                </form>
                <button id="submitButton" class="btn btn-success" type="submit">Mua hàng</button>
                </div>
            </div>
        

    </div>

    <script>
      var form = document.getElementById("checkoutForm");
        var submitButton = document.getElementById("submitButton");

        submitButton.addEventListener("click", function() {
            form.submit();
        });
        var paymentRadios = document.getElementsByName("exampleRadios");
        for (var i = 0; i < paymentRadios.length; i++) {
            paymentRadios[i].addEventListener("change", handlePaymentMethodChange);
        }

        function handlePaymentMethodChange() {
            var momoButton = document.getElementById("momoButton");
            var submitButton = document.getElementById("submitButton");

            if (this.value === "1") {
                momoButton.classList.remove("d-none");
                submitButton.classList.add("d-none");
            } else {
                momoButton.classList.add("d-none");
                submitButton.classList.remove("d-none");
            }
        }
    </script>
</body>
</html>
