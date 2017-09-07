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

function btnadmindisabled() {
    $('#create_administrator').html('Please Wait').attr('disabled',true);
}

function btnadminenabled(bgcolor,color,message) {
    $('#create_administrator').html('Create').attr('disabled',false);
    notify(bgcolor,color,message);
}

function btnstudentdisabled() {
    $('#create_students').html('Please Wait').attr('disabled',true);
}

function btnstudentenabled(bgcolor,color,message) {
    $('#create_students').html('Create').attr('disabled',false);
    notify(bgcolor,color,message);
    showstudents();
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

function btnprofessorsectionenabled(bgcolor,color,message) {
    notify(bgcolor,color,message);
    $('#btn_professor_section').html('Add').attr('disabled', false);
    showprofessorsection();
}

function btnprofessorsectiondisabled() {
    $('#btn_professor_section').html('Please Wait.').attr('disabled',true);
}

function btnprofessorupdatesectionenabled(bgcolor,color,message) {
    $('#btn_professor_update_section').html('Update').attr('disabled', false);
    showprofessorsection();
    notify(bgcolor,color,message)
}

function btnprofessorupdatesectiondisabled() {
    $('#btn_professor_update_section').html('Please Wait.').attr('disabled',true);
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

function btncreatesubjectenabled(bgcolor,color,message) {
    $('#create_subject').html('Create').attr('disabled',false);
    notify(bgcolor,color,message);
    showsubjects();
}

function btncreatesubjectdisabled() {
    $('#create_subject').html('Please Wait').attr('disabled',true);
}

function btnupdatesubjectenabled(bgcolor,color,message) {
    $('#update_subject').html('Update').attr('disabled',false);
    notify(bgcolor,color,message);
    showsubjects();
}

function btnupdatesubjectdisabled() {
    $('#update_subject').html('Please Wait').attr('disabled',true);
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
                    response.success == true ? btnadminenabled(response.bgcolor,response.color,response.message) : btnadminenabled(response.bgcolor,response.color,response.message);
                } else {
                    showprofessor();
                    response.success == true ? btnadminenabled(response.bgcolor,response.color,response.message) : btnadminenabled(response.bgcolor,response.color,response.message);
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
        var branch      = $('#branch').val();
        var username    = $('#username').val();
        var subject     = $('#subject').val();
        var section     = $('#section').val();
        var course      = $('#course').val();
        var type        = $('#type').val();
        var id          = $('#professor_id').val();
        
        $.ajax({
            type: 'POST',
            url : '../' + url,
            data : {
                action : 'Insert Students', lastname : lastname, firstname : firstname,
                middlename : middlename, email : email, contact : contact, 
                gender : gender, branch : branch, professor_id : id, type : type, 
                subject : subject, section : section, course : course,username : username 
            },
            dataType : 'json',
            success:function(response) {
                response.success == true ? btnstudentenabled(response.bgcolor,response.color,response.message) : btnstudentenabled(response.bgcolor,response.color,response.message)
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

function showstudentsreports() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Students Reports' },
        success:function(response){
            dataType: 'json',
            $('#showstudentsreports').html(response);
        }
    })
}

function search() {
    $('#branch').change(function(e){
        e.preventDefault();
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Reports', branch : branch, course : course, section : section},
            success:function(response) {
                $('#showstudentsreports').html(response);
            }
        });
    });
    $('#course').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Reports', branch : branch, course : course, section : section},
            success:function(response) {
                $('#showstudentsreports').html(response);
            }
        });
    });
    $('#section').change(function(e){
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { action : 'Show Students Reports', branch : branch, course : course, section : section},
            success:function(response) {
                $('#showstudentsreports').html(response);
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
                response.success == true ? btnbranchesenabled(response.message) : btnbranchesenabled(response.message)
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
                response.success == true ? btnupdatebranchesenabled(response.message) : btnupdatebranchesenabled(response.message)
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
        var id = $('#course_id').val();
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
        var id = $('#course_id').val();
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

function showprofessorcourse() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Professor Courses' },
        success:function(response){
            $('#show_professor_courses').html(response);
        }
    })
}

function add_professor_course() {
    $('#btn_professor_course').click(function(e){
        e.preventDefault();
        var professor_course = $('#professor_course').val();
        var professor_id     = $('#professor_id').val();
        btnprofessorcoursedisabled();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Add Professor Courses', professor_course : professor_course, professor_id : professor_id },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnprofessorcourseenabled(response.bgcolor,response.color,response.message) : btnprofessorcourseenabled(response.bgcolor,response.color,response.message);
            }
        })
    })
}

function update_professor_course() {
    $('#btn_professor_update_course').click(function(e){
        e.preventDefault();
        btnprofessorupdatecoursedisabled();
        var update_id     = $('#update_id').val();
        var professor_course = $('#professor_update_course').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Update Professor Courses', update_id : update_id, professor_course : professor_course },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnprofessorupdatecourseenabled(response.bgcolor,response.color,response.message) : btnprofessorupdatecourseenabled(response.bgcolor,response.color,response.message);
            }
        });
    })
}

function delete_professor_course() {
    $('#btn_professor_delete_course').click(function(e){
        e.preventDefault();
        var update_id     = $('#update_id').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Delete Professor Courses', update_id : update_id },
            dataType: 'json',
            success:function(response) {
                response.success == false ? $('#update_professor_course').modal('hide') : null;
                showprofessorcourse();
            }
        });
    })
}

function add_professor_section() {
    $('#btn_professor_section').click(function(e){
        e.preventDefault();
        var section = $('#section').val();
        var professor_id          = $('#professor_id').val();
        btnprofessorsectiondisabled();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Add Professor Section', section : section, professor_id : professor_id },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnprofessorsectionenabled(response.bgcolor,response.color,response.message) : btnprofessorsectionenabled(response.bgcolor,response.color,response.message);
            }
        })
    })
}

function update_professor_section() {
    $('#btn_professor_update_section').click(function(e){
        e.preventDefault();
        btnprofessorupdatesectiondisabled();
        var hiddenid    = $('#hiddenid').val();
        var prof_section = $('#prof_section').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Update Professor Section', hiddenid : hiddenid, prof_section : prof_section },
            dataType: 'json',
            success:function(response) {
                response.success == true ? btnprofessorupdatesectionenabled(response.bgcolor,response.color,response.message) : btnprofessorupdatesectionenabled(response.bgcolor,response.color,response.message);
            }
        });
    })
}

function delete_professor_section() {
    $('#btn_professor_delete_section').click(function(e){
        e.preventDefault();
        var hiddenid     = $('#hiddenid').val();
        $.ajax({
            type : 'POST',
            url  : '../' + url,
            data : { action : 'Delete Professor Section', hiddenid : hiddenid },
            dataType: 'json',
            success:function(response) {
                response.success == false ? $('#update_professor_section').modal('hide') : null;
                showprofessorsection();
            }
        });
    })
}
function showprofessorsection() {
    $.ajax({
        type : 'POST',
        url : '../' + url,
        data : { action : 'Show Professor Section' },
        success:function(response){
            $('#show_professor_section').html(response);
        }
    })
}

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

function addsubjects() {
    $(document).ready(function(){
        $('#create_subject').click(function(e){
            e.preventDefault();
            var course  = $('#course').val();
            var subject = $('#subject').val();
            var section  = $('#section').val();
            var professor_id = $('#professor_id').val();
            btncreatesubjectdisabled();
            $.ajax({
                type : 'POST',
                url : '../'+url,
                data: {
                    action: 'Add Subjects', course : course, subject : subject, professor_id : professor_id, section : section
                },
                dataType: 'json',
                success:function(response){
                    response.success == true ? btncreatesubjectenabled(response.bgcolor,response.color,response.message) : btncreatesubjectenabled(response.bgcolor,response.color,response.message);
                }
            })

        })
    });
}

function deletesubjects() {
    $(document).ready(function(){
        $('#delete_subject').click(function(e){
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: { action : 'Delete Subjects', id : id },
                dataType: 'json',
                success:function(response) {
                    response.success == false ? $('#editsubject').modal('hide') : null;
                    showsubjects();
                }
            });
        });
    });
}

function updatesubjects() {
    $(document).ready(function(){
        $('#update_subject').click(function(e){
            e.preventDefault();
            btnupdatesubjectdisabled();
            var id = $('#id').val();
            var course = $('#scourse').val();
            var section = $('#ssection').val();
            var subject = $('#ssubject').val();
            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: { action : 'Update Subjects', id : id, course : course, section : section, subject : subject },
                dataType: 'json',
                success:function(response) {
                    response.success == true ? btnupdatesubjectenabled(response.bgcolor,response.color,response.message) : btnupdatesubjectenabled(response.bgcolor,response.color,response.message);
                }
            });
        });
    });
}

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

            $.ajax({
                type : 'POST',
                url : '../' + url,
                data: {
                    action : 'Update Student', lastname : lastname, firstname : firstname, middlename : middlename,
                    email : email, contact : contact, gender : gender, username : username, branch : branch,
                    subject : subject, section : section, course : course, accountid : accountid, studentid : studentid
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
        var formData = new FormData($("#FormUpload")[0]);
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        var professor_id = $('#professor_id').val();
        formData.append('branch', branch);
        formData.append('course', course);
        formData.append('section', section);
        formData.append('subject', subject);
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
                $('#showuploadgrades').html(response.message);
            }
        });
    });
}

function uploadgradesvalidation() {
    $('#branch').change(function(e){
        e.preventDefault();
        var branch = $('#branch').val();
        var course = $('#course').val();
        var section = $('#section').val();
        var subject = $('#subject').val();
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject
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
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject
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
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject
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
        $.ajax({
            type : 'POST',
            url : '../' + url,
            data: { 
                action : 'Show Upload Grades', branch : branch, course : course, 
                section : section, subject : subject
            },
            success:function(response) {
                $('#showuploadgrades').html(response);
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

add_courses();
update_courses();
delete_courses();

add_branches();
update_branches();
delete_branches();

login();
insertuser();
insertstudents();

add_professor_course();
update_professor_course();
delete_professor_course();

add_professor_section();
update_professor_section();
delete_professor_section();

professor_profile();