<?php 
$username  = $data->post($_POST['username']);
$branch    = $data->post($_POST['branch']);
$subject   = $data->post($_POST['subject']);
$section   = $data->post($_POST['section']);
$sy        = $data->post($_POST['sy']);
$query     = $data->showstudentgrades($username,$branch,$subject,$section,$sy);
?>

<?php 
if($query) {

?>
<?php foreach($query as $row): ?>
<div class="row">
    <div class="col-md-3">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li><a href="#">QUIZ <span class="pull-right">40%</span></a></li>
                <li><a href="#">Prelim <span class="pull-right badge bg-blue flat"><?php echo $row['q_pl']?></span></a></li>
                <li><a href="#">Midterm <span class="pull-right badge bg-blue flat"><?php echo $row['q_mt']?></span></a></li>
                <li><a href="#">Pre Finals <span class="pull-right badge bg-blue flat"><?php echo $row['q_pf']?></span></a></li>
                <li><a href="#">Finals <span class="pull-right badge bg-blue flat"><?php echo $row['q_fn']?></span></a></li>
                <li><a href="#">Average <span class="pull-right badge bg-blue flat"><?php echo $row['q_ave']?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li><a href="#">EXAM <span class="pull-right">40%</span></a></li>
                <li><a href="#">Prelim <span class="pull-right badge bg-blue flat"><?php echo $row['e_pl']?></span></a></li>
                <li><a href="#">Midterm <span class="pull-right badge bg-blue flat"><?php echo $row['e_mt']?></span></a></li>
                <li><a href="#">Pre Finals <span class="pull-right badge bg-blue flat"><?php echo $row['e_pf']?></span></a></li>
                <li><a href="#">Finals <span class="pull-right badge bg-blue flat"><?php echo $row['e_fn']?></span></a></li>
                <li><a href="#">Average <span class="pull-right badge bg-blue flat"><?php echo $row['e_ave']?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li><a href="#">SIO <span class="pull-right">20%</span></a></li>
                <li><a href="#">SIO <span class="pull-right badge bg-blue flat"><?php echo $row['s_sio']?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                <li><a href="#">GRADES </a></li>
                <li><a href="#">Grade <span class="pull-right badge bg-red flat"><?php echo $row['grades']?></span></a></li>
                <li><a href="#">Add <span class="pull-right badge bg-blue flat"><?php echo $row['g_add']?></span></a></li>
                <li><a href="#">Final <span class="pull-right badge bg-red flat"><?php echo $row['final']?></span></a></li>
                <li><a href="#">Remark <span class="pull-right badge bg-red flat"><?php echo $row['remarks']?></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>

<?php } else {?>
        <div class="alert alert-danger flat"> No record found. </div>
<?php } ?>