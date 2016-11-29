$(function () {
   $('a#confirm').click(function () {
       data = {
           name: $('#name').children('span').html(),
           addr: $('#addr').children('span').html(),
           phone: $('#phone').children('span').html(),
           zipcode: $('#zipcode').children('span').html()
       }
       $.ajax({
            type: 'post',
           url: '/shop/view/user/order/submit_order.php',
           data: data,
           dataType: 'json',
           success: function () {

           },
           error: function () {
               alert('未知错误，请稍后重试')
           }
       })
   });
});