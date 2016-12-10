$(document).ready(function() {
    $('.inner').hide();
    $('.item-wrapper').mouseover(function() {
        $(this).find($('.list-button')).find($('.inner')).show();
        return false;
    });
    $('.item-wrapper').mouseout(function() {
        $(this).find($('.list-button')).find($('.inner')).hide();
        return false;
    });
});