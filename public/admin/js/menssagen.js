$(document).ready(function () {
    function isEmptypeObject(obj) {
        return Object.keys(obj).length === 0;
    }

    function toastrOpcoes() {
        return toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }


    $.getJSON("/JSON/session", (despesa) => {
        var dados = despesa;

        if (isEmptypeObject(dados) === false) {
            toastr[dados.tipo](dados.mensagem, dados.titulo);
        }
    });
    toastrOpcoes();
});