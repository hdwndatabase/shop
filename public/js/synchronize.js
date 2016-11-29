/*
// 登录时同步购物车，如果数据库记录用户购物车中有商品，则清空session
//否则，将session同步到用户购物车
$(function () {
   $('form#login').submit(function () {
       var data = {
           action: 'syn'
       };
       $.ajax({
           type: 'post',
           url: '/shop/view/user/cart/ProcessCart.php',
           data: data,
           dataType: 'json',
           success: function (msg) {
               alert(msg);
           },
           error: function () {
               
           }
       })
   }); 
});*/
