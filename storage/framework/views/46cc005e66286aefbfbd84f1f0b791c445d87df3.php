<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/rechazo"><?php echo e(__('Rechazo turno')); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/consultas"><?php echo e(__('Consultas')); ?></a>
        </li>
        </ul> 
        <ul class="navbar-nav ml-auto">
            <div class="image mt-1 ml-3">
            <?php if(Auth::user()->img == ''): ?>  
              <?php if(Auth::user()->sexo == 'F'): ?>
              <img src="dist/img/avatar2.png" class="img-circle elevation-2" width='30' height='30'>
              <?php else: ?>
              <img src="dist/img/avatar.png" class="img-circle elevation-2" width='30' height='30'>
              <?php endif; ?>
            <?php else: ?>
              <img src="dist/img/<?php echo e(Auth::user()->img); ?>.png" class="img-circle elevation-2" width='30' height='30'>
            <?php endif; ?>
            </div>
            <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <?php echo e(Auth::user()->name); ?>

            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/mi-perfil">Mi perfil</a>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <?php echo e(__('Salir')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
            </div>
            </li>
        </ul> 
    </nav>
    <!-- /.navbar -->
    <!--Sidebar contenedor principal-->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/home" class="brand-link">
        <span class="brand-text font-weight-light">Gestión de turnos</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <?php if(Auth::user()->rol != 'espermograma'): ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-calendar-plus"></i>
              <p>
                Turnos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/dengue" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:red;"></i>
                  <p>Dengue | SARS</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/exudado" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:white;"></i>
                  <p>Exudado</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/espermograma" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:yellow;"></i>
                  <p>Espermograma</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/general" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:cyan;"></i>
                  <p>General</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/citogenetica" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:blue;"></i>
                  <p>Citogenética</p>
                </a>
                </li>
            </ul>
            <!--<ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/rechazo" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:red;"></i>
                  <p>Rechazo</p>
                </a>
                </li>
            </ul>
            </li>-->
            <!--<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Demanda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>-->
            <!--<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/consultas" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:brown;"></i>
                  <p>Consulta general</p>
                </a>
              </li>
            </ul>-->
            </li>
            <li class="nav-item">
              <a href="/vista-turnos" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Turnos del día
              </p>
            </a>
            </li>
            <li class="nav-item">
              <a href="/turnos-restantes6" class="nav-link">
              <i class="nav-icon far fa-clock"></i>
              <p>
                Tiempos de espera
              </p>
            </a>
            </li>
            <li class="nav-item">
              <a href="/planilla?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link" target="_blank">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Planilla
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="/ver-turnos" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Ver turnos
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="/pacientes" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pacientes
              </p>
            </a>
            </li>
            <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Correos
              </p>
            </a>
            </li>-->
            <?php if((Auth::user()->rol == 'administrador')||(Auth::user()->rol == 'desarrollador')): ?>
            <li class="nav-item">
            <a href="/estadisticas" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Estadistícas
              </p>
            </a>
            </li>
            <?php endif; ?>
            <?php if(Auth::user()->rol == 'desarrollador'): ?>
            <li class="nav-item">
            <a href="/configuraciones" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Configuraciones
              </p>
            </a>
            </li>
            <?php endif; ?>
        </ul>
        </nav>
        <?php endif; ?>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" style = "background-color:white;">
    <section class="content">
        <?php echo $__env->yieldContent('contenido'); ?>
    </section>
    </div>    
</div>
<!-- ./wrapper --><?php /**PATH C:\laragon\www\Turnero\resources\views/layouts/menu.blade.php ENDPATH**/ ?>