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
<?php endforeach;?>
<div class="row">
<div id="print_area" class="b">      
    <div style="width:70%;margin:auto;padding:auto;padding:10px">
        <table style="width:100%">
            <th colspan=4 style="text-align:center">
                <h4>Access Computer and Technical Schools
                    <span style="display:block">Final Grades</span>
                </h3>
            </th>
            <tr>
            <tr>
            <th style="text-align:cneter">Branch </th> 
            <td style="text-align:left">&nbsp; <?php echo $row['branch']?></td> 
            <th style="text-align:cneter">School Year</th> 
            <td style="text-align:left">&nbsp; <?php echo $row['sy']?> </td>
            <tr>
            <th style="text-align:cneter">Student Name </th> 
            <td style="text-align:left">&nbsp; <?php echo $row['name']?></td> 
            <th style="text-align:cneter">Section </th> 
            <td style="text-align:left">&nbsp; <?php echo $row['section']?> </td>
            <tr>
            <th style="text-align:cneter">Course </th> 
            <td style="text-align:left">&nbsp; <?php echo $row['course']?></td> 
            <th style="text-align:cneter">Semester</th> 
            <td style="text-align:left">&nbsp; <span style="text-transform:uppercase"><?php echo $row['semester']?></span> </td>
        </table>
        <table style="width:100%">
            <tr>
            <th colspan=3>&nbsp;</th>
            <tr>
            <th style="text-align:center">Subject</th>
            <th style="text-align:center">Grades</th>
            <th style="text-align:center">Remarks</th>
            <tr>
            <?php foreach($query as $row): ?>
            <tr>
            <td style="text-align:center"><?php echo $row['subject']?></th>
            <td style="text-align:center"><?php echo $row['final']?></th>
            <td style="text-align:center"><?php echo $row['remarks']?></th>
            </tr>
            <?php endforeach;?>
            <tr>
                <th>&nbsp;</th>
            </tr>
            </table>
            <table style="width:100%">
            <th style="text-align:right">Date </th>
            <td style="text-align:center;width:150px"><?php echo date('F d, Y',strtotime($row['date']));?></td>
            </table>
        </div>
            

    <div class="col-md-12">
        <button class="print-link no-print btn btn-primary flat avoid-this">Print Grades</button>
    </div>
 </div>
</div>

<?php } else {?>
    <div class="alert alert-danger flat"> No record found. </div>

<?php } ?>



















<script type='text/javascript'>
jQuery(function($) { 'use strict';
  $("#print_area").find('.print-link').on('click', function() {
      $("#print_area").print({
        //Use Global styles
        globalStyles : true,
        //Add link with attrbute media=print
        mediaPrint : true,
        //Custom stylesheet
        stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
        //Print in a hidden iframe
        iframe : false,
        //Don't print this
        noPrintSelector : ".avoid-this",
        //Add this at top
        deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
    });
  });
});
</script>
<!-- 
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
    </div> -->