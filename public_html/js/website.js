
function scrollTo(e)
{
    $this = jQuery(e);

    $this.closest('nav').find('li').removeClass('active');
    $this.closest('li').addClass('active');
    jQuery('html, body').animate({
        scrollTop: jQuery($this.attr('href')).offset().top
    }, 'slow', 'linear');
}

jQuery(function ($) {

    $('.qrcode').each(function() {
        $(this).qrcode({
            text : $(this).data('url'),
            background : 'transparent',
            foreground : '#333'
        });
    });

    $('.page').each(function() {
        $(this).css('height', $(window).height());
    });

    $('#header nav a').on('click', function() {
        scrollTo(this);
        return false;
    });

    if (!!window.EventSource) {
        var action;
        var source = new EventSource('stream.php');
        source.addEventListener('ping', function(e) {
            if (action != e.data) {
                action = e.data;
                scrollTo(jQuery('a[href="#' + action + '"]'));
            }
        }, false);
    }
});
