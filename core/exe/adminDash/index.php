<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
?>
    <!DOCTYPE html>
    <html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Admin -
            <?php echo $adminname; ?>
        </title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="../../../dashboard/css/app.v1.css" type="text/css" />
        <link rel="stylesheet" href="../../../dashboard/css/styletwo.css" type="text/css" />
        <link rel="stylesheet" href="../../../dashboard/js/calendar/bootstrap_calendar.css" type="text/css" />
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        
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
                                                        <div class="col-sm-6 ">
                                                            <h3 class="m-b-xs text-black">Admin Dashboard</h3>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h2><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-s-md btn-success pull-right btn-rounded"> <i class="fa fa-plus-square pull-left"></i> Add Users</a></h2>
                                                        </div>
                                                    </section>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <section class="panel panel-default">
                                                                        <header class="panel-heading bg-light no-border">
                                                                            <div class="clearfix">
                                                                                <a class="pull-left thumb-md avatar b-3x m-r" href="#"></a>
                                                                                <div class="clear">
                                                                                    <h4 class="m-b-xs text-black">Message details</h4>
                                                                                </div>
                                                                            </div>
                                                                        </header>
                                                                        <div class="list-group no-radius alt">

                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success"><?php print_r (sizeof(getAll("messages", "id"))); ?></span>
                                                                                <i class="fas fa-envelope-square icon-muted"></i> Total messages
                                                                            </a>
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success"> <?php $args=array('status'=>'1'); print_r (returnExists("messages", $args)); ?> </span>
                                                                                <i class="fas fa-envelope-open icon-muted"></i> Read messages
                                                                            </a>
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-success"><?php $args=array('status'=>'2'); print_r (returnExists("messages", $args)); ?></span>
                                                                                <i class="fas fa-reply icon-muted"></i> Replied messages
                                                                            </a>
                                                                            <a class="list-group-item" href="#">
                                                                                <span class="badge bg-danger"><?php $args=array('status'=>'0'); print_r (returnExists("messages", $args)); ?></span>
                                                                                <i class="fas fa-envelope icon-muted"></i> Unread messages (
                                                                                <?php echo date('M'); ?>)
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
                                                                                    <h4 class="m-b-xs text-black">User details</h4>
                                                                                </div>
                                                                            </div>
                                                                        </header>
                                                                        <div class="list-group no-radius alt">

                                                                            <a class="list-group-item">
                                                                                <span class="badge bg-success"><?php print_r (sizeof(getAll("users", "id"))); ?></span>
                                                                                <i class="fa fa-users icon-muted"></i> Total Users
                                                                            </a>
                                                                            <a class="list-group-item">
                                                                                <span class="badge bg-success"> <?php $args=array('status'=>'1'); print_r (returnExists("users", $args)); ?></span>
                                                                                <i class="fas fa-user-alt icon-muted"></i> Active Users
                                                                            </a>
                                                                            <a class="list-group-item">
                                                                                <span class="badge bg-danger"><?php $args=array('status'=>'0'); print_r (returnExists("users", $args)); ?></span>
                                                                                <i class="fas fa-user-alt-slash icon-muted"></i> Deactivated users
                                                                            </a>
                                                                            <a class="list-group-item" href="#" data-toggle="modal" data-target="#statusModal" class="auto">
                                                                                <i class="fas fa-cogs icon-muted"></i> Edit Users status
                                                                            </a>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <h3 class="m-b-xs text-black">Analytics</h3> <small>Statistics & graph information</small>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
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
                                                        </div>

                                                    </div>

                                                </section>
                                            </div>
                                            <div id="Inbox" class="tabcontent"> Inbox</div>
                                            <div id="Outbox" class="tabcontent"> Outbox</div>
                                            <div id="Analytics" class="tabcontent">
                                                <div class="row center" style ="margin-top: 0px;">
                                                    <h3 class="m-b-xs text-black">Analytics</h3> <small>Statistics & graph information</small>                                    
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <section class="col-sm-6 panel panel-default">
                                                        <header class="panel-heading font-bold">Inbox Chart</header>
                                                        <div class="panel-body">
                                                            <div id="flot-pie-donut" style="height:240px">The chart</div>
                                                        </div>
                                                    </section>
                                                    <section class="col-sm-6 panel panel-default">
                                                        <header class="panel-heading font-bold">All Messages Chart</header>
                                                        <div class="panel-body">
                                                            <div id="all-flot-pie-donut" style="height:240px">The chart</div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="row">
                                                    <section class="panel panel-default">
                                                    <header class="panel-heading font-bold">Monthly Graph (<?php echo date('M'); ?>)</header>
                                                        <div class="panel-body">
                                                        <div id="bar-graph" style="height:240px"> The graph</div>
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

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="User's Name" id="new_name">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="User's Number (0712XXX)" id="new_number">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="password" placeholder="password" id="new_password">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox m-b" style="padding:20px;">
                        <p id="addUserlsresp"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="addUser" class="btn btn-primary btn-lg">Save</button>
                        <button type="button" id="autoclose" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="addAdminModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Admin</h4>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="Admin's Name" id="add_Adminname">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="Admin's Number (0712XXX)" id="add_Adminnumber">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="password" placeholder="password" id="add_Adminpassword">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox m-b" style="padding:20px;">
                        <p id="addAdminlsresp"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="addAdmin" class="btn btn-primary btn-lg">Save</button>
                        <button type="button" id="autoclose" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="adminModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Admin Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $adminname; ?>" id="new_adminname">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $adminNumber; ?>" id="new_adminNumber">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="text" placeholder="<?php echo $adminemail; ?>" id="new_adminemail">
                            </div>
                            <div class="list-group-item">
                                <input class="form-control no-border" type="password" placeholder="password" id="new_adminpassword">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox m-b" style="padding:20px;">
                        <p id="editlsresp"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="editAdmin" class="btn btn-primary btn-lg">Save</button>
                        <button type="button" id="autoclose" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="statusModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit User Status</h4>
                    </div>
                    <div class="modal-body">
                    <table id="status">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Edit Status</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <?php
                            $ids = getAll("users", "id");
                            foreach ($ids as $key => $each_user) {
                                $args = array('id'=>$each_user);
                                $date = date_create(getByValue("users", "created_on", $args));
                                $adminArgs = array('id'=>getByValue("users", "created_by", $args));
                            ?>
                            <tr>
                                <td><?php echo $each_user;?></td>
                                <td><?php echo getByValue("users", "username", $args);?></td>
                                <td><?php echo getByValue("admins", "username", $adminArgs);?></td>
                                <td><?php echo date_format($date,"d-M-Y");?></td>
                                <td>
                                    <div id= "userStatus_<?php echo $each_user;?>">
                                        <?php 
                                        if (getByValue("users", "status", $args)==1){
                                            $status = "Active";
                                            echo $status;
                                        }else{
                                            $status = "Inactive";
                                            echo $status;
                                        }?>
                                    </div>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round" onclick="editStatus(this)"></span>
                                    </label>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap -->
        <!-- App -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script >
            $(document).ready(function($){
                $('#editAdmin').click(function() {
                    $('#editAdmin').html('Saving');
                    $('#editAdmin').css("disabled", "1");
                    var new_adminname = $('#new_adminname').val();
                    var new_adminNumber = $('#new_adminNumber').val();
                    var new_adminemail = $('#new_adminemail').val();
                    var new_adminpassword = $('#new_adminpassword').val();
                    $.post("../editAdmin/", {

                        new_adminname: new_adminname,
                        new_adminNumber: new_adminNumber,
                        new_adminemail: new_adminemail,
                        new_adminpassword: new_adminpassword

                    }, function(EditFeedback) {
                        var EditFeedback = EditFeedback.trim();
                        if (EditFeedback == "1") {
                            $('#editlsresp').html('<font color="green">Success...</font>');
                            location.reload();
                        }else {
                            $('#editlsresp').html('<font color="red">' + EditFeedback + '</font>');
                            $('#editAdmin').html('Save');
                            $('#editAdmin').css("disabled", "0");
                            console.log(EditFeedback);
                        }
                        });
                });
                $('#addAdmin').click(function() {
                    $('#addAdmin').html('Saving');
                    $('#addAdmin').css("disabled", "1");
                    var add_Adminname = $('#add_Adminname').val();
                    var add_Adminnumber = $('#add_Adminnumber').val();
                    var add_Adminpassword = $('#add_Adminpassword').val();
                    
                    $.post("../addAdmin/", {

                        add_Adminname: add_Adminname,
                        add_Adminnumber: add_Adminnumber,
                        add_Adminpassword: add_Adminpassword

                    }, function(AddAdminFeedback) {
                        var AddAdminFeedback = AddAdminFeedback.trim();
                        if (AddAdminFeedback == "1") {
                            $('#addAdminlsresp').html('<font color="green">Success...</font>');
                            location.reload();
                        }else {
                            $('#addAdminlsresp').html('<font color="red">' + AddAdminFeedback + '</font>');
                            $('#addAdmin').html('Save');
                            $('#addAdmin').css("disabled", "0");
                            console.log(AddAdminFeedback);
                        }
                        });
                });
                $('#addUser').click(function() {
                    $('#addUser').html('Saving');
                    $('#addUser').css("disabled", "1");
                    var new_name = $('#new_name').val();
                    var new_number = $('#new_number').val();
                    var new_password = $('#new_password').val();
                    
                    $.post("../addUser/", {

                        new_name: new_name,
                        new_number: new_number,
                        new_password: new_password

                    }, function(AddUserFeedback) {
                        var AddUserFeedback = AddUserFeedback.trim();
                        if (AddUserFeedback == "1") {
                            $('#addUserlsresp').html('<font color="green">Success...</font>');
                            location.reload();
                        }else {
                            $('#addUserlsresp').html('<font color="red">' + AddUserFeedback + '</font>');
                            $('#addUser').html('Save');
                            $('#addUser').css("disabled", "0");
                            console.log(AddUserFeedback);
                        }
                        });
                });
            });
            function openTab(tabAction, actionName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(actionName).style.display = "block";
                tabAction.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>
        <script src="../../../dashboard/js/main.js"></script>
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
        <!-- <script src="../../../dashboard/js/sortable/jquery.sortable.js"></script> -->
        <script src="../../../dashboard/js/app.plugin.js"></script>
    </body>
    </html>