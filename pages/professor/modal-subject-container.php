<div id="addsubjects" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subject Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="frmaddsubject" ng-app="app" novalidate>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <select id="course" class="form-control">
                            <?php foreach($data->showprofessorcourse($_SESSION['id']) as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Subject</label>
                            <input type="hidden" id="professor_id" value="<?php echo $_SESSION['id']?>">
                            <input type="text" id="subject" name="subject" ng-model="subject" class="form-control" required>
                            <span ng-messages="frmaddsubject.subject.$error" ng-if="frmaddsubject.subject.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Section</label>
                            <select id="section" class="form-control">
                            <?php foreach($data->showprofessorsection($_SESSION['id']) as $row):?>
                            <option value="<?php echo $row['professor_section']?>"><?php echo $row['professor_section']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                 

            <div class="modal-footer">
                <div class="row">
                    <button type="submit" ng-disabled="!frmaddsubject.$valid" id="create_subject" class="btn btn-primary btn-flat">Create</button>
                    <a class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>


<div id="editsubject" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Subject Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="frmeditsubject" novalidate>
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="hidden" id="professor_id" >
                            <input type="hidden" id="id" >
                            <select id="scourse" class="form-control">
                            <?php foreach($data->showprofessorcourse($_SESSION['id']) as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Subject</label>
                            <input type="text" id="ssubject" class="form-control" required>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Section</label>
                            <select id="ssection" class="form-control">
                            <?php foreach($data->showprofessorsection($_SESSION['id']) as $row):?>
                            <option value="<?php echo $row['professor_section']?>"><?php echo $row['professor_section']?></option>
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
