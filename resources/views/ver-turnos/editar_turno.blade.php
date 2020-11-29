<div class = "row" style = "margin-top:20px;margin-left:10px;">
    <p>Paciente: {{$paciente}}</p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Fecha del turno: {{date('d-m-Y', strtotime($fecha))}}</p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Horario del turno: {{$horario_turno}}</p>
</div>
<hr>