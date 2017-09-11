<?php 
date_default_timezone_set('Asia/Manila');
include '../../class/config.php';
$branch       = $data->post($_POST['branch']);
$course       = $data->post($_POST['course']);
$subject      = $data->post($_POST['subject']);
$section      = $data->post($_POST['section']);
$professor_id = $data->post($_POST['professor_id']);
$file         = $data->post($_POST['files']);
$sy           = $data->post($_POST['sy']);
$query        = $data->uploadgrades($file,$professor_id,$branch,$course,$subject,$section,$sy);
