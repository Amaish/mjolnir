if (typeof(EventSource) !== "undefined") {
    var numbers, chatId, values, unassigned, source = new EventSource("notification.php");
    unassigned = document.getElementsByClassName("badge bg-success unassigned_alert");
    outbox = document.getElementsByClassName("badge bg-success outbox_alert");
    chatbox = document.getElementsByClassName("badge bg-success chat_alert");
    for (i = 0; i < chatbox.length; i++) {
        chatbox[i].style.display = "none";
    }
    source.onmessage = function(event) {
        values = JSON.parse(event.data);
        numbers = values["unread"].split(',');
        numbers.forEach(displayFunction);


        function displayFunction(item) {
            chatId = item.trim();
            if (chatId.length != 0) {
                document.getElementById(chatId).style.display = "block";
                document.getElementById("alert_" + chatId).innerHTML = "New";
            }
        }
        if (values["unassigned"] == 0 && values["inbox"] == 0) {
            unassigned[0].style.display = "none";
            outbox[0].style.display = "none";
        } else if (values["unassigned"] != 0 && values["inbox"] == 0) {
            unassigned[0].style.display = "active";
            document.getElementById("unassigned_alert").innerHTML = values["unassigned"];
            outbox[0].style.display = "none";
        } else if (values["unassigned"] == 0 && values["inbox"] != 0) {

            outbox[0].style.display = "active";
            document.getElementById("outbox_alert").innerHTML = values["inbox"];
            unassigned[0].style.display = "none";
        } else {
            unassigned[0].style.display = "active";
            outbox[0].style.display = "active";
            document.getElementById("outbox_alert").innerHTML = values["inbox"];
            document.getElementById("unassigned_alert").innerHTML = values["unassigned"];
        }
    };

}