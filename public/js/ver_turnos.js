$(document).ready(function(){

    function generales_x_horario()
    {
        var id = $("#horario_sel").val();
        $.ajax({

        });
    }

    $("#horario_sel").on('change', function(){
        generales_x_horario();
    });

});