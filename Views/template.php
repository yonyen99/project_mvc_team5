<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PHP MVC Project | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="Views/style.css" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-info navbar-warmning ">
      <!-- Left navbar links -->
      <ul class="navbar-nav text-light">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-primary elevation-4">
          <!-- Brand Logo -->
          <a href="index3.html" class="brand-link">
            <img src="img/Logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Attendent List</span>
          </a>



          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>


                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index1.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Students</p>
                    </a>



                  </li>
                  <li class="nav-item">
                    <a href="index2.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Class</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index3.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Subjects</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index4.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>attendents</p>
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

  <!-- class -->
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-9">
        <div class="form-group">
          <select class="form-control" name="permissions">
            <option value="0" disabled selected>Class:</option>
            <?php
            foreach ($data['class_data'] as $rows) {
            ?>
              <option value="<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?><a href="index1.php"></a></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-1">

        <a href="login.php" class="float-right">
          <img class="img-fluid img-thumbnail mx-auto d-block" style="width: 40px; height: 40px;" src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/User_logout.png" alt="userlogout">
          <p>LOG OUT</p>
        </a>

      </div>
    </div>
  </div>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="p-5">
      <?php
      include "Views/" . $data['page'] . ".php";
      ?>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">PHP MVC Project-team5</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>