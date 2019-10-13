<!DOCTYPE html>
<html lang="en" class="app">
    <?php
    include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
    ?>
    <head>
        <meta charset="utf-8" >
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" >
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
        <title>User -
            <?php echo $username; ?>
        </title>
        <link rel="stylesheet" href="../../../../dashboard/css/app.v1.css" type="text/css">
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
                                            <div id="Notassigned" class="tabcontent" style="padding-top: 5px;">
                                                <div id="unassigned" style="width: 100%;">
                                                    <section id="headerUnassigned" class="panel panel-default">
                                                        <header class="panel-heading bg-light no-border">
                                                            <div class="clearfix">
                                                                <div class="clear">
                                                                    <h4 class="m-b-xs text-black"> <center> Unassigned </center> </h4>
                                                                </div>
                                                            </div>
                                                        </header>
                                                        <div id="row3" style='background-color: #fff; padding: 0; width: 40%;'>
                                                            <?php
                                                                $unassigned_args = array('assignedUser'=>"0");
                                                                $unassigned_ids = getManyByValue("messages", "id",$unassigned_args);
                                                                if ($unassigned_ids=="No Data Found") {
                                                                    echo "No new messages";
                                                                } else {
                                                                    foreach ($unassigned_ids as $key => $id) {
                                                                    $newUnassigned_args = array('id'=>$id);
                                                                    $status = getByValue("messages", "status", $newUnassigned_args);
                                                                    if($status==0){
                                                                    $date = date_create(getByValue("messages", "date", $newUnassigned_args));
                                                                    $clientNumber = getByValue("messages", "phoneNumber", $newUnassigned_args);
                                                                    $message = getByValue("messages", "content", $newUnassigned_args);
                                                            ?>
                                                                <a class="messagelinks list-group-item" style='border: 0px solid #fff' href="#" onclick="openMessage(event, '<?php echo $id; ?>','feedback<?php echo $id; ?>')">
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
                                                                        }
                                                                ?>
                                                        </div>
                                                        <div id="row4" style='padding-left: 0; padding-right: 0px;background-color: #efefef;width: 60%;'>
                                                            <?php 
                                                                $unassignedIdArgs = array('assignedUser' =>0);
                                                                $replyid = getManyByValue("messages", "id",$unassignedIdArgs);              
                                                                foreach ($replyid as $key => $reply_message) {
                                                                    $reply_args = array('id'=>$reply_message);                                            
                                                                    $response_args = array('message_id'=>$reply_message);
                                                                    $in_date = date_create(getByValue("messages", "date", $reply_args));
                                                                    $linkID = getByValue("messages", "linkId", $reply_args);
                                                                    $in_clientNumber = getByValue("messages", "phoneNumber", $reply_args);
                                                                    $in_message = getByValue("messages", "content", $reply_args);
                                                                    $reply= getByValue("replies", "content", $response_args);
                                                                    $reply_date = date_create(getByValue("replies", "replied_on", $response_args));
                                                            ?>
                                                                <div id="message_<?php echo $reply_message; ?>" class="messagecontent">
                                                                    <div class="textbox pull-left" style="width: 50%;">
                                                                        <p>
                                                                            <?php echo $in_message; ?><span class="time-right" style="padding-top: 25px"><?php echo date_format($in_date, "D h:ia");?></span>
                                                                        </p>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <div class="textbox reply pull-right" style="width: 50%;">
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
                                                                    <br>
                                                                    <div id="feedback<?php echo $reply_message; ?>" class="textbox reply pull-right" style="width: 50%;">
                                                                        <p id="p_<?php echo $reply_message; ?>" class="pull-right"></p>
                                                                        <span class="time-left" style="padding-top: 25px"><?php echo date("D h:ia"); ?></span>
                                                                    </div>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <div class="checkbox m-b">
                                                                        <p id="resp_<?php echo $reply_message; ?>"></p>
                                                                    </div>
                                                                    <br>
                                                                    <div id="UnassignedtxtArea" class="panel-footer" style="width: 100%;">
                                                                        <div class="input-group"style="width: 100%;">
                                                                            <form id="form<?php echo $reply_message; ?>">
                                                                                <textarea id="input<?php echo $reply_message; ?>" placeholder="Write your reply here..." type="text" spellcheck="true" class="form-control input-sm chat_input" style="width: 100%;height:100px;"></textarea>
                                                                                <button class="btn btn-primary btn-lg pull-right" onclick="replyFunction('resp_<?php echo $reply_message; ?>','<?php echo $in_clientNumber; ?>','<?php echo $reply_message; ?>','feedback<?php echo $reply_message; ?>','p_<?php echo $reply_message; ?>','form<?php echo $reply_message; ?>','input<?php echo $reply_message; ?>')">Reply</button>
                                                                            </form>
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="../../../../dashboard/js/app.v1.js"></script>
        <script src="../../../../dashboard/js/unassignedTabs.js"></script>
        <script>
            $('#row3').height($(window).height() - $('#headerUnassigned').height() - $('#header').height()- $('#headerUnassigned').height());
            $('#row4').height($(window).height() - $('#headerUnassigned').height() - $('#header').height()- $('#headerUnassigned').height());            
            $('#row5').height($(window).height() - $('#headerOutbox1').height() - $('#header').height()- $('#headerOutbox1').height());
            $('#row6').height($('#row5').height());    
        </script>
        <script src="../../../../dashboard/js/notification.js"></script>
        <script src="../../../../dashboard/js/main.js"></script>
        <!--responsible for the welcome message -->
        <!-- <script src="../../../../dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script> -->
    </body>
</html>