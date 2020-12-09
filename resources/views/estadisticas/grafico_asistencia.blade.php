<section>
    <div class="card">
    <div class="card-body px-0 pb-0">
        <h5 class="text-center font-weight-bold mb-4">Asistencia a turnos</h5>
        <hr>
        <div class="row mt-3 pt-3">
            <div class="col-md-6 mb-4 mb-md-0 mx-auto">
            <canvas id="graf_asist"></canvas>
            </div>
            <div class="col-12 pt-4 mt-2 mb-4 mb-md-0 mx-auto">
            <div class="list-group">
                <a href="#!" class="list-group-item list-group-item-action rounded-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">Total de turnos emitidos
                <span class="text-success">{{$total}}</span>
                </a>
                <a href="#!" class="list-group-item list-group-item-action rounded-0 border-left-0 border-right-0 d-flex justify-content-between align-items-center">Asistidos
                <span class="text-danger">{{$asistidos}}</span>
                </a>
                <a href="#!" class="list-group-item list-group-item-action border-bottom-0 border-left-0 border-right-0 rounded-bottom-left rounded-bottom-right d-flex justify-content-between align-items-center">No asistidos
                <span style = "color:#46BFBD;font-wight:bold;">{{$no_asistidos}}</span>
                </a>
            </div>
        </div>
        </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function(){
    var ctxD = document.getElementById("graf_asist").getContext("2d");
    var myLineChart = new Chart(ctxD, {
    type: "doughnut",
    data: {
        labels: ["Asistieron", "No asistieron"],
        datasets: [{
        data: [{{$asistidos}}, {{$no_asistidos}}],
        backgroundColor: ["#F7464A", "#46BFBD"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
        }]
    },
    options: {
        responsive: true,
        legend: {
        position: "right",
        align: "center",
        labels: {
            padding: 20
        }
        }
    }
    });
});
</script>