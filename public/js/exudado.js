$(document).ready(function(){
    
    //Pasamos la fecha como parametro por URL
    $("#fecha_turno_exudado").on('change', function(){
      var fecha = $("#fecha_turno_exudado").val();
      location.href="/exudado?f="+fecha; 
    });

    for (let index = 12; index < 18; index++) {
      //Buscamos al paciente en la base de datos
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
      
      //Si marcamos el check de Ley 26743 lo mandamos como un comentario
      $("#ley"+index).on('change', function(){
        if (document.getElementById('ley'+index).checked) {
          $("#comentarios"+index).val("Ley 26743");
        } else {
          $("#comentarios"+index).val("");
        }
      });

      $("#guardar"+index).on('click', function(){
        var fecha_turno = $("#fecha_turno_exudado").val();
        var id_horario = index;
        var id_usuario = $("#id_usuario").val();
        var p75 = $("#p75"+index).val();
        var documento = $("#documento"+index).val();
        var paciente = $("#paciente"+index).val();
        var fecha_nacimiento = $("#fecha_nacimiento"+index).val();
        var domicilio = $("#domicilio"+index).val();
        var telefono = $("#telefono"+index).val();
        var obra_social = $("#obra_social"+index).val();
        var comentarios = $("#comentarios"+index).val();
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
            document.getElementById('guardar'+index).style.display = "none";
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
      var url = "php/consultar_no_laborales.php";
      var fecha = $("#fecha_turno").val();
      $.ajax({
          type: 'POST',
          url: url,
          data: 'fecha='+fecha,
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