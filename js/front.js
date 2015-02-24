$(document).ready(function () {
    var h = $(window).height();
    $('#home').css({ 'height': h });
    $('#about').css({ 'height': h });
    $('#services').css({ 'height': h });
    $('#team').css({ 'height': h });
    
    $('a[href*=#]').click(function () {
                var target = $(this.hash);
                if (target.length) {
                    $('html,body').animate({ scrollTop: target.offset().top }, 1000, 'swing');
                    return false;
                }
        });
});