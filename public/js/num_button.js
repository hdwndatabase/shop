$(function () {
   var num = $('input#num');
   num.val(1);
    $('#minus').click(function () {
       if (num.val()>0) {
           num.val(parseInt(num.val())-1);
       }
   });
   $('#plus').click(function () {
       num.val(parseInt(num.val())+1);
   });

});