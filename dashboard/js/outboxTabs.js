var i, replycontent, replylinks, replyID; //class=messagelinks list-group-item
replycontent = document.getElementsByClassName("replycontent");
for (i = 0; i < replycontent.length; i++) {
    replycontent[i].style.display = "none";
}

function openReply(clickAction, phoneNumber, feedBack) {
    chatNo = phoneNumber;
    replylinks = document.getElementsByClassName("replylinks list-group-item");
    for (i = 0; i < replylinks.length; i++) {
        replylinks[i].className = replylinks[i].className.replace(" active", "");
    }
    replyID = "rply" + phoneNumber;
    document.getElementById(replyID).style.display = "block";
    document.getElementById("closeChat").style.display = "block";
    document.getElementById(feedBack).style.display = "none";
    clickAction.currentTarget.className += " active";
}

function closeChat() {
    $.ajax({
        data: 'number=' + chatNo,
        url: "../close/",
        method: "POST",
        success: function(closeFeedback) {
            var closeFeedback = closeFeedback.trim();
            if (closeFeedback == "1") {
                alert("chat Closed");
                console.log(closeFeedback);
            } else {
                alert(closeFeedback);
                console.log(closeFeedback);
            }
        }
    });
}