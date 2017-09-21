<?php
foreach($data->students($_SESSION['id']) as $row){
    $show[] = $row['student_id'];
}
    echo implode(',',$show);
