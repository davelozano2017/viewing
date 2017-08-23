var url = '../assets/functions/functions.php';
//Sign In button
function btnsinindisabled() {
    $('#signin').html('Please Wait').attr('disabled',true);
}

function btnsigninenabled() {
    $('#signin').html('Sign In').attr('disabled',false);
}

function btnadmindisabled() {
    $('#create_administrator').html('Please Wait').attr('disabled',true);
}

function btnadminenabled(message) {
    $('#create_administrator').html('Create').attr('disabled',false);
}

function btnstudentdisabled() {
    $('#create_students').html('Please Wait').attr('disabled',true);
}

function btnstudentenabled(message) {
    $('#create_students').html('Create').attr('disabled',false);
}

function btnbranchesdisabled() {
    $('#btn_branches').html('Please Wait').attr('disabled',true);
}

function btnbranchesenabled(message) {
    $('#btn_branches').html('Add').attr('disabled',false);
    showbranches();
}

function btncoursesdisabled() {
    $('#btn_courses').html('Please Wait').attr('disabled',true);
}

function btncoursesenabled(message) {
    $('#btn_courses').html('Add').attr('disabled',false);
    showcourses();
}

function btnupdatecoursesdisabled() {
    $('#btn_update_course').html('Please Wait').attr('disabled',true);
}

function btnupdatecoursesenabled(message) {
    $('#btn_update_course').html('Update').attr('disabled',false);
    showcourses();
}

function btnupdatebranchesdisabled() {
    $('#btn_update_branch').html('Please Wait').attr('disabled',true);
}

function btnupdatebranchesenabled(message) {
    $('#btn_update_branch').html('Update').attr('disabled',false);
    showbranches();
}


//login 
function login() {
    $('#signin').click(function(e){
        e.preventDefault();
        btnsinindisabled();
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            type : 'POST',
            url : url,
            data : { action : 'login', username : username, password: password },
            dataType: 'json',
            success:function(response) {
                response.success == true ? location.href = response.location : btnsigninenabled()
            }
        })
    })
}

//Add Administrator & Professor 
function insertuser() {
    $('#create_administrator').click(function(e){
        e.preventDefault();
        btnadmindisabled();
        var lastname    = $('#lastname').val();
        var firstname   = $('#firstname').val();
        var middlename  = $('#middlename').val();
        var email       = $('#email').val();
        var contact     = $('#contact').val();
        var gender      = $('#gender').val();
        var username    = $('#username').val();
        var password    = $('#password').val();
        var type        = $('#type').val();
        
        $.ajax({
            type: 'POST',
            url : '../' + url,
            data : {
                action : 'Insert Users', lastname : lastname, firstname : firstname,
                middlename : middlename, email : email, contact : contact, 
                gender : gender, username : username, password : password, type : type
            },
            dataType : 'json',
            success:function(response) {
                if(type == 1) {
                    showadmin();
                    response.success == true ? btnadminenabled(response.message) : btnadminenabled(response.message)
                } else {
                    showprofessor();
                    response.success == true ? btnadminenabled(response.message) : btnadminenabled(response.message)
                }
            }
        })
    });
}

function insertstudents() {
    $('#create_students').click(function(e){
        e.preventDefault();
        btnstudentdisabled();
        var lastname    = $('#lastname').val();
        var firstname   = $('#firstname').val();
        var middlename  = $('#middlename').val();
        var email       = $('#email').val();
        var contact     = $('#contact').val();
        var gender      = $('#gender').val();
        var username    = $('#username').val();
        var section     = $('#section').val();
        var course      = $('#course').val();
        var type        = $('#type').val();
        
        $.ajax({
            type: 'POST',
            url : '../' + url,
            data : {
                action : 'Insert Students', lastname : lastname, firstname : firstname,
                middlename : middlename, email : email, contact : contact, 
                gender : gender, username : username, 
                type : type, section : section, course : course 
            },
            dataType : 'json',
            success:function(response) {
                showstudents();
                response.success == true ? btnstudentenabled(response.message) : btnstudentenabled(response.message)
            }
        })
    });
}

function showadmin() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Admin Table' },
        success:function(response){
            $('#showadmin').html(response);
        }
    })
}

function showprofessor() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Professor Table' },
        success:function(response){
            $('#showprofessor').html(response);
        }
    })
}

function modify_status($id) {
    var id = $id;  
    $.ajax({
      type : 'POST',
      url : '../../assets/functions/functions.php',
      data : { action : 'Modify Status', id : id },
      dataType: 'json',
      success:function(response) {
        if(response.success == true) {
          $('#show_status').html(response.message);
        }
      }
    })
  }

function show_request_administrators() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Request Administrators' },
        success:function(response){
            $('#show_request_administrators').html(response);
        }
    })
}

function show_request_professors() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Request Professors' },
        success:function(response){
            $('#show_request_professors').html(response);
        }
    })
}

function show_request_students() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Request Students' },
        success:function(response){
            $('#show_request_students').html(response);
        }
    })
}

function showstudents(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Students' },
        success:function(response){
            $('#show_students').html(response);
        }
    })
}

function showbranches() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Branches' },
        success:function(response){
            $('#show_branches').html(response);
        }
    })
}

function showcourses() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Courses' },
        success:function(response){
            $('#show_courses').html(response);
        }
    })
}

function add_branches() {
    $('#btn_branches').click(function(e){
        e.preventDefault();
        var branch = $('#branch').val();
        btnbranchesdisabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Add Branches', branch : branch },
            dataType: 'json',
            success:function(response){
                response.success == true ? btnbranchesenabled(response.message) : btnbranchesenabled(response.message)
            }
        })
    })
}


function update_branches() {
    $('#btn_update_branch').click(function(e){
        e.preventDefault();
        var id = $('#id').val();
        var branch = $('#update_branch').val();
        btnupdatebranchesdisabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Update Branches', branch : branch, id : id },
            dataType: 'json',
            success:function(response){
                response.success == true ? btnupdatebranchesenabled(response.message) : btnupdatebranchesenabled(response.message)
            }
        })
    })
}

function delete_branches() {
    $('#btn_delete_branch').click(function(e){
        e.preventDefault();
        var id = $('#id').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Delete Branches', id : id },
            dataType: 'json',
            success:function(response){
                response.success == true ? $('#modal_branches_update').modal('hide') : null;
                showbranches();
            }
        })
    })
}

function add_courses() {
    $('#btn_courses').click(function(e){
        e.preventDefault();
        var course = $('#course').val();
        var option = $('#option').val();
        btncoursesdisabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Add Courses', course : course, option : option },
            dataType: 'json',
            success:function(response){
                response.success == true ? btncoursesenabled(response.message) : btncoursesenabled(response.message)
            }
        })
    })
}

function update_courses() {
    $('#btn_update_course').click(function(e){
        e.preventDefault();
        var id = $('#id').val();
        var course = $('#update_course').val();
        var option = $('#update_option').val();
        btnupdatecoursesdisabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Update Courses', course : course, option : option, id : id },
            dataType: 'json',
            success:function(response){
                response.success == true ? btnupdatecoursesenabled(response.message) : btnupdatecoursesenabled(response.message)
            }
        })
    })
}

function delete_courses() {
    $('#btn_delete_course').click(function(e){
        e.preventDefault();
        var id = $('#id').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Delete Courses', id : id },
            dataType: 'json',
            success:function(response){
                response.success == true ? $('#modal_courses_update').modal('hide') : null;
                showcourses();
            }
        })
    })
}

add_courses();
update_courses();
delete_courses();

add_branches();
update_branches();
delete_branches();

login();
insertuser();
insertstudents();