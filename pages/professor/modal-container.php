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
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="lastname" ng-pattern="/^[a-zA-Z ]*$/" name="lastname" ng-model="lastname" class="form-control" required>
                            <span ng-messages="addstudent.lastname.$error" ng-if="addstudent.lastname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" ng-model="firstname" ng-pattern="/^[a-zA-Z ]*$/" class="form-control" required>
                            <span ng-messages="addstudent.firstname.$error" ng-if="addstudent.firstname.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            <strong ng-message="pattern" class="text-danger">This field only requires alphabets.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" id="middlename" name="middlename" ng-model="middlename" ng-pattern="/^[a-zA-Z ]*$/"  class="form-control" required>
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
                            <label>Username</label>
                            <input type="text" id="username" name="username" ng-model="username" class="form-control" required>
                            <span ng-messages="addstudent.username.$error" ng-if="addstudent.username.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Course</label>
                            <select id="course" class="form-control">
                                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Section</label>
                            <select id="section" class="form-control">
                                <option value="M11">M11</option>
                                <option value="M12">M12</option>
                                <option value="M13">M13</option>
                                <option value="A11">A11</option>
                                <option value="A12">A12</option>
                                <option value="A13">A13</option>
                                <option value="E11">E11</option>
                                <option value="E12">E12</option>
                                <option value="E13">E13</option>
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