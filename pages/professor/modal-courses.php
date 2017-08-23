<div id="add_professor_course" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Student Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST">
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="hidden" id="professor_id" value="<?php echo $_SESSION['id']?>">
                            <select class="form-control" id="professor_course">
                                <?php foreach($data->showcourse() as $row): ?>
                                    <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>


            <div class="modal-footer">
                <div class="row">
                    <button type="submit"  id="btn_professor_course" class="btn btn-primary btn-flat">Add</button>
                    <a class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>


<div id="update_professor_course" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Course Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST">
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="hidden" id="update_id">
                            <select class="form-control" id="professor_update_course">
                                <?php foreach($data->showcourse() as $row): ?>
                                    <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>


            <div class="modal-footer">
                <div class="row">
                    <a class="btn" data-dismiss="modal">Close</a>
                    <button type="submit"  id="btn_professor_update_course" class="btn btn-primary btn-flat">Update</button>
                    <button type="submit"  id="btn_professor_delete_course" class="btn btn-danger btn-flat">Delete</button>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>
