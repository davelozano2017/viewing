<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 3 ? 'Student' : null;
$username = $_SESSION['username'];
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
  <link rel="stylesheet" href="../../assets/dist/css/amaran.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/animate.min.css">
  <link rel="stylesheet" href="../../assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
  <link href="../../assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css">
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
              <img src="<?php echo $_SESSION['photo']?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['photo']?>" class="img-circle" alt="User Image">

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
            <img src="<?php echo $_SESSION['photo']?>" class="img-circle" alt="User Image">
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
        <li class="active"><a href="view_grades.php"><i class="fa fa-graduation-cap fa-fw"></i><span>  Grades</span></a></li>
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
     Grades
    </h1>
    <ol class="breadcrumb">
      <li class="active">Grades</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
      
      <div class="row">
        <div class="form-group">
          <div class="col-md-3 col-sm-12">
            <label for="">Branch</label>
            <input type="hidden" id="username" value="<?php echo $username?>">
            <select class="form-control" id="branch">
                <option value="">Select Branch</option>
                <?php foreach($data->showbranches() as $row):?>
                <option value="<?php echo $row['branches']?>"><?php echo $row['branches']?></option>
                <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-3 col-sm-12">
            <div class="form-group">
                <label>Subject</label>
                <select id="subject" class="form-control">
                <option value="">Select Subject</option>
                <?php foreach($data->showstudentinfo($username) as $row):?>
                <option value="<?php echo $row['subject']?>"><?php echo $row['subject']?></option>
                <?php endforeach; ?>
                </select>
            </div>
          </div>

          <div class="col-md-3 col-sm-12">
            <div class="form-group">
                <label>Section</label>
                <select id="section" class="form-control">
                <option value="">Select Section</option>
                <?php foreach($data->showstudentinfo($username) as $row):?>
                <option value="<?php echo $row['section']?>"><?php echo $row['section']?></option>
                <?php endforeach; ?>
                </select>
            </div>
          </div>

          <div class="col-md-3 col-sm-12">
            <div class="form-group">
                <label>School Year</label>
                <select id="sy" class="form-control">
                <option value="">Select Section</option>
                <?php foreach($data->show_school_year() as $row):?>
                <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
                <?php endforeach; ?>
                </select>
            </div>
          </div>

        </div>
      </div>
     
      <!-- View grades Start  -->
        <div id="showstudentgrades"></div>
      <!-- View Grades End  -->

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
<script>showstudentgrades()</script>
</body>
</html>