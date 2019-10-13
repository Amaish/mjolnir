<!DOCTYPE html>
<html lang="en" class="app">
    <?php
    include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
    ?>
    <head>
        <meta charset="utf-8">
        <title>User -
            <?php echo $username; ?>
        </title>
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="../../../dashboard/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="../../../dashboard/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../../../dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="../../../dashboard/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../dashboard/js/calendar/bootstrap_calendar.css" type="text/css" />
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../../../dashboard/css/app.min.1.css" rel="stylesheet">
        <link href="../../../dashboard/css/app.min.2.css" rel="stylesheet">  
    </head>
    <body class=""style="overflow: auto;">
            
    <section>
        <div class="container">
            <div class="row">
                <pre>
                <?php
                    echo "<h1> Inbox Data </h1>";
                    print_r(array_keys($inboxData));
                    echo "<br>".$inboxData[array_keys($inboxData)[0]];
                    echo "<h1> Outbox Data </h1>";
                    print_r(array_keys($outboxData));
                    echo "<br>".$outboxData[array_keys($outboxData)[0]];
                ?>
                </pre>                                    
            </div>
        </div>
    </section>
    <script type="text/javascript" src="../../../dashboard/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../../dashboard/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../../dashboard/js/bootstrap2.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../../dashboard/js/mdb.min.js"></script>
    </body>
</html>