var url = '../assets/functions/functions.php';
//Sign In button
function btnsinindisabled() {
    $('#signin').html('Please Wait').attr('disabled',true);
}

function btnsigninenabled() {
    $('#signin').html('Sign In').attr('disabled',false);
}

//ADd ADmin Button 
function btnadmindisabled() {
    $('#create_administrator').html('Please Wait').attr('disabled',true);
}

function btnadminenabled(message) {
    $('#create_administrator').html('Create').attr('disabled',false);
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

//Add Administrator 
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

login();
insertuser();