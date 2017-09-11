<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 1 ? 'Administrator' : null;
$administrators = $data->countadministrators();
$professors     = $data->countprofessors();
$students       = $data->countstudents();
$all       = $data->countall();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Access Computer College</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
</head>
<body ng-app="app" class="hold-transition skin-blue sidebar-mini">
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
            <img src="<?php echo $photo?>" class="img-circle" alt="User Image">
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
        <li><a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><span> Dashboard</span></a></li>
        <li class="treeview">
        <a href="#"><i class="fa fa-users fa-fw"></i><span> Manage Users</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
          <li><a href="add_professors.php">Professors</a></li>
          <li><a href="view_students.php">Students</a></li>
          </ul>
        </li>

        <li class="treeview active">
        <a href="#"><i class="fa fa-gear fa-fw"></i><span> Settings</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
          <li class="active"><a href="view_courses_and_branches.php">View courses and branches</a></li>
          </ul>
        </li>
        


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
     Courses and Branches
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li>Settings</li>
        <li class="active">Courses and branches</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- End  -->
      <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button data-toggle="modal" data-target="#modal_branches" class="btn btn-primary flat"> Add Branches </button>
                        <?php include 'branches_container.php';?>
                    </div>
                </div>
            </div>

            <!-- Trigger the modal with a button -->

          <div class="box box-solid">
            <div class="box-body">
            <div id="show_branches"></div>
            </div>
          </div>
        </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button data-toggle="modal" data-target="#modal_courses" class="btn btn-primary flat"> Add Courses </button>
                        <?php include 'courses_container.php';?>
                    </div>
                </div>
            </div>
          <div class="box box-solid">
            <div class="box-body">
              <div id="show_courses"></div>
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
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../assets/dist/js/adminlte.min.js"></script>
<script src="../../assets/functions/functions.js"></script>
<script src="../../assets/angular/angular.min.js"></script>
<script src="../../assets/angular/1.4.2.angular.min.js"></script>
<!-- DataTables -->
<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
showbranches();
showcourses();
var app = angular.module('app', ['ngMessages']);

</script>
</body>
</html>