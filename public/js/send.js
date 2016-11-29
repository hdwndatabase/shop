$(function () {
    $('button.send').click(function () {
        var id = $(this).attr('id');
        var data = {
            id: id,
            action: 'send'
        };
        $.ajax({
            type: 'post',
            url: '/shop/view/admin/Manage/order/send.php',
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
            url: '/shop/view/admin/Manage/order/send.php',
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