<!-- Modal -->
<div id="modal_branches" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Branch Information</h4>
      </div>
      <div class="modal-body">
        <form method="POST" name="frm_branch" novalidate>
          <div class="form-group">
            <label>Branch</label>
            <input type="text" id="branch" name="branch" ng-model="branch" class="form-control" required>
            <span ng-messages="frm_branch.branch.$error" ng-if="frm_branch.branch.$dirty">
            <strong ng-message="required" class="text-danger">This field is required.</strong>
            </span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btn_branches" ng-disabled="!frm_branch.$valid" class="btn btn-primary flat">Add</button>
        <a class="btn" data-dismiss="modal">Close</a>
      </div>
        </form>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="modal_branches_update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Branch Information</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label>Branch</label>
              <input type="hidden" id="branch_id" class="form-control" required>
              <input type="text" id="update_branch" class="form-control" required>
            </span>
          </div>
      </div>
      <div class="modal-footer">
        <a class="btn" data-dismiss="modal">Close</a>
        <button type="submit" id="btn_update_branch"  class="btn btn-primary flat"> Update</button>
        <button type="submit" id="btn_delete_branch"  class="btn btn-danger flat"> Delete</button>
      </div>
        </form>
    </div>

  </div>
</div>