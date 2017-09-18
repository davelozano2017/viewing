<div id="add_modal_subjects" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subject Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="frmsubjects" ng-app="app" novalidate>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <select id="sub_course" class="form-control">
                            <?php foreach($data->show_courses() as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Subject</label>
                            <input type="text" id="sub_subject" name="sub_subject" ng-model="sub_subject" class="form-control" required>
                            <span ng-messages="frmsubjects.sub_subject.$error" ng-if="frmsubjects.sub_subject.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Section</label>
                            <select id="sub_section" class="form-control">
                            <?php foreach($data->show_sections() as $row):?>
                            <option value="<?php echo $row['sections']?>"><?php echo $row['sections']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                 

            <div class="modal-footer">
                <div class="row">
                    <button type="submit" ng-disabled="!frmsubjects.$valid" id="add_subjects" class="btn btn-primary btn-flat">Add</button>
                    <a class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>


<div id="update_modal_subjects" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subject Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" novalidate>
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="hidden" id="update_sub_id" >
                            <select id="update_sub_course" class="form-control">
                            <?php foreach($data->show_courses() as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Subject</label>
                            <input type="text" id="update_sub_subject" class="form-control" required>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Section</label>
                            <select id="update_sub_section" class="form-control">
                            <?php foreach($data->show_sections() as $row):?>
                            <option value="<?php echo $row['sections']?>"><?php echo $row['sections']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                </div>

                 

            <div class="modal-footer">
                <div class="row">
                <a class="btn" data-dismiss="modal">Close</a>
                <button type="submit" id="update_subject" class="btn btn-primary btn-flat">Update</button>
                <button type="submit" id="delete_subject" class="btn btn-danger btn-flat">Delete</button>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>
