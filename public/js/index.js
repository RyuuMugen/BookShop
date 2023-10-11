function actionChange(a, i) {

    var r = confirm(a);
    if (r == true) {
        window.location.href = i;
    }
}

function notification() {
    alert("Thêm vào giỏ hàng thành công");
}

var imgElements = document.querySelectorAll('[id^="myImage"]');


imgElements.forEach(function(img) {
    img.addEventListener("resize", function() {
        var imgWidth = img.clientWidth;
        var newHeight = (imgWidth * 165) / 100;
        img.style.height = newHeight + "px";
    });

    var initialWidth = img.clientWidth;
    var initialHeight = (initialWidth * 145) / 100;
    img.style.height = initialHeight + "px";
});