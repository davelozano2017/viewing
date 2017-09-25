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
            <th colspan=4>&nbsp;</th>
            <tr>
            <th style="text-align:center">Subject</th>
            <th style="text-align:center">Professor</th>
            <th style="text-align:center">Grades</th>
            <th style="text-align:center">Remarks</th>
            <tr>
            <?php foreach($query as $row): ?>
            <?php $gen = ($row['gender'] == 'Female') ? 'Ms. ' : 'Mr. '?> 
            <tr>
            <td style="text-align:center"><?php echo $row['subject']?></th>
            <td style="text-align:center"><?php echo $gen.' '.$row['firstname'] . ' ' .$row['lastname']?></th>
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
