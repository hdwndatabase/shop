$(function () {
    $('.addCart').click(function () {
        var li = $(this).parent('li');
        var data = {
            id: li.attr('id'),
            title: li.children('p.title').children('a').html(),
            price: parseFloat(li.children('span.price').html()),
            quantity: 1,
            imgName: li.find('img.img').attr('src'),
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
                $('span#num').html(parseInt($('span#num').html())+1);
            },
            error: function () {
                alert("出现未知错误");
            }
        })
    })
});