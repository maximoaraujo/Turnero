<center>
<p>Turnos generales</p>
</center>
<section>
  <div class="card">
    <div class="card-body mr-md-1">
      <div class="row mb-3">
        <div class="col-md-8 mb-4">
          <canvas id="barChart" height="100"></canvas>
        </div>

        <div class="col-md-4 mb-1 mb-md-0">
          <div class="d-flex justify-content-between">
          <small class="text-muted">06:30</small>
          <small><span><strong>{{$asistidos_6}}</strong></span>/<span></span>{{$generales_6}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($asistidos_6 / $generales_6)*100; ?>%" aria-valuenow="55"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
          <small class="text-muted">06:50</small>
          <small><span><strong>{{$asistidos_1}}</strong></span>/<span></span>{{$generales_1}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($asistidos_1 / $generales_1)*100; ?>%" aria-valuenow="80"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:10</small>
          <small><span><strong>{{$asistidos_2}}</strong></span>/<span></span>{{$generales_2}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($asistidos_2 / $generales_2)*100; ?>%" aria-valuenow="45"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:30</small>
          <small><span><strong>{{$asistidos_3}}</strong></span>/<span></span>{{$generales_3}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($asistidos_3 / $generales_3)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:50</small>
          <small><span><strong>{{$asistidos_4}}</strong></span>/<span></span>{{$generales_4}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-purple" role="progressbar" style="width: <?php echo ($asistidos_4 / $generales_4)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div> 
          <div class="d-flex justify-content-between">
          <small class="text-muted">08:10</small>
          <small><span><strong>{{$asistidos_5}}</strong></span>/<span></span>{{$generales_5}}</small>
          </div>
          <div class="progress md-progress">
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_5 / $generales_5)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>

<script>
$(document).ready(function(){
   var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["06:30", "06:50", "07:10", "07:30", "07:50", "08:10"],
        datasets: [{
          label: 'Turnos asignados',
          data: [{{$generales_6}}, {{$generales_1}}, {{$generales_2}}, {{$generales_3}}, {{$generales_4}}, {{$generales_5}}],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
});
</script>