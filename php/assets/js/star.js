$(document).ready(function() {
    $('.star').click(function() {
        $(this).parent().children('i').removeClass('fa-star');
        $(this).parent().children('i').addClass('fa-star-o');
        $(this).removeClass('fa-star-o').addClass('fa-star').prevAll('i').removeClass('fa-star-o').addClass('fa-star');
        return false;
    });
});