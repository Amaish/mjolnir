var i, messagecontent, messagelinks, Id; //class=messagelinks list-group-item
messagecontent = document.getElementsByClassName("messagecontent");
for (i = 0; i < messagecontent.length; i++) {
    messagecontent[i].style.display = "none";
}

function openMessage(clickAction, messageId, feedBack) {
    Id = "message_" + messageId;
    messagelinks = document.getElementsByClassName("messagelinks list-group-item");
    for (i = 0; i < messagelinks.length; i++) {
        messagelinks[i].className = messagelinks[i].className.replace(" active", "");
    }
    document.getElementById(Id).style.display = "block";
    document.getElementById(feedBack).style.display = "none";
    clickAction.currentTarget.className += " active";
}