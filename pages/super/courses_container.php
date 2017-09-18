<!-- Modal -->
<div id="modal_courses" class="modal fade" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Course Information</h4>
    </div>
    <div class="modal-body">
      <form method="POST" name="frm_course" novalidate>
        <div class="form-group">
          <label>Course</label>
          <input type="text" id="course" name="course" ng-model="course" class="form-control" required>
          <span ng-messages="frm_course.course.$error" ng-if="frm_course.course.$dirty">
          <strong ng-message="required" class="text-danger">This field is required.</strong>
          </span>
        </div>

        <div class="form-group">
          <label>Option</label>
          <select id="option" name="option" class="form-control" required>
            <option value="Degree Courses">Degree Courses</option>
            <option value="Vocational Courses">Vocational Courses</option>
          </select>
          </span>
        </div>

    </div>
    <div class="modal-footer">
      <button type="submit" id="btn_courses" ng-disabled="!frm_course.$valid" class="btn btn-primary flat">Add</button>
      <a class="btn" data-dismiss="modal">Close</a>
    </div>
      </form>
  </div>

</div>
</div>


<!-- Modal -->
<div id="modal_courses_update" class="modal fade" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Course Information</h4>
    </div>
    <div class="modal-body">
      <form method="POST">
        <div class="form-group">
          <label>Course</label>
          <input type="hidden" id="courses_id" class="form-control" required>
          <input type="text" id="courses_update" class="form-control" required>
          </span>
        </div>

        <div class="form-group">
          <label>Option</label>
          <select id="options_update" class="form-control" required>
            <option value="Degree Courses">Degree Courses</option>
            <option value="Vocational Courses">Vocational Courses</option>
          </select>
          </span>
        </div>

    </div>
    <div class="modal-footer">
      <a class="btn" data-dismiss="modal">Close</a>
      <button type="submit" id="btn_update_course" class="btn btn-primary flat"> Update</button>
      <button type="submit" id="btn_delete_course" class="btn btn-danger flat"> Delete</button>
    </div>
      </form>
  </div>

</div>
</div>