$(document).ready(function(){
    
    //Pasamos la fecha como parametro por URL
    $("#fecha_turno_exudado").on('change', function(){
      var fecha = $("#fecha_turno_exudado").val();
      location.href="/exudado?f="+fecha; 
    });

    for (let index = 12; index < 18; index++) {
      //Buscamos al paciente en la base de datos
      $("#documento_e"+index).on('blur', function(){
        var documento = $("#documento_e"+index).val();
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
                $("#paciente_e"+index).val(datos.split(";")[0]);
                $("#fecha_nacimiento_e"+index).val(datos.split(";")[1]);
                $("#domicilio_e"+index).val(datos.split(";")[2]);
                $("#telefono_e"+index).val(datos.split(";")[3]);
                $("#obra_social_e"+index).val(datos.split(";")[4]);
            }
        });
      }); 
      
      //Si marcamos el check de Ley 26743 lo mandamos como un comentario
      $("#ley"+index).on('change', function(){
        if (document.getElementById('ley'+index).checked) {
          $("#comentarios_e"+index).val("Ley 26743");
        } else {
          $("#comentarios_e"+index).val("");
        }
      });

      $("#guardar_e"+index).on('click', function(){
        var fecha_turno = $("#fecha_turno_exudado").val();
        var id_horario = index;
        var id_usuario = $("#id_usuario").val();
        var p75 = $("#p75"+index).val();
        var documento = $("#documento_e"+index).val();
        var paciente = $("#paciente_e"+index).val();
        var fecha_nacimiento = $("#fecha_nacimiento_e"+index).val();
        var domicilio = $("#domicilio_e"+index).val();
        var telefono = $("#telefono_e"+index).val();
        var obra_social = $("#obra_social_e"+index).val();
        var comentarios = $("#comentarios_e"+index).val();
        var para = "exudado";
        $.ajax({
          type: 'POST',
          url: '/guardo_turno',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            fecha_turno: fecha_turno,
            id_horario: id_horario,
            id_usuario: id_usuario,
            p75: p75,
            documento: documento,
            paciente: paciente,
            fecha_nacimiento: fecha_nacimiento,
            domicilio: domicilio,
            telefono: telefono,
            obra_social: obra_social,
            comentarios: comentarios,
            para: para
          },
          beforeSend: function(){
            document.getElementById('guardar_e'+index).style.display = "none";
          },
          success:function(datos){
            if (datos == "Correcto") {
              location.href = "/exudado?f="+fecha_turno;
              window.open('/comprobante_turno/'+fecha_turno+'/'+id_horario+'/'+documento+'/'+paciente, '_blank');
            }
          }
        });
      });
    } 
    
  function verifico_no_laborales(){
    var fecha = $("#fecha_turno").val();
    $.ajax({
        type: 'POST',
        url: "/consultar_no_laborales",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
          fecha: fecha
        },
        success:function(datos){
          if (datos != 0){
            document.getElementById('no_laboral').style.display = "block";
            document.getElementById('row_general').style.display = "none";
          }
        }
    });
  }
  window.onload=verifico_no_laborales();
  });