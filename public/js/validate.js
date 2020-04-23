$(function () {
    
    $('#editProfileForm').validate({
        errorClass: "is-invalid",

        highlight: function (element, errorClass) {
            $(element).addClass(errorClass);
            $(element).fadeOut(function () {
                $(element).fadeIn();
            });
        },

        rules: {
            name: { required: true, minlength: 2 },
            email: { required: true, email: true },
            fone: { required: true, foneBR: true },
            address: { required: true, minlength: 5},
            function: { required: true, minlength: 5},
            pricing: { required: true },
            github: { url: true },
            linkedin: { url: true },
            site: { url: true },
            description: { required: true, minlength: 5},
            resume: { extension: "pdf", maxsize: 25000 },
        },
        messages: {
            email: {
                email: "informe um email válido (ex: 'nome@dominio.com')"
            }
        }
    })

    // Faz a validação do número do telefone
    jQuery.validator.addMethod("foneBR", function (value, element) {
        return this.optional(element) || /^(\(?\d{2}\)?\s)?(\d )?(\d{4}\-\d{4})$/.test(value);
    }, 'Digite um telefone válido');
});
