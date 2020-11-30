<?php
use Dompdf\Dompdf;
$fecha = $_GET['f'];
?>
<title>Planilla diaria</title>
<style>
#titulo_planilla{
    font-family: 'Times-Bold', cursive;
    font-weight: bold;
    margin-top:-90px;
    font-size: 20px;
}
#laboratorio_cabecera{
    color: #3B0258;
    font-family: 'Times-Bold', cursive;
    font-size: 27px;
    margin-top:-40px;
}
#laboratorio_medio{
    color: #3B0258;
    font-family: 'Times-Bold', cursive;
    font-size: 27px;
    margin-top:-50px;
    font-weight: bold;
}
#laboratorio_pie{
    color: #05C4B0;
    font-size:15px;
    margin-top:-45px; 
}
#cabecera_horarios_1{
    margin-top:10px;
    font-size:18px;
    list-style:none;
    text-decoration:none;
    background-color: #C6C7C7;
    border-left:1px solid black;
    border-right:1px solid black;
    border-top:1px solid black;
    border-bottom:1px solid black;
}
.table {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size:14px;
    text-align: right;
    width: 100%;
}
.table th {
    padding: 5px;
    font-size: 16px;
    background-color: #83aec0;
    color: #FFFFFF;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-right-style: solid;
    border-bottom-style: solid;
    border-right-color: #558FA6;
    border-bottom-color: #558FA6;
    font-family: “Trebuchet MS”, Arial;
    text-transform: uppercase;
}
.table td {
    text-align: left;
    border-bottom-style: solid;
    border-bottom-color: #CDC7C7;
}
</style>
<div class = "row">
    <div class = "col-sm-4"><p id = "laboratorio_cabecera">Laboratorio</p><br>
    <p id = "laboratorio_medio">CENTRAL</p><br>
    <p id = "laboratorio_pie">de Redes y Programas</p></div>
</div>
<center>
<p id = "titulo_planilla">PLANILLA DIARIA DE TURNOS</p>
<p style = "margin-top:-17px;"><small> Fecha: <?php echo date('d-m-Y', strtotime($fecha)); ?> </small></p>
</center>

<?php
include('php/conexion.php');
$sql_cons_ids = mysqli_query($conn, "SELECT horarios_estudios.id_horario FROM horarios_estudios, horarios WHERE horarios.id_horario = horarios_estudios.id_horario AND horarios_estudios.estudio = 'generales' ORDER BY horarios.horario");
while ($registros = mysqli_fetch_assoc($sql_cons_ids)) {
    $sql_cons_horario = mysqli_query($conn, "SELECT horario FROM horarios WHERE id_horario = '".$registros['id_horario']."'");
    $horario = mysqli_fetch_row($sql_cons_horario);
    $sql_cons_paciente = mysqli_query($conn, "SELECT concat_ws('', pacientes_turnos.letra, pacientes_turnos.id) AS turno, pacientes.paciente, pacientes.documento, pacientes_turnos.comentarios, pacientes_turnos.para
    FROM pacientes_turnos, pacientes WHERE pacientes_turnos.documento = pacientes.documento AND pacientes_turnos.id_horario = '".$registros['id_horario']."'
    AND pacientes_turnos.fecha = '".$fecha."'");
    echo "<center>
            <li id = 'cabecera_horarios_1'><small>".$horario[0]."</small></li>
         </center>";
    echo '<table cellspacing="0" width="100%">';
    while ($regis = mysqli_fetch_assoc($sql_cons_paciente)) {
    if ($regis['para']== 'P75') {
      $comentarios = $regis['comentarios']. '- P75';
    } else {
      $comentarios = $regis['comentarios'];
    }
    
    echo '<tbody>
            <tr>
                <td style = "text-align:center;border:1px solid grey;height:10px;">'.$regis['turno'].'</td>
                <td style = "text-align:center;border:1px solid grey;height:10px;"><small>'.$regis['paciente'].'</small></td>
                <td style = "text-align:center;border:1px solid grey;height:10px;"><small>'.$regis['documento'].'</small></td>
                <td style = "text-align:center;border:1px solid grey;height:10px;"><small>'.$comentarios.'</small></td>
            </tr>
          </tbody>';
    }   
    echo " </table>"; 
}

$dompdf = new Dompdf();
$dompdf->loadhtml(ob_get_clean());

$dompdf->render();
 
$dompdf->stream('planilla_'.$fecha.'.pdf', array("Attachment" => false));
?>
