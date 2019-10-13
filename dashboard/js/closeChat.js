function openTab(tabAction, actionName) {
    var i, tabcontent, tablinks, messagecontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    messagecontent = document.getElementsByClassName("messagecontent");
    for (i = 0; i < messagecontent.length; i++) {
        messagecontent[i].style.display = "none";
    }
    replycontent = document.getElementsByClassName("replycontent");
    for (i = 0; i < replycontent.length; i++) {
        replycontent[i].style.display = "none";
    }
    document.getElementById(actionName).style.display = "block";
    tabAction.currentTarget.className += " active";
}