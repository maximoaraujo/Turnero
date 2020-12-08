<div class="container my-5 py-5">
<section>
  <div class="card">
    <div class="card-body mr-md-1">
      <div class="row mb-3">
        <div class="col-md-8 mb-4">
          <canvas id="barChart" height="100"></canvas>
        </div>

        <div class="col-md-4 mb-1 mb-md-0">
        <h5 class="text-center font-weight-bold mb-4">Total de turnos asignados</h5>
        <div class="d-flex justify-content-between">
        <small class="text-muted">Add products to cart</small>
        <small><span><strong>160</strong></span>/<span></span>200</small>
        </div>
        <div class="progress md-progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between">
        <small class="text-muted">Complete Purchase</small>
        <small><span><strong>310</strong></span>/<span></span>400</small>
        </div>
        <div class="progress md-progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between">
        <small class="text-muted">Visit Premium Page</small>
        <small><span><strong>480</strong></span>/<span></span>800</small>
        </div>
        <div class="progress md-progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="45"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex justify-content-between">
        <small class="text-muted">Send Inquiries</small>
        <small><span><strong>250</strong></span>/<span></span>500</small>
        </div>
        <div class="progress md-progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
      </div>
    </div>
    </div>
</section>
</div>

<script>
$(document).ready(function(){
   //bar
   var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ["06:30", "06:50", "07:10", "07:30", "07:50", "08:10"],
        datasets: [{
          label: 'Turnos asignados',
          data: [<?php echo e($generales_6); ?>, <?php echo e($generales_1); ?>, <?php echo e($generales_2); ?>, <?php echo e($generales_3); ?>, <?php echo e($generales_4); ?>, <?php echo e($generales_5); ?>],
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
</script><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/grafico_generados.blade.php ENDPATH**/ ?>