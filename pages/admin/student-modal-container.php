<div id="addstudents" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Student Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="addstudent" ng-app="app" novalidate>
                <input type="hidden" id="type" value="3">
                <div class="row">
                    <div class="col-md-12">
                        <label>Student ID</label>
                        <div class="form-group">
                            <input type="text" id="search_student" class="form-control">
                        </div>
                        <div id="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <label>Last Name</label>
                            <input type="text" id="lastname" ng-pattern="/^[a-zA-Z ñ]*$/" name="lastname" ng-model="lastname" class="form-control" required>
                            <span ng-messages="addstudent.lastname.$error" ng-if="addstudent.lastname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" ng-model="firstname" ng-pattern="/^[a-zA-Z ñ]*$/" class="form-control" required>
                            <span ng-messages="addstudent.firstname.$error" ng-if="addstudent.firstname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Middle Initial</label>
                            <input type="text" id="middlename" name="middlename" ng-model="middlename" ng-pattern="/^[a-zA-Z ñ]*$/"  class="form-control" required>
                            <span ng-messages="addstudent.middlename.$error" ng-if="addstudent.middlename.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" ng-model="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="email" class="form-control" required>
                            <span ng-messages="addstudent.email.$error" ng-if="addstudent.email.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" id="contact" ng-model="contact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"  ng-minlength="10" required>
                            <span ng-messages="addstudent.contact.$error" ng-if="addstudent.contact.$dirty">
                            <strong ng-message="maxlength" class="text-danger">Number is too long</strong>
                            <strong ng-message="minlength" class="text-danger">Number is too short</strong>
                            <strong ng-message="pattern" class="text-danger">number only</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Gender</label>
                            <select id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Student ID / Username</label>
                            <input type="text" id="username" name="username" ng-model="username" class="form-control" required>
                            <span ng-messages="addstudent.username.$error" ng-if="addstudent.username.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Branch</label>
                            <select class="form-control" id="branch">
                                <?php foreach($data->showbranches() as $row):?>
                                <option value="<?php echo $row['branches']?>"><?php echo $row['branches']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Section</label>
                            <select id="section" class="form-control">
                            <?php foreach($data->show_sections() as $row):?>
                            <option value="<?php echo $row['sections']?>"><?php echo $row['sections']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <select id="course" class="form-control">
                            <?php foreach($data->show_courses() as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Subject</label>
                            <select id="subject" class="form-control">
                            <?php foreach($data->show_subjects() as $row):?>
                            <option value="<?php echo $row['subject']?>"><?php echo $row['subject']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>School Year</label>
                            <select id="sy" class="form-control">
                            <?php foreach($data->show_school_year() as $row):?>
                            <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    

                </div>

            <div class="modal-footer">
                <div class="row">
                    <button type="submit" ng-disabled="!addstudent.$valid" id="create_students" class="btn btn-primary btn-flat">Create</button>
                    <a class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>


<div id="editstudent" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Student Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="editstudents" novalidate>
                
                <input type="hidden" id="type" value="3">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="hidden" id="accountid">
                            <input type="hidden" id="studentid">
                            <input type="text" id="elastname" ng-pattern="/^[a-zA-Z ñ]*$/" name="elastname" ng-model="elastname" class="form-control" required>
                            <span ng-messages="editstudents.elastname.$error" ng-if="editstudents.elastname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="efirstname" name="efirstname" ng-model="efirstname" ng-pattern="/^[a-zA-Z ñ]*$/" class="form-control" required>
                            <span ng-messages="editstudents.efirstname.$error" ng-if="editstudents.efirstname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Middle Initial</label>
                            <input type="text" id="emiddlename" name="emiddlename" ng-model="emiddlename" ng-pattern="/^[a-zA-Z ñ]*$/"  class="form-control" required>
                            <span ng-messages="editstudents.emiddlename.$error" ng-if="editstudents.emiddlename.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="eemail" ng-model="eemail" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="eemail" class="form-control" required>
                            <span ng-messages="editstudents.eemail.$error" ng-if="editstudents.eemail.$dirty">
                            <strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="econtact" id="econtact" ng-model="econtact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"  ng-minlength="10" required>
                            <span ng-messages="editstudents.econtact.$error" ng-if="editstudents.econtact.$dirty">
                            <strong ng-message="maxlength" class="text-danger">Number is too long</strong>
                            <strong ng-message="minlength" class="text-danger">Number is too short</strong>
                            <strong ng-message="pattern" class="text-danger">number only</strong>
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Gender</label>
                            <select id="egender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Student ID / Username</label>
                            <input type="text" id="eusername" name="eusername" ng-model="eusername" class="form-control" required>
                            <span ng-messages="editstudents.eusername.$error" ng-if="editstudents.eusername.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Branch</label>
                            <select class="form-control" id="ebranch">
                                <?php foreach($data->showbranches() as $row):?>
                                <option value="<?php echo $row['branches']?>"><?php echo $row['branches']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Section</label>
                            <select id="esection" class="form-control">
                            <?php foreach($data->show_sections() as $row):?>
                            <option value="<?php echo $row['sections']?>"><?php echo $row['sections']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <select id="ecourse" class="form-control">
                            <?php foreach($data->show_courses() as $row):?>
                            <option value="<?php echo $row['courses']?>"><?php echo $row['courses']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Subject</label>
                            <select id="esubject" class="form-control">
                            <?php foreach($data->show_subjects() as $row):?>
                            <option value="<?php echo $row['subject']?>"><?php echo $row['subject']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>School Year</label>
                            <select id="esy" class="form-control">
                            <?php foreach($data->show_school_year() as $row):?>
                            <option value="<?php echo $row['schoolyear']?>"><?php echo $row['schoolyear']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

            <div class="modal-footer">
                <div class="row">
                    <a class="btn" data-dismiss="modal">Close</a>
                    <button type="submit" id="edit_students" class="btn btn-primary btn-flat">Update</button>
                    <button type="submit" id="delete_students" class="btn btn-danger btn-flat">Delete</button>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>