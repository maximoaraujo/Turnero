$(document).ready(function(){

    $("#fecha_turno").on('change', function(){
      var fecha = $("#fecha_turno").val();
      location.href="/general?f="+fecha;     
    });
  
    for (let index = 1; index < 9; index++) {
      $("#documento"+index).on('blur', function(){
        var documento = $("#documento"+index).val();
        $.ajax({
            type: 'POST',
            url: '/busco_paciente',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                documento: documento
            },
            success:function(datos){
                $("#paciente"+index).val(datos.split(";")[0]);
                $("#fecha_nacimiento"+index).val(datos.split(";")[1]);
                $("#domicilio"+index).val(datos.split(";")[2]);
                $("#telefono"+index).val(datos.split(";")[3]);
                $("#obra_social"+index).val(datos.split(";")[4]);
            }
        });
      });      
    }
  
  });