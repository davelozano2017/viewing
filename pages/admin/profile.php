<?php include '../../class/config.php';
$data->redirecttologin();
$id        = $_SESSION['id'];
$photos    = $_SESSION['photo'];
$names     = $_SESSION['name'];
$roles     = $_SESSION['role'] == 1 ? 'Admin' : null;
foreach($data->getuserinfobyid($id) as $row) : ?>
<?php 
    $id       = $row['id'];
    $photo    = $row['photo'];
    $name     = $row['firstname']. ' ' .$row['middlename']. ' '.$row['lastname'];
    $email    = $row['email'];
    $contact  = $row['contact'];
    $username = $row['username'];
    $role     = $row['role'] == 1 ? 'Admin' : null;
?>     
<?php endforeach; ?>
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
              <span class="hidden-xs"><?php echo $names?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $photos?>" class="img-circle" alt="User Image">

                <p><?php echo $names?>
                  <small><?php echo $roles?></small>
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
            <img src="<?php echo $photos?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $names?></p>
            <!-- Status -->
            <a href="#"><?php echo $roles?></a>
        </div>
    </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><span> Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-bar-chart fa-fw"></i><span> Reports</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
          <ul class="treeview-menu">
          <li><a href="professor_report.php">Professors</a></li>
          <li><a href="student_report.php">Students</a></li>
          </ul>
      </li>
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
     Profile
    </h1>
    <ol class="breadcrumb">
    <li>Dashboard</li>
    <li class="active">Profile</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username"><?php echo $name?></h3>
                <h5 class="widget-user-desc"><?php echo $role?></h5>
                </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $photo?>" alt="User Avatar">
            </div>
            <div class="box-footer">
            </div>
          </div>
          <!-- /.widget-user -->
            
          </div>

          <div class="col-md-8 col-sm-12">
          <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#information" data-toggle="tab"> Information</a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane active" id="information">
              <form class="form-horizontal" method="POST" ng-app="app" ng-controller="mainController"  novalidate name="profile">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <p class="form-control"><?php echo $name?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <p class="form-control"><?php echo $email?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="contact" class="col-sm-2 control-label">Contact</label>
                  <div class="col-sm-10">
                    <p class="form-control"><?php echo $contact?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <p class="form-control"><?php echo $username?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" id="password" name="password" ng-model="password" class="form-control" required password-verify="{{confirm_password}}">
                    <input type="hidden" id="update_id" value="<?php echo$id?>">
                    <span ng-messages="profile.password.$error" ng-if="profile.password.$dirty">
                      <strong ng-message="required" class="text-danger">This field is required.</strong>
                      <strong ng-message="minlength" class="text-danger">Password is too short.</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label"> Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" id="confirm_password" name="confirm_password" ng-model="confirm_password" class="form-control" required password-verify="{{password}}">
                    <b ng-messages="profile.confirm_password.$error" ng-if="profile.confirm_password.$dirty">
                      <strong ng-message="required" class="text-danger" style="display:block">This field is required.</strong>
                      <strong ng-show="confirm_password != password" class="text-danger">Password not matched.</strong>
                    </b>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" ng-disabled="profile.$invalid" id="profile_update" class="btn btn-primary flat">Save Changes </button>
                  </div>
                </div>
              </form>
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
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/angular/passwordmatch.js"></script>
<script src="../../assets/dist/js/jquery.amaran.min.js"></script>

<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>