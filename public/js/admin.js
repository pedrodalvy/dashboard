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
