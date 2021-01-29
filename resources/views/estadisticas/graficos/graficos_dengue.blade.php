<center>
<p>Turnos dengue | SARS</p>
</center>
<section>
  <div class="card">
    <div class="card-body mr-md-1">
      <div class="row mb-3">
        <div class="col-md-8 mb-4">
          <canvas id="barDengue" height="100"></canvas>
        </div>
      </div>
    </div>
    </div>
</section>

<script>
$(document).ready(function(){
   var ctxB = document.getElementById("barDengue").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00"],
        datasets: [{
          label: 'Turnos asignados',
          data: [{{$generales_10}}, {{$generales_11}}, {{$generales_12}}, {{$generales_13}}, {{$generales_14}}, {{$generales_15}}, {{$generales_16}}, {{$generales_17}}, {{$generales_18}}],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 159, 64, 1)',
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