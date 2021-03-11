<center>
<p>Turnos dengue | SARS</p>
<p>Total turnos asignados: <?php echo e($total_dengue); ?></p>
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
        labels: ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "16:00", "16:30", "17:00"],
        datasets: [{
          label: 'Turnos asignados',
          data: [<?php echo e($generales_12); ?>, <?php echo e($generales_13); ?>, <?php echo e($generales_14); ?>, <?php echo e($generales_15); ?>, <?php echo e($generales_16); ?>, <?php echo e($generales_17); ?>, <?php echo e($generales_18); ?>, <?php echo e($generales_23); ?>, <?php echo e($generales_24); ?>, <?php echo e($generales_25); ?>],
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
            'rgba(153, 102, 255, 0.2)'
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
            'rgba(255, 206, 86, 1)'
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
</script><?php /**PATH D:\Proyectos\Turnero\resources\views/estadisticas/graficos/graficos_dengue.blade.php ENDPATH**/ ?>