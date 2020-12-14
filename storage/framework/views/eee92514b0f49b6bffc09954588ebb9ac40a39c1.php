<?php
use Dompdf\Dompdf;
?>
<title>Comprobante <?php echo e($paciente); ?></title>
<style>
#titulo_comprobante{
    font-family: 'Times-Bold', cursive;
    font-weight: bold;
    margin-top:-90px;
    font-size: 20px;
}
#laboratorio_cabecera{
    color: #3B0258;
    font-family: 'Times-Bold', cursive;
    font-size: 27px;
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
#paciente{
    font-family: 'Times-Bold', cursive;
    margin-top:30px;
    font-size: 18px;
}
#fecha_turno{
    margin-left: -100px;
}
#hora_turno{
    margin-top: -35px;
    margin-left: 125px;
}
#turno{
    font-size:140px;
    margin-top: -100px;
}
#info{
    font-size:13px;
    margin-top: -120px;
    font-weight: bold;
}
#info_1{
    font-size:13px;
    margin-top: 20px;
    font-weight: bold;
}
#info_2{
    font-size:16px;
    margin-top: 20px;
}
</style>   
<div class = "row">
    <div class = "col-sm-4"><p id = "laboratorio_cabecera">Laboratorio</p><br>
    <p id = "laboratorio_medio">CENTRAL</p><br>
    <p id = "laboratorio_pie">de Redes y Programas</p></div>
</div> 
<center>
<p id = "titulo_comprobante">COMPROBANTE DE TURNO</p>
<p id = "paciente">Paciente: <?php echo e($paciente); ?></p>
<?php
 $horario = App\Models\horario::where('id_horario', $id_horario)->get()->pluck('horario')->first();
?>
<p id = "fecha_turno">Fecha: <?php echo e(date('d-m-Y', strtotime($fecha))); ?></p><p id = "hora_turno">Hora: <?php echo $horario; ?></p>
<?php
    $letra = App\Models\horario::where('id_horario', $id_horario)->get()->pluck('letra')->first();
    $id = App\Models\pacientes_turno::where('fecha', $fecha)->where('documento', $documento)->get()->pluck('id')->first();
?>
<h2 id = "turno"><?php echo $letra. '' .$id; ?></h2>
<p id = "info">SI TIENE FIEBRE Y/O SÍNTOMAS RELACIONADOS CON COVID-19 REPROGRAME SU TURNO AL<br>
WHATSAPP 3795-393798 | 3795-403798</p>
<p id = "info_1">PARA MINIMIZAR EL TIEMPO DE ESPERA, POR FAVOR RESPETE EL HORARIO ASIGNADO</p>
<p id = "info_2"><strong>Visita nuestra página web:</strong>laboratorio.saludcorrientes.gob.ar</p>
</center>
<?php
$dompdf = new Dompdf();
$dompdf->loadhtml(ob_get_clean());
$dompdf->setPaper('A5', 'landscape');

$dompdf->render();
 
$dompdf->stream('TURNO_'.$paciente.'.pdf');
$dompdf->stream('TURNO_'.$paciente.'.pdf', array("Attachment" => false));

?><?php /**PATH C:\laragon\www\Turnero\resources\views/impresiones/comprobante_turno.blade.php ENDPATH**/ ?>