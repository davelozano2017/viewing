<?php 
include '../class/config.php';
$data->redirecttopageafterlogin();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Access Computer College</title>
  <link rel="icon" href="../assets/images/mini-icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/dist/css/amaran.min.css">
  <link rel="stylesheet" href="../assets/dist/css/animate.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background:url(../assets/images/background.png);background-repeat:no-repeat;background-size:100% 100%;background-attachment: fixed" class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
  <a><img class="img-responsive" src="../assets/images/logo.png"></a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">Enter your email to request a new password</p>

  <form method="post" ng-app="app" name="frmeamil" novalidate>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" ng-model="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      <span ng-messages="frmeamil.email.$error" ng-if="frmeamil.email.$dirty">
      <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
      <strong ng-message="required" class="text-danger">This field is required.</strong>
      </span>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <button type="submit" id="request" ng-disabled="!frmeamil.$valid" class="btn btn-primary  btn-flat">Send</button>
        <a href="login.php" class="btn pull-right">Login</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
              



</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/functions/functions.js"></script>
<script src="../assets/angular/angular.min.js"></script>
<script src="../assets/angular/1.4.2.angular.min.js"></script>
<script src="../assets/dist/js/jquery.amaran.min.js"></script>

<script>
var app = angular.module('app', ['ngMessages']);
request()
</script>
</body>
</html>
