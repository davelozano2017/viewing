<?php 
include '../../class/config.php';
$data->redirecttologin();
$id       = $_SESSION['id'];
$photo    = $_SESSION['photo'];
$name     = $_SESSION['name'];
$role     = $_SESSION['role'] == 2 ? 'Professor' : null;
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
        <li class="active"><a href="professor_upload_grades.php"><i class="fa fa-upload fa-fw"></i><span> Upload Grades</span></a></li>

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
     Upload Grades
    </h1>
    <ol class="breadcrumb">
    <li>Dashboard</li>
    <li class="active">Upload grades</li>
    </ol>
  </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">

    <div class="col-md-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <!-- Start -->
          <form method="POST" name="FormUpload" id="FormUpload" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Branch</label>
                    <input type="hidden" id="professor_id" value="<?php echo $id?>">
                    <select class="form-control" id="branch">
                        <option value=""> Select Branch </option>
                        <?php foreach($data->show_professor_branch($id) as $row):?>
                        <option value="<?php echo $row['branch']?>"><?php echo $row['branch']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Course</label>
                    <select id="course" class="form-control">
                    <option value=""> Select Course </option>
                    <?php foreach($data->show_professor_courses($id) as $row):?>
                    <option value="<?php echo $row['course']?>"><?php echo $row['course']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Subject</label>
                    <select id="subject" class="form-control">
                    <option value=""> Select Subject </option>
                    <?php foreach($data->show_professor_subjects($id) as $row):?>
                    <option value="<?php echo $row['subject']?>"><?php echo $row['subject']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Section</label>
                    <select id="section" class="form-control">
                    <option value=""> Select Section </option>
                    <?php foreach($data->show_professor_sections($id) as $row):?>
                    <option value="<?php echo $row['section']?>"><?php echo $row['section']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>School Year</label>
                    <select id="sy" class="form-control">
                    <option value=""> Select School Year </option>
                    <?php foreach($data->show_school_year() as $row):?>
                    <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div id="showuploadgrades"></div>
            </div>
          <!-- End -->
          </form>
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
<script src="../../assets/dist/js/jquery.amaran.min.js"></script>
<script src="../../assets/dist/js/adminlte.min.js"></script>
<script src="../../assets/functions/functions.js"></script>
<script src="../../assets/angular/angular.min.js"></script>
<script src="../../assets/angular/1.4.2.angular.min.js"></script>
<script> 
uploadgradesvalidation(); 
</script>
</body>
</html>