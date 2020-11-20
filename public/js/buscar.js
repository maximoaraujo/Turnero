$(document).ready(function () {

     //Buscar en la tabla de recibos emitidos
     (function ($) {
        $('#buscador_de_recibos').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.tabla_r_emitidos tr').hide();
            $('.tabla_r_emitidos tr').filter(function () {
            return rex.test($(this).text());
            }).show();
        })
    }(jQuery));

    //Buscar en la tabla historico de caja
    (function ($) {
        $('#buscador_de_historico').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.thistoricocaja tr').hide();
            $('.thistoricocaja tr').filter(function () {
            return rex.test($(this).text());
            }).show();
        })
    }(jQuery));

});