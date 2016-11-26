window.onload = function () {
    var num = document.getElementById("num");
    num.value = 1;
    var minusBtn = document.getElementById("minus");
    var plusBtn = document.getElementById("plus");
    minusBtn.onclick = function () {
        if (num.value>0) {
            num.value--;
        }
    };
    plusBtn.onclick = function () {
        num.value++;
    };
}