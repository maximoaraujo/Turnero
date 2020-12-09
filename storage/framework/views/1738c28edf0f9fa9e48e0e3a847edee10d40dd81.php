<center>
<p>Turnos exudado</p>
</center>
<section>
  <div class="card">
    <div class="card-body mr-md-1">
      <div class="row mb-3">
        <div class="col-md-8 mb-4">
          <canvas id="barExudado" height="100"></canvas>
        </div>
      </div>
    </div>
    </div>
</section>

<script>
$(document).ready(function(){
   var ctxB = document.getElementById("barExudado").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30"],
        datasets: [{
          label: 'Turnos asignados',
          data: [<?php echo e($exudado_12); ?>, <?php echo e($exudado_13); ?>, <?php echo e($exudado_14); ?>, <?php echo e($exudado_15); ?>, <?php echo e($exudado_16); ?>, <?php echo e($exudado_17); ?>],
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
</script><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/graficos/graficos_exudados.blade.php ENDPATH**/ ?>