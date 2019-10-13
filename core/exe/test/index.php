<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
?>
    <!DOCTYPE html>
    <html lang="en" class="app">

    <head>
        <meta charset="utf-8" />
        <title>User -
            <?php echo $username; ?>
        </title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="../../../dashboard/css/app.v1.css" type="text/css" />
        <link rel="stylesheet" href="../../../dashboard/js/calendar/bootstrap_calendar.css" type="text/css" />
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
    </head>

    <body class="">
        <section class="vbox">
            <?php require_once 'topbar.php'; ?>
                <section>
                    <section class="hbox stretch">
                        <!-- .aside -->
                        <?php require_once 'nav.php'; ?>
                            <!-- /.aside -->
                            <section id="content">
                                <section class="hbox stretch">
                                    <section>
                                        <section class="vbox">
                                            <div id="Dashboard" class="tabcontent">
                                                <section class="scrollable padder">
                                                    <section class="row m-b-md">
                                                        <div id="row1" class="col-sm-12">
                                                            <h3 class="m-b-xs text-black"><center> Dashboard </center></h3>
                                                        </div>
                                                    </section>

                                                    <div class="row">
                                                        <div id="row2" class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <section class="panel panel-default">
                                                                        <header class="panel-heading bg-light no-border">
                                                                            <div class="clearfix">
                                                                                <a class="pull-left thumb-md avatar b-3x m-r" href="#"></a>
                                                                                <div class="clear">
                                                                                    <h4 class="m-b-xs text-black"><center> Inbox details </center></h4>
                                                                                </div>
                                                                            </div>
                                                                        </header>
                                                                        <div class="list-group no-radius alt">
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success"> <?php $args=array('status'=>'0'); print_r (returnExists("messages", $args)); ?> </span>
                                                                                <i class="fas fa-envelope icon-muted"></i> Unread messages
                                                                            </a>
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success"><?php $args=array('status'=>'1'); print_r (returnExists("messages", $args)); ?></span>
                                                                                <i class="fas fa-envelope-open icon-muted"></i> Read messages
                                                                            </a>
                                                                        </div>
                                                                    </section>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <section class="panel panel-default">
                                                                        <header class="panel-heading bg-light no-border">
                                                                            <div class="clearfix">
                                                                                <a class="pull-left thumb-md avatar b-3x m-r" href="#"></a>
                                                                                <div class="clear">
                                                                                    <h4 class="m-b-xs text-black"><center> Outbox </center></h4>
                                                                                </div>
                                                                            </div>
                                                                        </header>
                                                                        <div class="list-group no-radius alt">

                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success">5</span>
                                                                                <i class="fas fa-envelope-square icon-muted"></i> Total Outbox
                                                                            </a>
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success">23</span>
                                                                                <i class="fas fa-reply icon-muted"></i> Replied messages (
                                                                                <?php echo date('M'); ?>)
                                                                            </a>
                                                                        </div>
                                                                    </section>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-top: 35px;">
                                                        <section class="col-sm-6 panel panel-default">
                                                            <header class="panel-heading font-bold">Inbox Chart</header>
                                                            <div class="panel-body">
                                                                <div id="flot-pie-donut" style="height:240px"></div>
                                                            </div>
                                                        </section>
                                                        <section class="col-sm-6 panel panel-default">
                                                            <header class="panel-heading font-bold">All Messages Chart</header>
                                                            <div class="panel-body">
                                                                <div id="all-flot-pie-donut" style="height:240px"></div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="Notassigned" class="tabcontent" style="padding-top: 5px;">
                                                <div id="unassigned" class="col-lg-12">
                                                    <section id="header2" class="panel panel-default">
                                                        <header class="panel-heading bg-light no-border">
                                                            <div class="clearfix">
                                                                <div class="clear">
                                                                    <h4 class="m-b-xs text-black"> <center> Unassigned </center> </h4>
                                                                </div>
                                                            </div>
                                                        </header>
                                                        <div id="row3" class="col-sm-2" style='background-color: #fff;'>
                                                            <?php
                                                                $unassigned_args = array('assignedUser'=>"0");
                                                                $unassigned_ids = getManyByValue("messages", "id",$unassigned_args);
                                                                if ($unassigned_ids=="No Data Found") {
                                                                    echo "No new messages";
                                                                } else {
                                                                    foreach ($unassigned_ids as $key => $id) {
                                                                    $newUnassigned_args = array('id'=>$id);
                                                                    $date = date_create(getByValue("messages", "date", $newUnassigned_args));
                                                                    $clientNumber = getByValue("messages", "phoneNumber", $newUnassigned_args);
                                                                    $message = getByValue("messages", "content", $newUnassigned_args);
                                                            ?>
                                                                <a class="messagelinks list-group-item" style='border: 0px solid #fff' href="#" onclick="openMessage(event, '<?php echo $id; ?>')">
                                                                    <b><?php echo $clientNumber; ?></b>
                                                                    <div class="center">
                                                                        <small>
                                                                            <?php 
                                                                                $wordCount = str_word_count($message);
                                                                                if ($wordCount <=2 ){ 
                                                                                    echo $message;
                                                                                    }
                                                                                else{ 
                                                                                    $shortMessage = preg_split("/ /", $message);
                                                                                    echo $shortMessage[0]." ".$shortMessage[1]."...";
                                                                                    } 
                                                                            ?>
                                                                        </small>
                                                                    </div>
                                                                </a>
                                                                <?php
                                                                }
                                                                    }
                                                                ?>
                                                        </div>
                                                        <div id="row4" class="col-sm-10" style='padding-left: 0px; padding-right: 0px;background-color: #efefef;'>
                                                            <?php 
                                                                $replyid = getAll("messages", "id");                                                                
                                                                foreach ($replyid as $key => $reply_message) {
                                                                    $reply_args = array('id'=>$reply_message);                                            
                                                                    $response_args = array('message_id'=>$reply_message);
                                                                    $in_date = date_create(getByValue("messages", "date", $reply_args));
                                                                    $in_clientNumber = getByValue("messages", "phoneNumber", $reply_args);
                                                                    $in_message = getByValue("messages", "content", $reply_args);
                                                                    $reply= getByValue("replies", "content", $response_args);
                                                                    $reply_date = date_create(getByValue("replies", "replied_on", $response_args));
                                                            ?>
                                                                <div id="message_<?php echo $reply_message; ?>" class="messagecontent">
                                                                    <div class="textbox pull-left">
                                                                        <p>
                                                                            <?php echo $in_message; ?><span class="time-right" style="padding-top: 25px"><?php echo date_format($in_date, "D h:ia");?></span>
                                                                        </p>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <div class="textbox reply pull-right">
                                                                        <p>
                                                                            <?php
                                                                                if (!empty($reply)){
                                                                                    echo $reply.'<span class="time-left" style="padding-top: 25px">';
                                                                                    echo date_format($reply_date, "D h:ia");
                                                                                    }
                                                                                ?>
                                                                                    </span>
                                                                        </p>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <div class="checkbox m-b">
                                                                        <p id="resp_<?php echo $reply_message; ?>"></p>
                                                                    </div>
                                                                    <br>
                                                                    <div id="UnassignedtxtArea" class="panel-footer col-sm-12">
                                                                        <div class="input-group col-sm-12">
                                                                            <input id="reply_<?php echo $reply_message; ?>" placeholder="Write your reply here..." type="text" spellcheck="true" class="form-control input-sm chat_input txtbox" />
                                                                            <button class="btn btn-primary btn-sm" id="btn-chat" onclick="replyFunction('reply_<?php echo $reply_message; ?>','resp_<?php echo $reply_message; ?>','<?php echo $in_clientNumber; ?>','<?php echo $reply_message; ?>')">Reply</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div id="Outbox" class="tabcontent" style="padding-top: 5px;">
                                                <div id="reply" class="col-lg-12">
                                                    <section id="header2" class="panel panel-default">
                                                        <header class="panel-heading bg-light no-border">
                                                            <div class="clearfix">
                                                                <div class="clear">
                                                                    <h4 class="m-b-xs text-black"> <center> Outbox </center></h4>
                                                                </div>
                                                            </div>
                                                        </header>
                                                        <div id="row5" class="col-sm-2" style='background-color: #fff;'>
                                                            <?php
                                                            $args = array('assignedUser'=>$userId);
                                                            $ids = getManyByValue("messages", "id",$args );
                                                            $activeNumbers = array_unique(getManyByValue("messages", "phoneNumber",$args ));
                                                            foreach ($activeNumbers as $key => $activeNumber) {
                                                                $newArgs = array('phoneNumber'=>$activeNumber);
                                                                $date = date_create(getByValue("messages", "date", $newArgs));
                                                                $clientNumber = $activeNumber;
                                                                $message = getByValue("messages", "content", $newArgs);
                                                        ?>
                                                                <a class="replylinks list-group-item" style='border: 0px solid #fff' href="#" onclick="openReply(event, '<?php echo $clientNumber; ?>')">
                                                                    <b><?php echo $clientNumber; ?></b>
                                                                    <div class="center">
                                                                        <small>
                                                        <?php 
                                                            $wordCount = str_word_count($message);
                                                            if ($wordCount <=2 ){ 
                                                                echo $message;
                                                                }
                                                            else{ 
                                                                $shortMessage = preg_split("/ /", $message);
                                                                echo $shortMessage[0]." ".$shortMessage[1]."...";
                                                                } 
                                                        ?>
                                                    </small>
                                                                    </div>
                                                                </a>
                                                                <?php
                                                }
                                            ?>
                                                        </div>
                                                        <div id="row6" class="col-sm-10" style='padding-left: 0px; padding-right: 0px;background-color: #efefef;'>
                                                            <?php
                                                                $userReplyargs = array('assignedUser'=>$userId);
                                                                $assignedNumbers = array_unique(getManyByValue("messages", "phoneNumber", $userReplyargs));
                                                                $log = implode(" ",$assignedNumbers);
                                                                $datelog = date("Y-m-d h:i:sa");
                                                                file_put_contents("../../../error.log","\n[INFO] ".$datelog.$log,FILE_APPEND);
                                                                foreach ($assignedNumbers as $key => $clientNumber) {
                                                                    echo '<div id="rply'.$clientNumber.'" class="replycontent">';
                                                                    $messageReplyargs = array("phoneNumber"=>$clientNumber);
                                                                    $allMessageId = getManyByValue("messages", "id", $messageReplyargs);
                                                                    foreach ($allMessageId as $key => $inboxId) {
                                                                        $inboxArgs = array('id' => $inboxId);
                                                                        $repliesArgs = array('message_id' => $inboxId);
                                                                        $date = date_create(getByValue("messages", "date", $inboxArgs));
                                                                        $receivedMessage = getByValue("messages", "content", $inboxArgs);;
                                                                        $replies = getManyByValue("replies", "content", $repliesArgs);
                                                                        $reply_date = date_create(getByValue("replies", "replied_on", $repliesArgs));
                                                                        $clientNumber = getByValue("replies","phoneNumber",$repliesArgs);
                                                                        echo '<div class="textbox pull-left">';
                                                                        echo '<p>'.$receivedMessage.'<span class="time-right" style="padding-top: 25px">'.date_format($date, "D h:ia").'</span></p></div><br><br><br><br>';
                                                                        
                                                                        if ($replies=="No Data Found"){
                                                                            echo '<div class="textbox reply pull-right">';                                                                        
                                                                            echo '</div><br><br><br>';                                                                           
                                                                            } 
                                                                        else{
                                                                            foreach ($replies as $key => $reply) {
                                                                                echo '<div class="textbox reply pull-right">';
                                                                                echo '<p>'.$reply;
                                                                                echo '<span class="time-left" style="padding-top: 25px">'.date_format($reply_date, "D h:ia").'</span>';
                                                                                echo '</p></div><br><br><br>';
                                                                            }                                                                            
                                                                            }
                                                                            

                                                                    }
                                                                        echo '<div class="checkbox m-b">';
                                                                        echo '<p id="rsp'.$clientNumber.'"></p>';
                                                                        echo '</div>';
                                                                        echo '<br><div class="panel-footer col-sm-12">';
                                                                        echo '<div class="input-group col-sm-12">';
                                                                        echo '<input id="inboxreply'.$clientNumber.'" placeholder="Write your reply here..." type="text" spellcheck="true" class="form-control input-sm chat_input txtbox" />';
                                                                                                                            
                                                                ?>
                                                                            <button class="btn btn-primary btn-sm" id="btn-chat" onclick="replyFunction('inboxreply<?php echo $clientNumber; ?>','rsp<?php echo $clientNumber; ?>','<?php echo $clientNumber; ?>','<?php echo $inboxId; ?>')">Reply</button>                                                               
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </section>
                                    </section>

                                </section>
                                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                            </section>
                    </section>
                </section>
        </section>
        <div id="userModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit User Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $username; ?>" id="e_username">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $userNumber;?>" id="e_userNumber">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $useremail;?>" id="e_email">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="password" id="adminpassword">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox m-b" style="padding:20px;">
                        <p id="adlsresp"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="editAdmin" class="btn btn-primary btn-lg">Save</button>
                        <button type="button" id="autoclose" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bootstrap -->
        <!-- App -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            $('#row4').height($(window).height() - $('#header2').height() - $('#header').height() - $('#header').height());
            $('#row3').height($(window).height() - $('#header2').height() - $('#header').height() - $('#header').height());
            $('#row5').height($(window).height() - $('#header2').height() - $('#header').height() - $('#header').height());
            $('#row6').height($(window).height() - $('#header2').height() - $('#header').height() - $('#header').height());
        </script>
        <script src="../../../dashboard/js/app.v1.js"></script>
        <script src="../../../dashboard/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../../../dashboard/js/charts/sparkline/jquery.sparkline.min.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.min.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.spline.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.pie.min.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.resize.js"></script>
        <script src="../../../dashboard/js/charts/flot/jquery.flot.grow.js"></script>
        <script src="../../../dashboard/js/charts/flot/demo.js"></script>
        <script src="../../../dashboard/js/calendar/bootstrap_calendar.js"></script>
        <script src="../../../dashboard/js/calendar/demo.js"></script>
        <script src="../../../dashboard/js/sortable/jquery.sortable.js"></script>
        <script src="../../../dashboard/js/app.plugin.js"></script>
        <script src="../../../dashboard/js/main.js"></script>
        <script src="../../../dashboard/js/tabs.js"></script>
    </body>

    </html>