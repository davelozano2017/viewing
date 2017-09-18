<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 0 ? 'Super Admin' : null;
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
    <link rel="stylesheet" href="../../assets/dist/css/amaran.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/animate.min.css">
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
  <link href="../../assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"> 
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
          <li><a href="add_administrators.php">Administrators</a></li>
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
          <li class="active"><a href="control_panel.php">Control Panel</a></li>
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
     Control Panel
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li>Settings</li>
        <li class="active">Control Panel</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- End  -->
      <div class="row">

      <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#panel_branches" data-toggle="tab">Branches</a></li>
              <li><a href="#panel_courses" data-toggle="tab">Courses</a></li>
              <li><a href="#panel_sections" data-toggle="tab">Sections</a></li>
              <li><a href="#panel_subjects" data-toggle="tab">Subjects</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="panel_branches">
                <div class="form-group">
                <button data-toggle="modal" data-target="#modal_branches" class="btn btn-primary flat"> Add Branches </button>
                </div>
                <?php include 'branches_container.php';?>
                <div id="show_branches"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="panel_courses">
                <div class="form-group">
                    <button data-toggle="modal" data-target="#modal_courses" class="btn btn-primary flat"> Add Courses </button>
                    <?php include 'courses_container.php';?>
                </div>
                <div id="show_courses"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="panel_sections">
                <div class="form-group">
                    <div class="form-group">
                      <button data-toggle="modal" data-target="#add_modal_section" class="btn btn-primary flat"> Add Section </button>
                      <?php include 'modal-section.php';?>
                    </div>
                    <div id="show_sections"></div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="panel_subjects">
                <div class="form-group">
                    <div class="form-group">
                      <button data-toggle="modal" data-target="#add_modal_subjects" class="btn btn-primary flat"> Add Subjects </button>
                      <?php include 'modal-subject.php';?>
                    </div>
                    <div id="show_subjects"></div>
                </div>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

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
<script src="../../assets/dist/js/jquery.amaran.min.js"></script>
<!-- DataTables -->
<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../assets/bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../assets/bower_components/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script>

var app = angular.module('app', ['ngMessages']);

// show tables begin
showsubjects();
showbranches();
showcourses();
showsections();
// show tables end

// sections begin
add_sections()
update_sections();
delete_sections();
// sections end 

// subjects begin
add_subjects();
delete_subjects();
update_subjects();
// subjects end 

// courses begin 
add_courses();
update_courses();
delete_courses();
// courses end

</script>
</body>
</html>