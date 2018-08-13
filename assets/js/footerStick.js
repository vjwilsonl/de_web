$(document).ready(function() {
    function footerStick() {
        var $footer = $('.footer-sticky');
        var docHeight = $(window).height();
        var footerHeight = $footer.height();
        var footerTop = $footer.position().top + footerHeight;

        if (footerTop < docHeight) {
            $footer.css('margin-top', 50 + (docHeight - footerTop) + 'px');
        }
    }

    footerStick();

    $( window ).resize(function() {
        footerStick();
    });
});