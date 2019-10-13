$(document).ready(function($) {

    // start of login admin
    $('#loginadmin').click(function() {
        $('#loginadmin').html('Logging In...');
        $('#loginadmin').css("disabled", "1");


        var adminPhoneNumber = $('#adminPhoneNumber').val();
        var adminpassword = $('#adminpassword').val();

        $.post("core/exe/loginAdmin/", {

            adminPhoneNumber: adminPhoneNumber,
            adminpassword: adminpassword

        }, function(LoginFeedback) {
            var LoginFeedback = LoginFeedback.trim();
            if (LoginFeedback == "1") {
                $('#admlsresp').html('<font color="green">Logged in...</font>');
                window.location.href = "core/exe/adminDash/";
                $('#loginadmin').html('Login');
                $('#loginadmin').css("disabled", "0");
                console.log(LoginFeedback);
            } else {
                $('#admlsresp').html('<font color="red">' + LoginFeedback + '</font>');
                $('#loginadmin').html('Login');
                $('#loginadmin').css("disabled", "0");
                console.log(LoginFeedback);
            }
        });
    });

    // end of admin login
    //start of user login
    $('#loginuser').click(function() {
        $('#loginuser').html('Logging In...');
        $('#loginuser').css("disabled", "1");


        var userPhoneNumber = $('#userPhoneNumber').val();
        var userpassword = $('#userpassword').val();

        $.post("core/exe/loginUser/", {

            userPhoneNumber: userPhoneNumber,
            userpassword: userpassword

        }, function(LoginFeedback) {
            var LoginFeedback = LoginFeedback.trim();
            if (LoginFeedback == "1") {
                $('#usrlsresp').html('<font color="green">Logged in...</font>');
                window.location.href = "core/exe/userDash/Unassigned";
                $('#loginuser').html('Login');
                $('#loginuser').css("disabled", "0");
                console.log(LoginFeedback);
            } else {
                $('#usrlsresp').html('<font color="red">' + LoginFeedback + '</font>');
                $('#loginuser').html('Login');
                $('#loginuser').css("disabled", "0");
                console.log(LoginFeedback);
            }
        });
    });
    //end of user login

});

function editStatus(element) {
    var row = element.closest('tr').rowIndex;
    var userID = document.getElementById("status").rows[row].cells[0].innerHTML;
    var statusID = "userStatus_" + userID;
    var userStatus = document.getElementById(statusID);
    if (userStatus.innerHTML === "Active") {
        userStatus.innerHTML = "Inactive";
    } else {
        userStatus.innerHTML = "Active";
    }
    $.ajax({
        data: 'editedStatus=' + userStatus.innerHTML + '&' + 'userID=' + userID,
        url: "../editStatus/",
        method: "POST",
        success: function(statusFeedback) {
            var statusFeedback = statusFeedback.trim();
            if (statusFeedback == "Active") {
                $('#statuslsresp').html('<font color="green">' + statusFeedback + '</font>');
                console.log(statusFeedback);
            } else {
                $('#statuslsresp').html('<font color="red">' + statusFeedback + '</font>');
                console.log(statusFeedback);
            }
        }
    });
}

function replyFunction(respns, number, messageId, feedBack, parID, formID, inputId) {
    var feedBack, parID, formID, reply, replyresp = '#' + respns;
    reply = document.getElementById(inputId).value;
    document.getElementById(feedBack).style.display = "block";
    document.getElementById(parID).innerHTML = reply;
    document.getElementById(formID).reset();
    $.ajax({
        data: 'reply=' + reply + '&' + 'number=' + number + '&' + 'messageId=' + messageId,
        url: "../reply/",
        method: "POST",
        success: function(replyFeedback) {
            var replyFeedback = replyFeedback.trim();
            if (replyFeedback == "1") {
                $(replyresp).html('<font color="green"> Message sent </font>');
                console.log(replyFeedback);
            } else {
                $(replyresp).html('<font color="red">' + replyFeedback + '</font>');
                console.log(replyFeedback);
            }
        }
    });
}