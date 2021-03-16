<center>
<p>Turnos generales</p>
<p>Total turnos asignados: <?php echo e($total_general); ?></p>
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
          <small><span><strong><?php echo e($asistidos_6); ?></strong></span>/<span></span><?php echo e($generales_6); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_6 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_6 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_6 / $generales_6)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">06:50</small>
          <small><span><strong><?php echo e($asistidos_1); ?></strong></span>/<span></span><?php echo e($generales_1); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_1 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_1 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_1 / $generales_1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:10</small>
          <small><span><strong><?php echo e($asistidos_2); ?></strong></span>/<span></span><?php echo e($generales_2); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_2 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_2 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_2 / $generales_2)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:30</small>
          <small><span><strong><?php echo e($asistidos_3); ?></strong></span>/<span></span><?php echo e($generales_3); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_3 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_3 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_3 / $generales_3)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">07:50</small>
          <small><span><strong><?php echo e($asistidos_4); ?></strong></span>/<span></span><?php echo e($generales_4); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_4 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_4 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_4 / $generales_8)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">08:10</small>
          <small><span><strong><?php echo e($asistidos_5); ?></strong></span>/<span></span><?php echo e($generales_5); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_5 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_5 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_5 / $generales_5)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">08:30</small>
          <small><span><strong><?php echo e($asistidos_7); ?></strong></span>/<span></span><?php echo e($generales_7); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_7 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_7 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_7 / $generales_7)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">08:50</small>
          <small><span><strong><?php echo e($asistidos_8); ?></strong></span>/<span></span><?php echo e($generales_8); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_8 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_8 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_8 / $generales_8)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">09:10</small>
          <small><span><strong><?php echo e($asistidos_9); ?></strong></span>/<span></span><?php echo e($generales_9); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_9 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_9 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_9 / $generales_9)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">09:30</small>
          <small><span><strong><?php echo e($asistidos_11); ?></strong></span>/<span></span><?php echo e($generales_11); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_11 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_11 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_11 / $generales_11)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>
          <div class="d-flex justify-content-between">
          <small class="text-muted">09:50</small>
          <small><span><strong><?php echo e($asistidos_37); ?></strong></span>/<span></span><?php echo e($generales_37); ?></small>
          </div>
          <div class="progress md-progress">
          <?php if($generales_37 == ''): ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_37 / 1)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php else: ?>
          <div class="progress-bar bg-blue" role="progressbar" style="width: <?php echo ($asistidos_37 / $generales_37)*100; ?>%" aria-valuenow="100"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <?php endif; ?>

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
        labels: ["06:30", "06:50", "07:10", "07:30", "07:50", "08:10", "08:30", "08:50", "09:10", "09:30", "09:50"],
        datasets: [{
          label: 'Turnos asignados',
          data: [<?php echo e($generales_6); ?>, <?php echo e($generales_1); ?>, <?php echo e($generales_2); ?>, <?php echo e($generales_3); ?>, <?php echo e($generales_4); ?>, <?php echo e($generales_5); ?>, <?php echo e($generales_7); ?>, <?php echo e($generales_8); ?>, <?php echo e($generales_9); ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 99, 132, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(255, 206, 86, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255,99,132,1)',
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
</script><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/graficos/graficos_generales.blade.php ENDPATH**/ ?>