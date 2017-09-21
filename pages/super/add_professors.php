<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 0 ? 'Super Admin' : null;
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
  <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
  <link href="../../assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">
<link rel="stylesheet" href="../../assets/dist/css/amaran.min.css">
<link rel="stylesheet" href="../../assets/dist/css/animate.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
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
        <li><a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><span> Dashboard</span></a></li>
        <li><a href="reports.php"><i class="fa fa-bar-chart fa-fw"></i><span> Reports</span></a></li>

        <li class="treeview active">
        <a href="#"><i class="fa fa-users fa-fw"></i><span> Manage Users</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
          <li><a href="add_administrators.php">Administrators</a></li>
          <li class="active"><a href="add_professors.php">Professors</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#"><i class="fa fa-gear fa-fw"></i><span> Settings</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
          <li><a href="control_panel.php">Control Panel</a></li>
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
     Professor
    </h1>
    <ol class="breadcrumb">
    <li>Dashboard</li>
    <li>Manage Users</li>
    <li class="active">Add Professor</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
    <div class="col-md-4 col-sm-12">
      <div class="box box-primary">
        <div class="box-body box-profile">
        <form method="POST" name="add" ng-app="app" ng-controller="mainController"  novalidate>
        <input type="hidden" id="type" value="2">

          <div class="box-body">
            
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" id="lastname" ng-pattern="/^[a-zA-Z ]*$/" name="lastname" ng-model="lastname" class="form-control" required>
              <span ng-messages="add.lastname.$error" ng-if="add.lastname.$dirty">
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
              </span>
            </div>

            <div class="form-group">
              <label>First Name</label>
              <input type="text" id="firstname" name="firstname" ng-model="firstname" ng-pattern="/^[a-zA-Z ]*$/" class="form-control" required>
              <span ng-messages="add.firstname.$error" ng-if="add.firstname.$dirty">
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Middle Name</label>
              <input type="text" id="middlename" name="middlename" ng-model="middlename" ng-pattern="/^[a-zA-Z ]*$/"  class="form-control" required>
              <span ng-messages="add.middlename.$error" ng-if="add.middlename.$dirty">
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" ng-model="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="email" class="form-control" required>
              <span ng-messages="add.email.$error" ng-if="add.email.$dirty">
              <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              </span>

            </div>

            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" class="form-control" name="contact" id="contact" ng-model="contact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"  ng-minlength="10" required>
              <span ng-messages="add.contact.$error" ng-if="add.contact.$dirty">
              <strong ng-message="maxlength" class="text-danger">Number is too long</strong>
              <strong ng-message="minlength" class="text-danger">Number is too short</strong>
              <strong ng-message="pattern" class="text-danger">number only</strong>
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              
              </span>
            </div>
            
            <div class="form-group">
              <label>Gender</label>
              <select id="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" id="username" name="username" ng-model="username" class="form-control" required>
              <span ng-messages="add.username.$error" ng-if="add.username.$dirty">
              <strong ng-message="required" class="text-danger">This field is required.</strong>
              </span>
            </div>

            <div class="form-group">
              <label>Branch</label>
              <select class="form-control" id="branch">
              <?php foreach($data->show_branches() as $row): ?>
                <option value="<?php echo $row['branches']?>"><?php echo $row['branches']?></option>
              <?php endforeach;?>
              </select>
            </div>
           
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" ng-disabled="!add.$valid" id="create_administrator" class="btn btn-primary btn-flat">Create</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <div class="col-md-8 col-sm-12">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <!-- Start -->
          <div id="showprofessor"></div>
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
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../assets/dist/js/adminlte.min.js"></script>
<script src="../../assets/functions/functions.js"></script>
<script src="../../assets/angular/angular.min.js"></script>
<script src="../../assets/angular/1.4.2.angular.min.js"></script>
<script src="../../assets/angular/passwordmatch.js"></script>
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
<script src="../../assets/dist/js/jquery.amaran.min.js"></script>
<script type="text/javascript">
//School information
showprofessor()
insertuser();

</script>
</body>
</html>