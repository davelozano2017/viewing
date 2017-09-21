<div id="add_modal_section" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Section Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST" name="form_section" ng-app="app" novalidate>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Section</label>
                            <input type="text" id="section" name="section" ng-model="section" class="form-control" required>
                            <span ng-messages="form_section.section.$error" ng-if="form_section.section.$dirty">
                            <strong ng-message="required" class="text-danger">This field is required.</strong>
                            </span>
                        </div>
                    </div>
                </div>


            <div class="modal-footer">
                <div class="row">
                    <button type="submit" ng-disabled="!form_section.$valid" id="btn_add_section" class="btn btn-primary btn-flat">Add</button>
                    <a class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>

<div id="update_modal_section" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Section Information</h4>
        </div>
        <div class="modal-body">  
            <form method="POST">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Section</label>
                            <input type="hidden" id="section_id">
                            <input type="text" id="section_update" class="form-control" required>
                            </span>
                        </div>
                    </div>
                </div>


            <div class="modal-footer">
                <div class="row">
                    <a class="btn" data-dismiss="modal">Close</a>
                    <button type="submit" id="btn_update_section" class="btn btn-primary btn-flat">Update</button>
                    <button type="submit" id="btn_delete_section" class="btn btn-danger btn-flat">Delete</button>
                </div>
            </div>
        </div>
        </form>
        </div>

    </div>
</div>