<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul> 
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Salir') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
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
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
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
                <a href="/dengue?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:red;"></i>
                  <p>Dengue</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/exudado?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:white;"></i>
                  <p>Exudado</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/espermograma?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:yellow;"></i>
                  <p>Espermograma</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/general?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:cyan;"></i>
                  <p>General</p>
                </a>
                </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/citogenetica?f=<?php echo $fecha = date('Y-m-d'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style = "color:blue;"></i>
                  <p>Citogenetíca</p>
                </a>
                </li>
            </ul>  
            <li class="nav-item">
              <a href="/vista-turnos" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Turnos del día
              </p>
            </a>
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
            @if((Auth::user()->rol == 'administrador')||(Auth::user()->rol == 'desarrollador'))
            <li class="nav-item">
            <a href="/estadisticas" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Estadistícas
              </p>
            </a>
            </li>
            @endif
            @if(Auth::user()->rol == 'desarrollador')
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Configuraciones
              </p>
            </a>
            </li>
            @endif
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper" style = "background-color:white;">
    <section class="content">
        @yield('contenido')
    </section>
    </div>    
</div>
<!-- ./wrapper -->
<script type = "text/javascript" src = "js/dengue.js"></script>
<script type = "text/javascript" src = "js/exudado.js"></script>
<script type = "text/javascript" src = "js/espermograma.js"></script>
<script type = "text/javascript" src = "js/generales.js"></script>
<script type = "text/javascript" src = "js/citogenetica.js"></script>