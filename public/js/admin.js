PNotify.defaults.styling = 'bootstrap4';
PNotify.defaults.icons = 'fontawesome5';

PNotify.defaults.delay -= 1000;

if (typeof window.stackTopCenter === 'undefined') {
    window.stackTopCenter = {
        'dir1': 'down',
        'firstpos1': 25
    };
}

var screenWidth = "600px";

if ($(window).width() <= 600) {
    screenWidth = ($(window).width() - 20) + "px";
}


$(document).ready(function () {
    $('#date_in,#date_out').each(function () {
        $(this).datepicker({
            uiLibrary: 'bootstrap4', 
            iconsLibrary: 'fontawesome',
            size: 'small',
            format: 'dd/mm/yyyy',
            startDate: 'today',
            locale: 'pt-br',
            autoclose: true,
            showRightIcon: false,
        });
    })
   
});
