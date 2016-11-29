$(function () {
   $('button.recv').click(function () {
       var id = $(this).attr('id');
       data = {
           id: id,
           action: 'recv'
       };
       $.ajax({
           type: 'post',
           url: '/shop/view/user/order/receive.php',
           data: data,
           dataType: 'json',
           success: function () {
               location.reload();
           },
           error: function () {

           }
       })
   });

    $('button.del').click(function () {
        var id = $(this).attr('id');
        var data = {
            id: id,
            action: 'del'
        };
        $.ajax({
            type: 'post',
            url: '/shop/view/user/order/receive.php',
            data: data,
            dataType: 'json',
            success: function () {
                location.reload();
            },
            error: function () {

            }
        })
    });
});