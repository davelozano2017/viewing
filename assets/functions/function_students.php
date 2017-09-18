<?php
foreach($data->students() as $row){
    $show[] = $row['student_id'];
}
    echo implode(',',$show);
