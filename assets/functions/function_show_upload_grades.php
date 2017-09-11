<?php 
if (isset($_POST['branch']) && isset($_POST['course']) && isset($_POST['section']) && isset($_POST['subject']) && isset($_POST['sy'])) {
    $branch = $data->post($_POST['branch']);
    $course = $data->post($_POST['course']);
    $section = $data->post($_POST['section']);
    $subject = $data->post($_POST['subject']);
    $sy = $data->post($_POST['sy']);
    
    $result = $data->show_validate_student($branch,$section,$course,$subject,$sy);
    if($result) { ?> 
        <div class="col-md-12">
            <div class="form-group">
                <label>Upload Excel File (.xlxs | .xls | .csv)</label>
                <input type="file" name="files" id="files" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" id="uploadfile" class="btn btn-primary flat"> Upload</button>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-md-12">
            <div class="alert alert-danger flat"> No record found. </div>
        </div>
    <?php }
}



?>

<script>
uploadgrades();
</script>