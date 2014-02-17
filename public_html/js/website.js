
function scrollTo(e)
{
    var menu = jQuery('#header nav').find('a[href=' + jQuery(e).attr('href') + ']');
    jQuery(menu).closest('nav').find('li').removeClass('active');
    jQuery(menu).closest('li').addClass('active');
    jQuery('html, body').animate({
        scrollTop: jQuery(jQuery(menu).attr('href')).offset().top
    }, 'slow', 'linear');
}

jQuery(function ($) {

    $('.qrcode').each(function() {
        $(this).qrcode({
            text : $(this).data('url'),
            background : 'transparent',
            fill : '#382E25',
            size:256
        });
    });

    $('.page').each(function() {
        $(this).css('height', $(window).height());
    });

    $(window).resize(function () {
        $('.page:visible').css('height', $(window).height());
    });

    $('#header a').on('click', function() {
        scrollTo(this);
        return false;
    });

    if (!!window.EventSource) {
        var action;
        var source = new EventSource('stream.php');
        source.addEventListener('ping', function(e) {
            if (e.data && action != e.data) {
                action = e.data;
                scrollTo(jQuery('a[href="#' + action + '"]'));
            }
        }, false);
    }
});
