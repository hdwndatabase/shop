$(function () {
    // 计算总价
    var prices = $('td.price');
    var sum = 0;
    prices.each(function () {
        sum+=parseFloat($(this).html());
    });
    var $total = $('#total_price');
    $total.html(sum);

   var minusBtn = $('button.minus');
   var plusBtn = $('button.plus');
   minusBtn.click(function () {
        var tr1 = $(this).parents('td').parent('tr');
        if (tr1.find('input.num').val()>0) {
            tr1.find('input.num').val(parseInt(tr1.find('input.num').val())-1);
        }
        var data = {
            id: tr1.attr('id'),
            action: 'remove'
        };

       $.ajax({
           type: 'post',
           url: '/shop/view/user/cart/ProcessCart.php',
           data: data,
           dataType: 'json',
           success: function (price) {
               if (parseInt($('span#num').html())>0) {
                   $('span#num').html(parseInt($('span#num').html())-1);
               }
               var count = parseInt(tr1.find('input.num').val());
               var oldPrice = parseFloat(tr1.children('td.price').html());
               var newPrice = count*parseFloat(price);
               tr1.children('td.price').html(newPrice);
               $total.html(parseFloat($total.html())-(oldPrice-newPrice));
               if (count == 0) {
                   var r = confirm("确认删除该商品吗?");
                   if (r === true) {
                       $.ajax({
                           type: 'post',
                           url: '/shop/view/user/cart/CartZero.php',
                           data: {id: tr1.attr('id'),flag:'y'},
                           dataType: 'json',
                           success: function () {
                               tr1.remove();
                               location.reload();
                           },
                           error: function () {
                               alert('error')
                           }
                       })
                   }
               }
           },
           error: function () {
               alert("未知错误");
           }
       })
   });
    plusBtn.click(function () {
        var tr2 = $(this).parents('td').parent('tr');
        tr2.find('input.num').val(parseInt(tr2.find('input.num').val())+1);
        var data = {
            id: tr2.attr('id'),
            action: 'add1'
        };
        $.ajax({
            type: 'post',
            url: '/shop/view/user/cart/ProcessCart.php',
            data: data,
            dataType: 'json',
            success: function (price) {
                $('span#num').html(parseInt($('span#num').html())+1);
                var count = parseInt(tr2.find('input.num').val());
                var oldPrice = parseFloat(tr2.children('td.price').html());
                var newPrice = count*parseFloat(price);
                tr2.children('td.price').html(newPrice);
                $total.html(parseFloat($total.html())-(oldPrice-newPrice));
            },
            error: function () {
                alert("未知错误");
            }
        })
    });
});