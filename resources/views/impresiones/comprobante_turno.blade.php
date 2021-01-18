<?php
use Dompdf\Dompdf;
use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
?>
<title>Comprobante {{$paciente}}</title>
<style>
#logo{
    margin-left:-30px;
    margin-top:-10px;
}
#titulo_comprobante{
    font-family: 'Times-Bold', cursive;
    font-weight: bold;
    margin-top:-50px;
    font-size: 20px;
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
    margin-top: 50px;
}
#turno{
    font-size:80px;
    margin-left: 85%;
    margin-top:-125px;
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

<img id = "logo" src = "data:image/jpeg;base64,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"
<center>
<?php echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($id_turno, 'QRCODE') . '" style = "margin-top:-25px;margin-left:20px;"/>'; ?>
</center>

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
        case "Tue":
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

<p id = "titulo_comprobante">TURNO <?php echo $dia; ?> {{date('d', strtotime($fecha))}} de <?php echo $mes; ?> de {{date('Y', strtotime($fecha))}}- <?php echo $horario; ?>hs</p>
<p id = "paciente">Paciente: {{$paciente}}</p>
</center>


<?php
    //$practicas = App\Models\turnos_practica::join('practicas', 'practicas.id_practica', 'turnos_practicas.id_practica')
    //->select('practicas.practica')->where('turnos_practicas.id_turno', $id_turno)->get();

    //foreach ($practicas as $practica) {
    //    echo "<ul>
    //            <li style = 'font-size:10px;'>".$practica->practica."</li>
    //          </ul>";
    //}
?>
<p id = "info">SI TIENE FIEBRE Y/O SÍNTOMAS RELACIONADOS CON COVID-19 REPROGRAME SU TURNO AL
WHATSAPP 3795-393798 | 3795-403798</p>
<p id = "info_1">PARA MINIMIZAR EL TIEMPO DE ESPERA, POR FAVOR RESPETE EL HORARIO ASIGNADO</p>
<p id = "info_2"><strong>Visite nuestra página web:</strong>laboratorio.saludcorrientes.gob.ar</p>
<?php
$options = new Options();
$options->set('isRemoteEnabled', TRUE);

$dompdf = new Dompdf($options);

$dompdf->set_option('isRemoteEnabled', TRUE);

$dompdf->loadhtml(ob_get_clean());
$dompdf->setPaper('A5');

$dompdf->render();
 
$dompdf->stream('TURNO_'.$paciente.'.pdf');
$dompdf->stream('TURNO_'.$paciente.'.pdf', array("Attachment" => false));

?>