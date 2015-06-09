/**
* Off cavnas navigation, inspired by http://getbootstrap.com/examples/offcanvas/
*
*/
$(function() {
    $('[data-toggle="offcanvas"]').on('click.offcanvas', function () {
        $('body').toggleClass('offcanvas');
    });
});
