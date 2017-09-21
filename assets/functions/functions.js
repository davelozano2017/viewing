var url = '../assets/functions/functions.php';
var test = '../assets/functions/test.php';
//Sign In button
function btnsinindisabled() {
    $('#signin').html('Please Wait').attr('disabled',true);
}

function btnsigninenabled(bgcolor,color,message) {
    $('#signin').html('Sign In').attr('disabled',false);
    notify(bgcolor,color,message)
}

function btn_admin_disabled() {
    $('#create_administrator').html('Please Wait').attr('disabled',true);
}

function btn_admin_enabled(bgcolor,color,message) {
    $('#create_administrator').html('Create').attr('disabled',false);
    notify(bgcolor,color,message);
}

function btn_student_disabled() {
    $('#create_students').html('Please Wait').attr('disabled',true);
}

function btn_student_enabled(bgcolor,color,message) {
    $('#create_students').html('Create').attr('disabled',false);
    notify(bgcolor,color,message);
    showstudents();
}

function btnbranchesdisabled() {
    $('#btn_branches').html('Please Wait').attr('disabled',true);
}

function btnbranchesenabled(bgcolor,color,message) {
    $('#btn_branches').html('Add').attr('disabled',false);
    showbranches();
    notify(bgcolor,color,message);
}

function btn_courses_disabled() {
    $('#btn_courses').html('Please Wait').attr('disabled',true);
}

function btn_courses_enabled(bgcolor,color,message) {
    $('#btn_courses').html('Add').attr('disabled',false);
    showcourses();
    notify(bgcolor,color,message);
}

function btn_update_courses_disabled() {
    $('#btn_update_course').html('Please Wait').attr('disabled',true);
}

function btn_update_courses_enabled(bgcolor,color,message) {
    $('#btn_update_course').html('Update').attr('disabled',false);
    showcourses();
    notify(bgcolor,color,message);
}

function btnupdatebranchesdisabled() {
    $('#btn_update_branch').html('Please Wait').attr('disabled',true);
}

function btnupdatebranchesenabled(bgcolor,color,message) {
    $('#btn_update_branch').html('Update').attr('disabled',false);
    showbranches();
    notify(bgcolor,color,message);
}

function btnprofessorcourseenabled(bgcolor,color,message) {
    $('#btn_professor_course').html('Add').attr('disabled', false);
    notify(bgcolor,color,message);
    showprofessorcourse();
}

function btnprofessorcoursedisabled() {
    $('#btn_professor_course').html('Please Wait.').attr('disabled',true);
}

function btnprofessorupdatecourseenabled(bgcolor,color,message) {
    $('#btn_professor_update_course').html('Update').attr('disabled', false);
    showprofessorcourse();
    notify(bgcolor,color,message);
}

function btnprofessorupdatecoursedisabled() {
    $('#btn_professor_update_course').html('Please Wait.').attr('disabled',true);
}

function btn_section_enabled(bgcolor,color,message) {
    notify(bgcolor,color,message);
    $('#btn_add_section').html('Add').attr('disabled', false);
    showsections();
}

function btn_section_disabled() {
    $('#btn_add_section').html('Please Wait.').attr('disabled',true);
}

function btn_update_section_enabled(bgcolor,color,message) {
    $('#btn_update_section').html('Update').attr('disabled', false);
    showsections();
    notify(bgcolor,color,message)
}

function btn_update_section_disabled() {
    $('#btn_update_section').html('Please Wait.').attr('disabled',true);
}

function btnprofessorprofileenabled(bgcolor,color,message) {
    notify(bgcolor,color,message);
    $('#profile_update').html('Save Changes').attr('disabled', false);
}

function btnprofessorprofiledisabled() {
    $('#profile_update').html('Please Wait').attr('disabled',true);
}

function btnrequestenabled(bgcolor,color,message) {
    notify(bgcolor,color,message)
    $('#request').html('Send').attr('disabled', false);
}

function btnrequestdisabled() {
    $('#request').html('Please Wait').attr('disabled',true);
}

function btneditstudentdisabled() {
    $('#edit_students').html('Please Wait').attr('disabled',true);
}
function btneditstudentenabled(bgcolor,color,message) {
    $('#edit_students').html('Update').attr('disabled',false);
    notify(bgcolor,color,message);
    showstudents();
}

function btn_add_subjects_enabled(bgcolor,color,message) {
    $('#add_subjects').html('Add').attr('disabled',false);
    notify(bgcolor,color,message);
    showsubjects();
}

function btn_add_subjects_disabled() {
    $('#add_subjects').html('Please Wait').attr('disabled',true);
}

function btn_update_subjects_enabled(bgcolor,color,message) {
    $('#update_subject').html('Update').attr('disabled',false);
    notify(bgcolor,color,message);
    showsubjects();
}

function btn_update_subjects_disabled() {
    $('#update_subject').html('Please Wait').attr('disabled',true);
}

function btn_upload_file_disabled() {
    $('#uploadfile').html('Please Wait').attr('disabled',true);
}

function btn_upload_file_enabled(bgcolor,color,message) {
    notify(bgcolor,color,message);
    $('#uploadfile').html('Upload').attr('disabled',false);
}

function btnaddschoolyearenabled(bgcolor,color,message) {
    $('#btnaddschoolyear').html('Add').attr('disabled',false);
    showschoolyear();
    notify(bgcolor,color,message);
}

function btnaddschoolyeardisabled() {
    $('#btnaddschoolyear').html('Please Wait').attr('disabled',true);
}

function btn_add_student_disabled(id) {
    $('#add'+id).html('Please Wait.');
}

function btn_add_students_enabled_1(id,bgcolor,color,message) {
    $('#add'+id).html('Add Student').addClass('btn-primary').removeClass('btn-danger');
    notify(bgcolor,color,message);
}
function btn_add_students_enabled_2(id,bgcolor,color,message) {
    $('#add'+id).html('Remove Student').addClass('btn-danger').removeClass('btn-primary');
    notify(bgcolor,color,message);
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
                response.success == true ? location.href = response.location : btnsigninenabled(response.bgcolor,response.color,response.message)
            }
        })
    })
}

//Add Administrator & Professor 
function insertuser() {
    $('#create_administrator').click(function(e){
        e.preventDefault();
        btn_admin_disabled();
        var lastname    = $('#lastname').val();
        var firstname   = $('#firstname').val();
        var middlename  = $('#middlename').val();
        var email       = $('#email').val();
        var contact     = $('#contact').val();
        var gender      = $('#gender').val();
        var username    = $('#username').val();
        var branch      = $('#branch').val();
        var type        = $('#type').val();
        
        $.ajax({
            type: 'POST',
            url : '../' + url,
            data : {
                action : 'Insert Users', lastname : lastname, firstname : firstname,
                middlename : middlename, email : email, contact : contact, 
                gender : gender, username : username, type : type, branch : branch
            },
            dataType : 'json',
            success:function(response) {
                if(type == 1) {
                    showadmin();
                    response.success == true ? btn_admin_enabled(response.bgcolor,response.color,response.message) : btn_admin_enabled(response.bgcolor,response.color,response.message);
                } else {
                    showprofessor();
                    response.success == true ? btn_admin_enabled(response.bgcolor,response.color,response.message) : btn_admin_enabled(response.bgcolor,response.color,response.message);
                }
            }
        })
    });
}

function insertstudents() {
    $('#create_students').click(function(e){
        e.preventDefault();
        btn_student_disabled();
        var lastname    = $('#lastname').val();
        var firstname   = $('#firstname').val();
        var middlename  = $('#middlename').val();
        var email       = $('#email').val();
        var contact     = $('#contact').val();
        var gender      = $('#gender').val();
        var branch      = $('#branch').val();
        var username    = $('#username').val();
        var subject     = $('#subject').val();
        var section     = $('#section').val();
        var course      = $('#course').val();
        var type        = $('#type').val();
        var sy          = $('#sy').val();

        $.ajax({
            type: 'POST',
            url : '../' + url,
            data : {
                action : 'Insert Students', lastname : lastname, firstname : firstname,
                middlename : middlename, email : email, contact : contact, gender : gender, 
                branch : branch, type : type, subject : subject, section : section, 
                course : course,username : username, sy : sy 
            },
            dataType : 'json',
            success:function(response) {
                response.success == true ? btn_student_enabled(response.bgcolor,response.color,response.message) : btn_student_enabled(response.bgcolor,response.color,response.message)
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

// function showstudentsreports() {
//     $.ajax({
//         type : 'POST',
//         url : '../' + url,
//         data : { action : 'Show Students Search' },
//         dataType: 'json',
//         success:function(response){
//             $('#show_students').html(response);
//         }
//     })
// }

function show_student_report_by_professor(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Students Report By Professor' },
        success:function(response){
            $('#show_reports_by_professor').html(response);
        }
    })
}

function show_student_report_by_admin(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Students Report' },
        success:function(response){
            $('#show_reports').html(response);
        }
    })
}

function show_professor_report_by_admin(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Professors Report' },
        success:function(response){
            $('#show_professor_report_by_admin').html(response);
        }
    })
}

function show_admin_report_by_super_admin(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Professors Report By Super Admin' },
        success:function(response){
            $('#show_admin_report_by_super_admin').html(response);
        }
    })
}


function search_by_professor() {
    $('#search_branch').change(function(e){
        e.preventDefault();
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report By Professor', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports_by_professor').html(response);
            }
        });
    });

    $('#search_course').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report By Professor', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports_by_professor').html(response);
            }
        });
    });

    $('#search_subject').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report By Professor', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports_by_professor').html(response);
            }
        });
    });

    $('#search_section').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report By Professor', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports_by_professor').html(response);
            }
        });
    });
}

function search_by_admin() {
    $('#search_branch').change(function(e){
        e.preventDefault();
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports').html(response);
            }
        });
    });

    $('#search_course').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports').html(response);
            }
        });
    });

    $('#search_subject').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports').html(response);
            }
        });
    });

    $('#search_section').change(function(e){
        var branch = $('#search_branch').val();
        var course = $('#search_course').val();
        var subject = $('#search_subject').val();
        var section = $('#search_section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Report', branch : branch, course : course, subject: subject, section : section},
            success:function(response) {
                $('#show_reports').html(response);
            }
        });
    });
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

function autofill() {
    $('#search_student').keyup(function(e){
        e.preventDefault();
        var username = $('#search_student').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Show Autofill', username : username },
            dataType: 'json',
            success:function(response){
                $('#addstudents').find('#lastname').val(response.lastname);
                $('#addstudents').find('#firstname').val(response.firstname);
                $('#addstudents').find('#middlename').val(response.middlename);
                $('#addstudents').find('#email').val(response.email);
                $('#addstudents').find('#contact').val(response.contact);
                $('#addstudents').find('#gender').val(response.gender);
                $('#addstudents').find('#username').val(response.username);
                $('#addstudents').find('#course').val(response.course);
                $('#create_students').attr('disabled',false);
            },error(){
                $('#addstudents').find('#lastname').val('');
                $('#addstudents').find('#firstname').val('');
                $('#addstudents').find('#middlename').val('');
                $('#addstudents').find('#email').val('');
                $('#addstudents').find('#contact').val('');
                $('#addstudents').find('#gender').val('Male');
                $('#addstudents').find('#username').val('');
                $('#addstudents').find('#course').val('Computer Science');
                $('#create_students').attr('disabled',true);
            }
        })
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

function show_all_students() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show All Students' },
        success:function(response){
            $('#show_all_students').html(response);
        }
    }) 
}


function showgrades(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Grades' },
        success:function(response){
            $('#show_grades').html(response);
        }
    })
}

function show_grades_by_branch() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Grades By Branch' },
        success:function(response){
            $('#show_grades_by_branch').html(response);
        }
    })
}

function showschoolyear(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show School Year' },
        success:function(response){
            $('#show_school_year').html(response);
        }
    })
}



function showsubjects(){
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Subjects' },
        success:function(response){
            $('#show_subjects').html(response);
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
                response.success == true ? btnbranchesenabled(response.bgcolor,response.colo,response.message) : btnbranchesenabled(response.bgcolor,response.colo,response.message)
            }
        })
    })
}


function update_branches() {
    $('#btn_update_branch').click(function(e){
        e.preventDefault();
        var id = $('#branch_id').val();
        var branch = $('#update_branch').val();
        btnupdatebranchesdisabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Update Branches', branch : branch, id : id },
            dataType: 'json',
            success:function(response){
                response.success == true ? btnupdatebranchesenabled(response.bgcolor,response.color,response.message) : btnupdatebranchesenabled(response.bgcolor,response.color,response.message)
            }
        })
    })
}

function delete_branches() {
    $('#btn_delete_branch').click(function(e){
        e.preventDefault();
        var id = $('#branch_id').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Delete Branches', id : id },
            dataType: 'json',
            success:function(response){
                response.success == false ? $('#modal_branches_update').modal('hide') : null;
                showbranches();
            }
        })
    })
}

// admin courses begin 
function add_courses() {
    $('#btn_courses').click(function(e){
        e.preventDefault();
        var course = $('#course').val();
        var option = $('#option').val();
        btn_courses_disabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Add Courses', course : course, option : option },
            dataType: 'json',
            success:function(response){
                response.success == true ? btn_courses_enabled(response.bgcolor,response.color,response.message) : btn_courses_enabled(response.bgcolor,response.color,response.message)
            }
        })
    })
}

function update_courses() {
    $('#btn_update_course').click(function(e){
        e.preventDefault();
        var courses_id     = $('#courses_id').val();
        var courses_update = $('#courses_update').val();
        var options_update = $('#options_update').val();
        btn_update_courses_disabled();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Update Courses', courses_update : courses_update, options_update : options_update,courses_id : courses_id },
            dataType: 'json',
            success:function(response){
                response.success == true ? btn_update_courses_enabled(response.bgcolor,response.color,response.message) : btn_update_courses_enabled(response.bgcolor,response.color,response.message)
            }
        })
    })
}

function delete_courses() {
    $('#btn_delete_course').click(function(e){
        e.preventDefault();
        var courses_id = $('#courses_id').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Delete Courses', courses_id : courses_id },
            dataType: 'json',
            success:function(response){
                response.success == false ? $('#modal_courses_update').modal('hide') : null;
                showcourses();
            }
        })
    })
}

// admin courses end 

// executions ng sections sa administrator start  

function add_sections() {
    $('#btn_add_section').click(function(e){
        e.preventDefault();
        var section     = $('#section').val();
        var section_id  = $('#section_id').val();
        btn_section_disabled();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Add Sections', section : section },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btn_section_enabled(response.bgcolor,response.color,response.message) : btn_section_enabled(response.bgcolor,response.color,response.message);
            }
        })
    })
}

function update_sections() {
    $('#btn_update_section').click(function(e){
        e.preventDefault();
        btn_update_section_disabled();
        var section_id     = $('#section_id').val();
        var section_update = $('#section_update').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Update Sections', section_id : section_id, section_update : section_update },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btn_update_section_enabled(response.bgcolor,response.color,response.message) : btn_update_section_enabled(response.bgcolor,response.color,response.message);
            }
        });
    })
}

function delete_sections() {
    $('#btn_delete_section').click(function(e){
        e.preventDefault();
        var section_id = $('#section_id').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Delete Sections', section_id : section_id },
            dataType: 'json',
            success:function(response) {
                response.success == false ? $('#update_modal_section').modal('hide') : null;
                showsections();
            }
        });
    })
}

function showsections() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Sections' },
        success:function(response){
            $('#show_sections').html(response);
        }
    })
}

// executions ng sections sa administrator end  


function professor_profile() {
    $('#profile_update').click(function(e){
        e.preventDefault();
        var update_id = $('#update_id').val();
        var password  = $('#password').val();
        btnprofessorprofiledisabled();
        $.ajax({
            type: 'POST',
            url: '../' + url,
            data: {
                action: 'Professor Profile', update_id : update_id, password : password
            },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnprofessorprofileenabled(response.bgcolor,response.color,response.message) : btnprofessorprofileenabled(response.bgcolor,response.color,response.message)
            }
        })
    })
}

function request() {
    $('#request').click(function(e){
        e.preventDefault();
        btnrequestdisabled();
        var email = $('#email').val();
        $.ajax({
            type: 'POST',
            url : url,
            data: { action : 'Request', email : email },
            dataType: 'json',
            success:function(response){
                response.success == true ? btnrequestenabled(response.bgcolor,response.color,response.message) :  btnrequestenabled(response.bgcolor,response.color,response.message)
            }
        });
    })
}

function execute_request(id) {
    $('#executerequest'+id).attr('disabled',true);
    $.ajax({
        type : 'POST',
        url : '../' +url,
        data: { action : 'Execute Request', id : id },
        dataType: 'json',
        success:function(response) {
            notify(response.bgcolor,response.color,response.message);
            show_request_administrators();
            show_request_professors();
            show_request_students();
        }
    })
}

// admin subjects execution begin
function add_subjects() {
    $(document).ready(function(){
        $('#add_subjects').click(function(e){
            e.preventDefault();
            var sub_course   = $('#sub_course').val();
            var sub_subject  = $('#sub_subject').val();
            var sub_section  = $('#sub_section').val();
            btn_add_subjects_disabled();
            $.ajax({
                type : 'POST',
                url : '../'+url,
                data: {
                    action: 'Add Subjects', sub_course : sub_course, sub_subject : sub_subject, sub_section : sub_section
                },
                dataType: 'json',
                success:function(response){
                    response.success == true ? btn_add_subjects_enabled(response.bgcolor,response.color,response.message) : btn_add_subjects_enabled(response.bgcolor,response.color,response.message);
                }
            })

        })
    });
}

function delete_subjects() {
    $(document).ready(function(){
        $('#delete_subject').click(function(e){
            e.preventDefault();
            var update_sub_id = $('#update_sub_id').val();
            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: { action : 'Delete Subjects', update_sub_id : update_sub_id },
                dataType: 'json',
                success:function(response) {
                    response.success == false ? $('#update_modal_subjects').modal('hide') : null;
                    showsubjects();
                }
            });
        });
    });
}

function update_subjects() {
    $(document).ready(function(){
        $('#update_subject').click(function(e){
            e.preventDefault();
            btn_update_subjects_disabled();
            var update_sub_id      = $('#update_sub_id').val();
            var update_sub_course  = $('#update_sub_course').val();
            var update_sub_section = $('#update_sub_section').val();
            var update_sub_subject = $('#update_sub_subject').val();
            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: { action : 'Update Subjects', update_sub_id : update_sub_id, update_sub_course : update_sub_course, update_sub_section : update_sub_section, update_sub_subject : update_sub_subject },
                dataType: 'json',
                success:function(response) {
                    response.success == true ? btn_update_subjects_enabled(response.bgcolor,response.color,response.message) : btn_update_subjects_enabled(response.bgcolor,response.color,response.message);
                }
            });
        });
    });
}
// admin subjects executions end

function updatestudent() {

    $(document).ready(function(){
        $('#edit_students').click(function(e){
            e.preventDefault();
            btneditstudentdisabled();
            var accountid  = $('#accountid').val();
            var studentid  = $('#studentid').val();
            var lastname   = $('#elastname').val();
            var firstname  = $('#efirstname').val();
            var middlename = $('#emiddlename').val();
            var email      = $('#eemail').val();
            var contact    = $('#econtact').val();
            var gender     = $('#egender').val();
            var username   = $('#eusername').val();
            var subject    = $('#esubject').val();
            var branch     = $('#ebranch').val();
            var section    = $('#esection').val();
            var course     = $('#ecourse').val();
            var esy        = $('#esy').val();
            
            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: {
                    action : 'Update Student', lastname : lastname, firstname : firstname, middlename : middlename,
                    email : email, contact : contact, gender : gender, username : username, branch : branch,
                    subject : subject, section : section, course : course, accountid : accountid, 
                    studentid : studentid, esy : esy
                },
                dataType: 'json',
                success:function(response) {
                    response.success == true ? btneditstudentenabled(response.bgcolor,response.color,response.message) : btneditstudentenabled(response.bgcolor,response.color,response.message);
                }
            }) 

        })
    });

    

    
}

function deletestudent() {
    $('#delete_students').click(function(e){
        e.preventDefault();
        var accountid = $('#accountid').val();
        var studentid = $('#studentid').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data : { action : 'Delete Student', accountid : accountid, studentid : studentid },
            dataType: 'json',
            success:function(response){
                response.success == true ? $('#editstudent').modal('hide') : null
                showstudents();
            }
        });
    })
}


function uploadgrades(){
    $('#uploadfile').click(function(e){
        e.preventDefault();
        btn_upload_file_disabled()
        var formData = new FormData($("#FormUpload")[0]);
        var branch  = $('#branch').val();
        var course  = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy      = $('#sy').val();
        var professor_id = $('#professor_id').val();
        formData.append('branch', branch);
        formData.append('course', course);
        formData.append('section', section);
        formData.append('subject', subject);
        formData.append('sy', sy);
        formData.append('files', $("#FormUpload")[0]);
        formData.append('professor_id', professor_id);
        $.ajax({
            type : 'POST',
            url : '../' + test,
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,  
            dataType: 'json',
            mimeType: "multipart/form-data",
            success:function(response) {
                response.success == true ? btn_upload_file_enabled(response.bgcolor,response.color,response.message) : btn_upload_file_enabled(response.bgcolor,response.color,response.message)
            }
        });
    });
}

function add_student($student_id,$professor_id) {
    var student_id = $student_id;
    var professor_id = $professor_id;
    btn_add_student_disabled(student_id);
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data: { action : 'Add Professor Student', student_id : student_id, professor_id : professor_id },
        dataType: 'json',
        success:function(response) {
            if(response.message == 'Successfully Removed.'){
                btn_add_students_enabled_1(student_id,response.bgcolor,response.color,response.message);
            } else {
                btn_add_students_enabled_2(student_id,response.bgcolor,response.color,response.message);
            }
        }
        
    });
}

function uploadgradesvalidation() {
    $('#branch').change(function(e){
        e.preventDefault();

        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy = $('#sy').val();
        
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject,  sy : sy
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
            }
            
        });
    });

    $('#course').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject, sy : sy
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
            }
        });
    });
    $('#section').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject, sy : sy
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
            }
        });
    });
    $('#subject').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject, sy : sy
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
            }
        });
    });

    $('#sy').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var sy = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject, sy : sy
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
            }
        });
    });
}


function showstudentgrades() {
    $('#branch').change(function(e){
        e.preventDefault();
        var username = $('#username').val();
        var branch  = $('#branch').val();
        var subject = $('#subject').val();
        var section = $('#section').val();
        var sy      = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Student Grades', username : username, branch : branch, 
                subject : subject, section : section, sy : sy
            },
            success:function(response) {
                $('#showstudentgrades').html(response);
            }
            
        });
    });
    $('#sy').change(function(e){
        var username = $('#username').val();
        var branch   = $('#branch').val();
        var subject  = $('#subject').val();
        var section  = $('#section').val();
        var sy       = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Student Grades', username : username, branch : branch, 
                sy : sy, section : section, subject : subject
            },
            success:function(response) {
                $('#showstudentgrades').html(response);
            }
        });
    });

    $('#section').change(function(e){
        var username = $('#username').val();
        var branch   = $('#branch').val();
        var subject  = $('#subject').val();
        var section  = $('#section').val();
        var sy       = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Student Grades', username : username, branch : branch, 
                sy : sy, section : section, subject : subject
            },
            success:function(response) {
                $('#showstudentgrades').html(response);
            }
        });
    });

    $('#subject').change(function(e){
        var username = $('#username').val();
        var branch   = $('#branch').val();
        var subject  = $('#subject').val();
        var section  = $('#section').val();
        var sy       = $('#sy').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Student Grades', username : username, branch : branch, 
                sy : sy, section : section, subject : subject
            },
            success:function(response) {
                $('#showstudentgrades').html(response);
            }
        });
    });
}
function notify(bgcolor,color,message) {
    $.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: bgcolor,color: color,message: message },
        'position'  : 'top right', 'outEffect' : 'slideBottom'
    });
}

function removeuploadedgrades(code) {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data: { action : 'Delete Uploaded Grades', code : code },
        dataType: 'json',
        success:function(response) {
            response.success == true ? showgrades() : null;
            notify(response.bgcolor,response.color,response.message);
        }
    })
}

function approveuploadedgrades(code) {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data: { action : 'Approve Uploaded Grades', code : code },
        dataType: 'json',
        success:function(response) {
            response.success == true ? showgrades() : null;
            notify(response.bgcolor,response.color,response.message);
        }
    })
}

function remove_uploaded_grades(code) {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data: { action : 'Delete Uploaded Grades', code : code },
        dataType: 'json',
        success:function(response) {
            response.success == true ? show_grades_by_branch() : null;
            notify(response.bgcolor,response.color,response.message);
        }
    })
}

function approve_uploaded_grades(code) {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data: { action : 'Approve Uploaded Grades', code : code },
        dataType: 'json',
        success:function(response) {
            response.success == true ? show_grades_by_branch() : null;
            notify(response.bgcolor,response.color,response.message);
        }
    })
}

function addschoolyear() {
    $('#btnaddschoolyear').click(function(e){
        e.preventDefault();
        var sy = $('#sy').val();
        btnaddschoolyeardisabled();
        $.ajax({
            type: 'POST',
            url : '../' + url,
            data: { action : 'Add School Year', sy : sy},
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnaddschoolyearenabled(response.bgcolor,response.color,response.message) : btnaddschoolyearenabled(response.bgcolor,response.color,response.message);
            }
        })
    })
}
function addschoolyearmodal() {
    $('#addschoolyear').click(function(e){
        $('#modalschoolyear').modal('show');
    })
}

add_branches();
update_branches();
delete_branches();

login();


professor_profile();