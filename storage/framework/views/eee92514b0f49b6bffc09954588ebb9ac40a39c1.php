<?php
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>
<title>Comprobante <?php echo e($paciente); ?></title>
<style>
#titulo_comprobante{
    font-family: 'Times-Bold', cursive;
    font-weight: bold;
    margin-top:-50px;
    font-size: 20px;
}
#laboratorio_cabecera{
    color: #3B0258;
    font-family: 'Times-Bold', cursive;
    font-size: 27px;
    margin-top:-30px;
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
    margin-top:-25px;
    font-size: 18px;
}
#fecha_turno{
    margin-left: -100px;
}
#hora_turno{
    margin-top: -35px;
    margin-left: 125px;
}
#qr{
    margin-top: -65px;
    margin-left: 85%;
}
#turno{
    font-size:80px;
    margin-left: 85%;
    margin-top:-115px;
}
#solicito{
   margin-top:20px; 
}
#info{
    font-size:12px;
    margin-top: 50px;
    font-weight: bold;
}
#info_1{
    font-size:12px;
    margin-top: 20px;
    font-weight: bold;
}
#info_2{
    font-size:14px;
    margin-top: 20px;
}
</style>   
<div class = "row">
    <div class = "col-sm-4"><p id = "laboratorio_cabecera">Laboratorio</p><br>
    <p id = "laboratorio_medio">CENTRAL</p><br>
    <p id = "laboratorio_pie">de Redes y Programas</p></div>
</div> 

<p id = "qr"><?php echo $id_turno; ?></p>

<?php
    $letra = App\Models\horario::where('id_horario', $id_horario)->get()->pluck('letra')->first();
    $id = App\Models\pacientes_turno::where('fecha', $fecha)->where('documento', $documento)->get()->pluck('id')->first();
?>
<center>
<p id = "turno"><?php echo $letra. '' .$id; ?></p>
<?php
 $horario = App\Models\horario::where('id_horario', $id_horario)->get()->pluck('horario')->first();
?>
<?php 
    $dia_ing = date('D', strtotime($fecha));
    switch ($dia_ing) {
        case "Mon":
            $dia = "Lunes";
            break;
        case "Tus":
            $dia = "Martes";
            break;
        case "Wed":
            $dia = "Miércoles";
            break;
        case "Thu":
            $dia = "Jueves";
            break;
        case "Fri":
            $dia = "Viernes";
            break;    
    }

    $mes_ing = date('M', strtotime($fecha));
    switch ($mes_ing) {
        case "Jan":
            $mes = "Enero";
            break;
        case "Feb":
            $mes = "Febrero";
            break;
        case "Mar":
            $mes = "Marzo";
            break;
        case "Apr":
            $mes = "Abril";
            break;
        case "May":
            $mes = "Mayo";
            break;    
        case "Jun":
            $mes = "Junio";
            break;
        case "Jul":
            $mes = "Julio";
            break;
        case "Aug":
            $mes = "Agosto";
            break;
        case "Sep":
            $mes = "Septiembre";
            break;
        case "Oct":
            $mes = "Octubre";
            break;    
        case "Nov":
            $mes = "Octubre";
            break;  
        case "Dec":
            $mes = "";
            break;      
    }
?>

<p id = "titulo_comprobante">TURNO <?php echo $dia; ?> <?php echo e(date('d', strtotime($fecha))); ?> de <?php echo $mes; ?> de <?php echo e(date('Y', strtotime($fecha))); ?>- <?php echo $horario; ?>hs</p>
<p id = "paciente">Paciente: <?php echo e($paciente); ?></p>
</center>

<p id = "solicito">Solicitó un turno para realizarse los siguientes estudios:</p>

<?php
    $practicas = App\Models\turnos_practica::join('practicas', 'practicas.id_practica', 'turnos_practicas.id_practica')
    ->select('practicas.practica')->where('turnos_practicas.id_turno', $id_turno)->get();

    foreach ($practicas as $practica) {
        echo "<ul>
                <li style = 'font-size:10px;'>".$practica->practica."</li>
              </ul>";
    }
?>
<p id = "info">SI TIENE FIEBRE Y/O SÍNTOMAS RELACIONADOS CON COVID-19 REPROGRAME SU TURNO AL
WHATSAPP 3795-393798 | 3795-403798</p>
<p id = "info_1">PARA MINIMIZAR EL TIEMPO DE ESPERA, POR FAVOR RESPETE EL HORARIO ASIGNADO</p>
<p id = "info_2"><strong>Visite nuestra página web:</strong>laboratorio.saludcorrientes.gob.ar</p>
<?php
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);  
$dompdf->loadhtml(ob_get_clean());
$dompdf->setPaper('A5');

$dompdf->render();
 
//$dompdf->stream('TURNO_'.$paciente.'.pdf');
$dompdf->stream('TURNO_'.$paciente.'.pdf', array("Attachment" => false));

?><?php /**PATH C:\laragon\www\Turnero\resources\views/impresiones/comprobante_turno.blade.php ENDPATH**/ ?>