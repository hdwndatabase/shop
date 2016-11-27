$(function () {
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
               if (parseInt($('span#num').html()>0)){
                   $('span#num').html(parseInt($('span#num').html())-1);
               }
               var count = parseInt(tr1.find('input.num').val());
               tr1.children('td.price').html(count*parseFloat(price));
               if (count == 0) {
                   var r = confirm("确认删除该商品吗?");
                   if (r === true) {
                       tr1.remove();
                       location.reload();
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
                tr2.children('td.price').html(count*parseFloat(price));
            },
            error: function () {
                alert("未知错误");
            }
        })
    });
});