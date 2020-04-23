$(document).ready(function () {

    var foneMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
        },
        foneOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(foneMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.fone').mask(foneMaskBehavior, foneOptions);
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
});
