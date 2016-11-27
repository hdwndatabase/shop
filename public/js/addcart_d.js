$(function () {
    $('button#addCart').click(function () {
        var data = {
            id: $('div.info').attr('id'),
            title: $('.title h2').html(),
            price: parseFloat($('div.price span').html()),
            quantity: parseInt($('input#num').val()),
            imgName: $('div.pic img').attr('src'),
            action: 'add'
        };
        $.ajax({
            type: 'post',
            url: '/shop/view/user/cart/ProcessCart.php',
            data: data,
            dataType: 'json',
            success: function (msg) {
                if (msg) {
                    alert(msg);
                }
                $('span#num').html(parseInt($('span#num').html())+parseInt($('input#num').val()));
            },
            error: function () {
                alert("出现未知错误");
            }
        })
    })
});