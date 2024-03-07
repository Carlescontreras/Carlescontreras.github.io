<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITE - Desamiantados | Calculo de presupuestos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- ION SLIDER -->
  <link rel="stylesheet" href="../plugins/ion-rangeslider/css/ion.rangeSlider.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini" onload="init()">
<div class="wrapper">
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="../dist/img/LOGO.png" alt="ITE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ITE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist\img\boxed-bg.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User placeholder</a> <!--TODO: Profile_page!-->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class -->
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Paginas principales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="starter.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagina principal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pressupostos.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calculo de presupuestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incomming...</p> <!-- TODO: More options! :D -->
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Presupuestos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="starter.php">Home</a></li>
              <li class="breadcrumb-item active">Presupuestos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla con servicios y precios base</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pres" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre del servicio</th>
                    <th>Precio base</th>
                    <th>Modificar precio</th>
                    <th>Cantidad</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $services = array(
                    array('name' => 'Retirada cubierta amianto', 'basePrice' => 35, 'prefix' => "€/m^2"),
                    array('name' => 'Repicado y reposicón de cajón cerámico (3m) ', 'basePrice' => 1200, 'prefix' => "€/unity"),
                    array('name' => 'Retirada de tubo de cibrocemento y substitución (3m)', 'basePrice' => 1800, 'prefix' => "€/unity"),
                    array('name' => 'Retirada de depositos (300L)', 'basePrice' => 300, 'prefix' => "€/unity"),
                    array('name' => 'Retirada de depositos (1000L)', 'basePrice' => 800, 'prefix' => "€/unity"),
                    array('name' => 'Medios auxiliares (elevación)', 'basePrice' => 864, 'prefix' => "€/unity"),
                    array('name' => 'Medios auxiliares (andamio)', 'basePrice' => 700, 'prefix' => "€/unity"),
                  );
                  $i = 0;
                  foreach ($services as $index => $service) {
                    echo "<tr>
                            <td>{$service['name']}</td>
                            <td>{$service['basePrice']}{$service['prefix']}</td>
                            <td style='width: 500px'>
                                <input class='range_prices' type='number' id='range_{$i}' value={$service['basePrice']}>
                            </td>
                            <td>
                                <div class='input-group'>
                                  <div class='input-group-prepend'>
                                  <span class='input-group-text''>
                                    <input class='selectCheck' type='checkbox' id='selectCheck_{$i}' data-index='{$i}'>
                                    </span>
                                  </div>
                                  <input type='number' class='form-control inputCantidad' id='inputCantidad_{$i}' value='1'>
                                </div>
                            </td>
                          </tr>";
                    $i++;
                  }
                  ?>
                  </tbody>
                </table>
                <p>Precio final (sin IVA):
                  <span id="finalPrice"> 0</span>
                </p>
                <p>Precio final (con IVA [10%]):
                  <span id="finalPrice10"> 0</span>
                </p>
                <p>Precio final (con IVA [21%]):
                  <span id="finalPrice21"> 0</span>
                </p>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Ion Slider -->
<script src="../plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    /* ION SLIDER */
    $('.range_prices').ionRangeSlider({
      min     : 10,
      max     : 2000,
      type    : 'single',
      step    : 1,
      postfix : '€',
      prettify: false
    });
  });
  var inputsPrecio = document.querySelectorAll('.range_prices');
  var inputsCantidad = document.querySelectorAll('.inputCantidad');
  var inputsSelects = document.querySelectorAll('.selectCheck');

  var totalPrice = document.getElementById('finalPrice');
  var totalPrice10 = document.getElementById('finalPrice10');
  var totalPrice21 = document.getElementById('finalPrice21');

  //Necesitamos saber si algun componente cambia --> listener!
  inputsSelects.forEach(function(checkbox) {
    checkbox.addEventListener('change', updateTotalPrice);
  });

  inputsCantidad.forEach(function(input) {
    input.addEventListener('input', updateTotalPrice);
  });

  function updateTotalPrice() {
    var total = 0;
    inputsSelects.forEach(function (checkbox, index) {
      if (checkbox.checked) {
        total += inputsPrecio[index].value * inputsCantidad[index].value;
      }
    });

    totalPrice.textContent = total;
    totalPrice10.textContent = total+(total/10);
    totalPrice21.textContent = total+(total/100*21);
  }
</script>
</body>
</html>
