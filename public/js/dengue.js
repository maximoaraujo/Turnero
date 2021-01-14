$(document).ready(function(){
    
    //Pasamos la fecha como parametro por URL
    $("#fecha_turno_dengue").on('change', function(){
      var fecha = $("#fecha_turno_dengue").val();
      location.href="/dengue?f="+fecha; 
    });

    for (let index = 10; index < 26; index++) {
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
            beforeSend: function(){
              document.getElementById('loader'+index).style.display = "block";
              document.getElementById('cuerpo_turno'+index).style.display = "none";
            },
            success:function(datos){
                document.getElementById('cuerpo_turno'+index).style.display = "block";
                $("#paciente"+index).val(datos.split(";")[0]);
                $("#fecha_nacimiento"+index).val(datos.split(";")[1]);
                $("#domicilio"+index).val(datos.split(";")[2]);
                $("#telefono"+index).val(datos.split(";")[3]);
                $("#obra_social"+index).val(datos.split(";")[4]);
                genero_id_turno();
                document.getElementById('loader'+index).style.display = "none";
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
        var id_practica = $("#codigo_practica").val();
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
                        var fila = "<tr><td>"+arreglo[x].id_practica+"</td>";
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
              var fila = "<tr><td>"+arreglo[x].id_practica+"</td>";
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
          $("#comentarios"+index).val("Ley 26743");
        } else {
          $("#comentarios"+index).val("");
        }
      });

      $("#guardar"+index).on('click', function(){
        var fecha_turno = $("#fecha_turno_dengue").val();
        var id_horario = index;
        var id_usuario = $("#id_usuario").val();
        var p75 = $("#p75"+index).val();
        var id_turno = $("#id_turno"+index).val();
        var documento = $("#documento"+index).val();
        var paciente = $("#paciente"+index).val();
        var fecha_nacimiento = $("#fecha_nacimiento"+index).val();
        var domicilio = $("#domicilio"+index).val();
        var telefono = $("#telefono"+index).val();
        var obra_social = $("#obra_social"+index).val();
        var comentarios = $("#comentarios"+index).val();
        var para = "dengue";
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
            id_turno:id_turno,
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
              location.href = "/dengue?f="+fecha_turno;
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