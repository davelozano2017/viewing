<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 2 ? 'Professor' : null;
$count_branches = $data->count_professor_branches($id);
$count_courses  = $data->count_professor_courses($id);
$count_subjects = $data->count_professor_subjects($id);
$count_students = $data->count_professor_students($id);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Access Computer College</title>
  <link rel="icon" href="../../assets/images/mini-icon.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/amaran.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/animate.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
  <link href="../../assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">
    
</head>
<body ng-app="apps" ng-controller='myCtrl' class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">

    <a class="logo">
      <span class="logo-mini"></span>
      <span class="logo-lg"></span>
    </a> 

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../assets/images/admin.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../assets/images/admin.png" class="img-circle" alt="User Image">

                <p><?php echo $name?>
                  <small><?php echo $role?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php?id=<?php echo $id?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="../../assets/images/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $name?></p>
            <!-- Status -->
            <a href="#"><?php echo $role?></a>
        </div>
    </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><span> Dashboard</span></a></li>
        <li class="treeview">
        <a href="#"><i class="fa fa-user fa-fw"></i><span> Students</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
            <li><a href="view_students.php">View Students</a></li>
          </ul>
        </li>
        <li><a href="reports.php"><i class="fa fa-bar-chart fa-fw"></i><span> Reports</span></a></li>
        <li><a href="professor_upload_grades.php"><i class="fa fa-upload fa-fw"></i><span> Upload Grades</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
     Dashboard
    </h1>
    <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    </ol>
  </section>

    <div class="row">
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="col-md-12 col-sm-12">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count_branches?></h3>

              <p>Branches</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-globe"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_courses?></h3>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="ion ion-ribbon-a"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_subjects?></h3>

              <p>Subjects</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-book"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count_students?></h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        <div class="box box-primary">
          <div class="box-body box-profile">
            <!-- Start -->
            <div id="show_grades"></div>
            <!-- End -->
          </div>
        </div>
      </div>
  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y')?> <a href="#">Access Computer College</a>.</strong> All rights reserved.
</footer>

</div>
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/jquery.amaran.min.js"></script>
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../assets/dist/js/adminlte.min.js"></script>
<script src="../../assets/functions/functions.js"></script>
<script src="../../assets/angular/angular.min.js"></script>
<script src="../../assets/angular/1.4.2.angular.min.js"></script>
<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../assets/bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../assets/bower_components/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script>showgrades()</script>
</body>
</html>