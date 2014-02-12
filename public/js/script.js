jQuery(function ($) {
    $('.qrcode').each(function() {
        $(this).qrcode({
            text : $(this).data('url'),
            background : 'transparent',
            foreground : '#333'
        });
    });
});
