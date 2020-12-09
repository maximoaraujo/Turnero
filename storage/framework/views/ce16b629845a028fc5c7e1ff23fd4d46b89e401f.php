<center>
<p>Turnos espermograma</p>
</center>
<section>
  <div class="card">
    <div class="card-body mr-md-1">
      <div class="row mb-3">
        <div class="col-md-8 mb-4">
          <canvas id="barEsp" height="100"></canvas>
        </div>
      </div>
    </div>
    </div>
</section>

<script>
$(document).ready(function(){
   var ctxB = document.getElementById("barEsp").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["15:30", "16:00", "16:30", "17:00"],
        datasets: [{
          label: 'Turnos asignados',
          data: [<?php echo e($expermograma_22); ?>, <?php echo e($expermograma_23); ?>, <?php echo e($expermograma_24); ?>, <?php echo e($expermograma_25); ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
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
</script><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/graficos/graficos_espermograma.blade.php ENDPATH**/ ?>