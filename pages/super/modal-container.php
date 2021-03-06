<!-- Modal -->
<div id="modalschoolyear" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form name="frmsy" method="POST" ng-app="app" novalidate>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">School Year</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>School Year</label>
            <input type="text" id="sy" ng-model="sy" name="sy" class="form-control" required>
            <span ng-messages="frmsy.sy.$error" ng-if="frmsy.sy.$dirty">
              <strong ng-message="required" class="text-danger">This field is required.</strong>
            </span>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn flat" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary flat" ng-disabled="!frmsy.$valid" id="btnaddschoolyear">Add</button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal_school_year_update" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form name="frmsy" method="POST">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">School Year</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>School Year</label>
            <input type="hidden" id="update_id"  class="form-control" required>
            <input type="text" id="update_schoolyear" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn flat" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-danger flat" ng-disabled="!frmsy.$valid" id="btn_udelete_school_year">Delete</button>
        <button type="submit" class="btn btn-primary flat" ng-disabled="!frmsy.$valid" id="btn_update_school_year">Save Changes</button>
        </form>
      </div>
    </div>

  </div>
</div>