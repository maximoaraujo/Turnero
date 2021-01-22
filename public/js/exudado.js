$(document).ready(function(){
    
    //Pasamos la fecha como parametro por URL
    $("#fecha_turno_exudado").on('change', function(){
      var fecha = $("#fecha_turno_exudado").val();
      location.href="/exudado?f="+fecha; 
    });

    for (let index = 30; index < 36; index++) {
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
                genero_id_turno();
            }
        });
      }); 

      function genero_id_turno(){
        $.ajax({
          type: 'POST',
          url: '/genero_id_turno',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success:function(datos){
            $("#id_turno"+index).val(datos);
          }
        });  
      }

      $("#practicas"+index).on('click', function(){
        var id_turno = $("#id_turno"+index).val();
        $("#modal_practicas").modal('show');
        $("#id_turno_practicas").val(id_turno);
      });

      //Buscamos la práctica al presionar enter en el campo código
      $("#codigo_practica").on('keyup', function (e) {
          var keycode = e.keyCode || e.which;
          e.preventDefault();
          e.stopImmediatePropagation();
          if (keycode == 13) {
              var codigo = $("#codigo_practica").val();
              $.ajax({
                type: 'POST',
                url: '/practica_por_codigo',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                  codigo:codigo
                },
                success:function(datos){
                  if (datos != '') {
                    $("#id_practica").val(datos);
                    guardo_turno_practica();
                    cargo_practicas();
                    document.getElementById('codigo_practica').value = "";
                    document.getElementById('practica').value = "";
                    $("#codigo_practica").focus();
                  }
                }
              });
          }
      });

      function guardo_turno_practica(){
        var id_turno = $("#id_turno_practicas").val();
        var id_practica = $("#id_practica").val();
        $.ajax({
          type: 'POST',
          url: '/turno_practicas',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            id_turno:id_turno,
            id_practica:id_practica
          }
        });
      }

      //Buscamos la práctica al presionar enter en el campo práctica
      $("#practica").on('keyup', function (e) {
          var keycode = e.keyCode || e.which;
          e.preventDefault();
          e.stopImmediatePropagation();
          if (keycode == 13) {
              var practica = $("#practica").val();
              $.ajax({
                type: 'POST',
                url: '/busco_practica',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                  practica:practica
                },
                success:function(datos){
                  if (datos != '') {
                    document.getElementById('tabla_agregados').style.display = "none";
                    document.getElementById('tabla_busquedas').style.display = "block";
                    $("#tabla_busqueda").empty();
                    var arreglo = JSON.parse(datos);
                    for (var x = 0; x < arreglo.length; x++){
                        var fila = "<tr><td hidden>"+arreglo[x].id_practica+"</td>";
                        fila+= "<td>"+arreglo[x].codigo+"</td>";
                        fila+= "<td>"+arreglo[x].practica+"</td>";
                        fila+= "<td><button class = 'sel_practica' style = 'border:none;background-color:transparent;'><i class='fas fa-file-import'></i></button></td>";
                        $("#tabla_busqueda").append(fila);
                    }
                  } else if(datos == '') {
                    document.getElementById('tabla_agregados').style.display = "block";
                    document.getElementById('tabla_busquedas').style.display = "block";
                  }

                  var id_practica;
                  $('.tabla_busqueda tr').on('click', function(){
                      id_practica = $(this).find('td').eq(0).html();
                  });

                  function guardo_turno_practica(){
                    var id_turno = $("#id_turno_practicas").val();
                    $.ajax({
                      type: 'POST',
                      url: '/turno_practicas',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data:{
                        id_turno:id_turno,
                        id_practica:id_practica
                      },
                      success:function(datos){
                        console.log(datos);
                      }
                    });
                  }
      
                  $(".sel_practica").on('dblclick', function(){
                      document.getElementById('tabla_agregados').style.display = "block";
                      document.getElementById('tabla_busquedas').style.display = "none";
                      document.getElementById('codigo_practica').value = "";
                      document.getElementById('practica').value = "";
                      $("#codigo_practica").focus();
                      $("#tabla_busqueda").empty();
                      guardo_turno_practica();
                      cargo_practicas();
                  });
                }
              });
          }
      });

      function cargo_practicas(){
        var id_turno = $("#id_turno_practicas").val();
        $.ajax({
          type: 'POST',
          url: '/muestro_practicas',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{
            id_turno:id_turno
          },
          success:function(datos){
            $("#tabla_agregado").empty();
            var arreglo = JSON.parse(datos);
            for (var x = 0; x < arreglo.length; x++){
              var fila = "<tr><td>"+arreglo[x].codigo+"</td>";
              fila+= "<td>"+arreglo[x].practica+"</td>";
              fila+= "<td><button class = 'elimino_sel' style = 'border:none;background-color:transparent;'><i class='fas fa-trash'></i></button></td>";
              $("#tabla_agregado").append(fila);
            }

            var id_practica;
            $('.tabla_agregado tr').on('click', function(){
                id_practica = $(this).find('td').eq(0).html();
            });

            function elimino_practica(){
              var id_turno = $("#id_turno_practicas").val();
              $.ajax({
                type: 'POST',
                url:'/elimino_practica',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                  id_turno:id_turno,
                  id_practica:id_practica
                },
                success:function(){
                  cargo_practicas();
                }
              });
            }

            $(".elimino_sel").on('dblclick', function(){
              elimino_practica();
            });

          }
        });
      }
      
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
        var id_turno = $("#id_turno"+index).val();
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
            id_turno: id_turno,
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
              window.open('/comprobante_turno/'+fecha_turno+'/'+id_horario+'/'+documento+'/'+paciente+'/'+id_turno, '_blank');
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