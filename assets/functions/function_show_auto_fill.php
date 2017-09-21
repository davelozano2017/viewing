<?php 
foreach($data->student_search($_POST['username']) as $row):?>
    <?php echo json_encode($row)?>
<?php endforeach;?>