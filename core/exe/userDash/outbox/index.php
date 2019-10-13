<!DOCTYPE html>
<html lang="en" class="app">
<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
                <section class="hbox stretch">
                    <!-- .aside -->
                    <?php require_once 'nav.php'; ?>
                        <!-- /.aside -->
                        <section id="content">
                            <section class="hbox stretch">
                                <section class="vbox">                                    
                                    <div id="Outbox" class="tabcontent" style="padding-top: 5px;">
                                        <div id="reply"style="width: 100%;">
                                            <section class="panel panel-default">
                                                <div id="headerOutbox" style="height: 70px;">
                                                    <header id="headerOutbox1" class="panel-heading bg-light pull-left" style="border-right: 1px solid #eaeaea;width: 40%;height: 70px;">
                                                        <div class="clearfix">
                                                            <div class="clear">
                                                                <h4 class="m-b-xs text-black"> <center> All Messages </center></h4>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <header id="headerOutbox2" class="panel-heading bg-light pull-right" style='width: 60%;background-color: #f9fafc;height: 70px;'>
                                                        <div class="clearfix">
                                                            <div class="clear">
                                                                <span id="closeChat" class="pull-right" style="display:none;"><button id="archive" type="button" class="btn btn-link text-black" onclick="closeChat()" style='font-size:24px'>Close <i class='fas fa-comment-slash'></i></button></span>
                                                            </div>
                                                        </div>
                                                    </header>
                                                </div>
                                                <div id="row5" style='background-color: #fff;padding: 0;width: 40%;border-right: 1px solid #eaeaea;'>
                                                    <?php
                                                        $args = array('assignedUser'=>$userId);
                                                        $assignedToMe = array_unique(getManyByValue("messages", "phoneNumber",$args ));
                                                        if ($assignedToMe =="No Data Found") {
                                                            echo "No messages in the inbox";
                                                        } else {
                                                            $activeNumbers = $assignedToMe;
                                                            foreach ($activeNumbers as $key => $activeNumber) {
                                                                $newArgs = array('phoneNumber'=>$activeNumber);
                                                                $date = date_create(getByValue("messages", "date", $newArgs));
                                                                $clientNumber = $activeNumber;
                                                                $message = getByValue("messages", "content", $newArgs);
                                                    ?>
                                                        <a class="replylinks list-group-item" style='border: 0px solid #fff' href="#" onclick="openReply(event, '<?php echo $clientNumber; ?>','feedback<?php echo $clientNumber;?>')">
                                                            <b><?php echo $clientNumber; ?></b><span id="<?php echo $clientNumber; ?>" class="badge bg-success chat_alert"> <p id="alert_<?php echo $clientNumber; ?>"></p></span>
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
                                                <div id="row6" style='padding-left: 0px; padding-right: 0px;background-color: #efefef;width: 60%;'>
                                                    <?php
                                                        $userReplyargs = array('assignedUser'=>$userId);
                                                        $assignedNumbers = array_unique(getManyByValue("messages", "phoneNumber", $userReplyargs));
                                                        $datelog = date("Y-m-d h:i:sa");
                                                        foreach ($assignedNumbers as $key => $phoneNumber) {
                                                            echo '<div id="rply'.$phoneNumber.'" class="replycontent">';
                                                            $messageReplyargs = array("phoneNumber"=>$phoneNumber);
                                                            $allMessageId = getManyByValue("messages", "id", $messageReplyargs);
                                                            foreach ($allMessageId as $key => $inboxId) {
                                                                $inboxArgs = array('id' => $inboxId);
                                                                $repliesArgs = array('message_id' => $inboxId);
                                                                $allReplyIds = getManyByValue("replies", "id",$repliesArgs);
                                                                $date = date_create(getByValue("messages", "date", $inboxArgs));
                                                                $receivedMessage = getByValue("messages", "content", $inboxArgs);
                                                                echo '<div class="pull-left" style="width: 100%;">';
                                                                echo '<div class="textbox pull-left" style="width: auto;">';
                                                                echo '<p>'.$receivedMessage.'<span class="time-right" style="padding-top: 25px">'.date_format($date, "D h:ia").'</span></p></div></div><br><br><br><br>';
                                                                
                                                                if ($allReplyIds =="No Data Found"){                                                                                                                                                  
                                                                    echo '<br>';                                                                           
                                                                    } 
                                                                else{
                                                                    foreach ($allReplyIds as $key => $replyId) {
                                                                        $replyIdArgs = array('id' => $replyId);
                                                                        $reply = getByValue("replies", "content", $replyIdArgs);
                                                                        $reply_date = date_create(getByValue("replies", "replied_on", $replyIdArgs));
                                                                        echo '<div class="pull-left" style="width: 100%;">';
                                                                        echo '<div class="textbox reply pull-right" style="width: auto;">';
                                                                        echo '<p class="pull-right">'.$reply;
                                                                        echo '</p><span class="time-left" style="padding-top: 25px">'.date_format($reply_date, "D h:ia").'</span>';
                                                                        echo '</div></div><br><br><br><br>';
                                                                    }                                                                            
                                                                    }
                                                                    
                                                            }
                                                                echo '<div class="pull-right" style="width: 100%;">';
                                                                echo '<div id="feedback'.$phoneNumber.'" class="textbox reply pull-right" style="width: auto;"><p id="p_'.$phoneNumber.'" class="pull-right">';
                                                                echo '</p><span class="time-left" style="padding-top: 25px">'.date("D h:ia").'</span>';
                                                                echo '</div></div><br><br><br><br>';
                                                                echo '<div class="checkbox m-b">';
                                                                echo '<p id="resp'.$inboxId.'"></p>';
                                                                echo '</div>';
                                                                echo '<br><div class="panel-footer" style=" width: 100%;">';
                                                                echo '<div class="input-group" style="width: 100%;background-color: #f5f5f5;">';
                                                                echo '<form id="form'.$phoneNumber.'"><textarea id="input'.$phoneNumber.'" placeholder="Write your reply here..." type="text" spellcheck="true" class="form-control input-sm chat_input" style="width: 100%;height:100px;"></textarea>';
                                                                                                                    
                                                        ?>
                                                                        <button class="btn btn-primary btn-lg pull-right" onclick="replyFunction('resp<?php echo $inboxId; ?>','<?php echo $phoneNumber; ?>','<?php echo $inboxId; ?>','feedback<?php echo $phoneNumber; ?>','p_<?php echo $phoneNumber; ?>','form<?php echo $phoneNumber; ?>','input<?php echo $phoneNumber;?>')">Reply</button>                                                               
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
                </section>
        </section>
        <!-- Bootstrap -->
        <!-- App -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="../../../../dashboard/js/app.v1.js"></script>
        <script>
            $('#row3').height($(window).height() - $('#headerUnassigned').height() - $('#header').height() - $('#headerUnassigned').height());
            $('#row4').height($(window).height() - $('#headerUnassigned').height() - $('#header').height() - $('#headerUnassigned').height());
            $('#row5').height($(window).height() - $('#headerOutbox1').height() - $('#header').height() - $('#headerOutbox1').height());
            $('#row6').height($('#row5').height());
        </script>
        <script src="../../../../dashboard/js/notification.js"></script>
        <script src="../../../../dashboard/js/main.js"></script>
        <script src="../../../../dashboard/js/outboxTabs.js"></script>
        <script src="../../../../dashboard/js/closeChat.js"></script>
        <!--responsible for the welcome message -->
        <!-- <script src="../../../dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script> -->
    </body>

</html>