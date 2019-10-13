<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<!-- Mirrored from flatfull.com/themes/scale/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 06:59:34 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Profile - <?php echo $username; ?></title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../../../dashboard/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section class="vbox">
        <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
            <div class="navbar-header aside-md dk">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="fa fa-bars"></i> </a>
                <a href="index.html" class="navbar-brand"> <img src="images/logo.png" class="m-r-sm" alt="scale"> <span class="hidden-nav-xs">Scale</span> </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a>
            </div>
            <ul class="nav navbar-nav hidden-xs">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-grid"></i> </a>
                    <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
                        <div class="row m-l-none m-r-none m-t m-b text-center">
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-mail i-2x text-primary-lt"></i> </span> <small class="text-muted">Mailbox</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-calendar i-2x text-danger-lt"></i> </span> <small class="text-muted">Calendar</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-paperplane i-2x text-info-lt"></i> </span> <small class="text-muted">Trainning</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-images i-2x text-muted"></i> </span> <small class="text-muted">Photos</small> </a>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="padder-v">
                                    <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i> </span> <small class="text-muted">Timeline</small> </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </li>
            </ul>
            <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
                <div class="form-group">
                    <div class="input-group"> <span class="input-group-btn"> <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button> </span> <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects...">                        </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-chat3"></i> <span class="badge badge-sm up bg-danger count">2</span> </a>
                    <section class="dropdown-menu aside-xl animated flipInY">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </div>
                            <div class="list-group list-group-alt">
                                <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/a0.png" alt="..." class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">10 minutes ago</small> </span>                                    </a>
                                <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">1 hour ago</small> </span> </a>
                            </div>
                            <div class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.png" alt="..."> </span> John.Smith <b class="caret"></b> </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                        <li> <a href="profile.html">Profile</a> </li>
                        <li>
                            <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                        </li>
                        <li> <a href="docs.html">Help</a> </li>
                        <li class="divider"></li>
                        <li> <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </header>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                    <section class="vbox">
                        <section class="w-f scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                <div class="clearfix wrapper dk nav-user hidden-xs">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.png" class="dker" alt="..."> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt">John.Smith</strong> <b class="caret"></b> </span>                                            <span class="text-muted text-xs block">Art Director</span> </span>
                                        </a>
                                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                            <li> <span class="arrow top hidden-nav-xs"></span> <a href="#">Settings</a> </li>
                                            <li> <a href="profile.html">Profile</a> </li>
                                            <li>
                                                <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
                                            </li>
                                            <li> <a href="docs.html">Help</a> </li>
                                            <li class="divider"></li>
                                            <li> <a href="modal.lockme.html" data-toggle="ajaxModal">Logout</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                                    <ul class="nav nav-main" data-ride="collapse">
                                        <li>
                                            <a href="index.html" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Overview</span> </a>
                                        </li>
                                        <li>
                                            <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <b class="badge bg-danger pull-right">4</b> <i class="i i-stack icon"> </i> <span class="font-bold">Layouts</span>                                                </a>
                                            <ul class="nav dk">
                                                <li>
                                                    <a href="layout-color.html" class="auto"> <i class="i i-dot"></i> <span>Color option</span> </a>
                                                </li>
                                                <li>
                                                    <a href="layout-hbox.html" class="auto"> <i class="i i-dot"></i> <span>Hbox layout</span> </a>
                                                </li>
                                                <li>
                                                    <a href="layout-boxed.html" class="auto"> <i class="i i-dot"></i> <span>Boxed layout</span> </a>
                                                </li>
                                                <li>
                                                    <a href="layout-fluid.html" class="auto"> <i class="i i-dot"></i> <span>Fluid layout</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">UI kit</span> </a>
                                            <ul class="nav dk">
                                                <li>
                                                    <a href="buttons.html" class="auto"> <i class="i i-dot"></i> <span>Buttons</span> </a>
                                                </li>
                                                <li>
                                                    <a href="icons.html" class="auto"> <b class="badge bg-info pull-right">3</b> <i class="i i-dot"></i> <span>Icons</span> </a>
                                                </li>
                                                <li>
                                                    <a href="grid.html" class="auto"> <i class="i i-dot"></i> <span>Grid</span> </a>
                                                </li>
                                                <li>
                                                    <a href="widgets.html" class="auto"> <b class="badge bg-dark pull-right">8</b> <i class="i i-dot"></i> <span>Widgets</span> </a>
                                                </li>
                                                <li>
                                                    <a href="components.html" class="auto"> <i class="i i-dot"></i> <span>Components</span> </a>
                                                </li>
                                                <li>
                                                    <a href="list.html" class="auto"> <i class="i i-dot"></i> <span>List group</span> </a>
                                                </li>
                                                <li>
                                                    <a href="#table" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-dot"></i> <span>Table</span> </a>
                                                    <ul class="nav dker">
                                                        <li>
                                                            <a href="table-static.html"> <i class="i i-dot"></i> <span>Table static</span> </a>
                                                        </li>
                                                        <li>
                                                            <a href="table-datatable.html"> <b class="label bg-dark pull-right">1.10</b> <i class="i i-dot"></i> <span>Datatable</span> </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#form" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-dot"></i> <span>Form</span> </a>
                                                    <ul class="nav dker">
                                                        <li>
                                                            <a href="form-elements.html"> <i class="i i-dot"></i> <span>Form elements</span> </a>
                                                        </li>
                                                        <li>
                                                            <a href="form-validation.html"> <i class="i i-dot"></i> <span>Form validation</span> </a>
                                                        </li>
                                                        <li>
                                                            <a href="form-wizard.html"> <i class="i i-dot"></i> <span>Form wizard</span> </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="chart.html" class="auto"> <i class="i i-dot"></i> <span>Chart</span> </a>
                                                </li>
                                                <li>
                                                    <a href="portlet.html" class="auto"> <i class="i i-dot"></i> <span>Portlet</span> </a>
                                                </li>
                                                <li>
                                                    <a href="timeline.html" class="auto"> <i class="i i-dot"></i> <span>Timeline</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="active">
                                            <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-docs icon"> </i> <span class="font-bold">Pages</span> </a>
                                            <ul class="nav dk">
                                                <li class="active">
                                                    <a href="profile.html" class="auto"> <i class="i i-dot"></i> <span>Profile</span> </a>
                                                </li>
                                                <li>
                                                    <a href="profile-2.html" class="auto"> <i class="i i-dot"></i> <span>Profile 2</span> </a>
                                                </li>
                                                <li>
                                                    <a href="search.html" class="auto"> <i class="i i-dot"></i> <span>Search</span> </a>
                                                </li>
                                                <li>
                                                    <a href="invoice.html" class="auto"> <i class="i i-dot"></i> <span>Invoice</span> </a>
                                                </li>
                                                <li>
                                                    <a href="intro.html" class="auto"> <i class="i i-dot"></i> <span>Intro</span> </a>
                                                </li>
                                                <li>
                                                    <a href="master.html" class="auto"> <i class="i i-dot"></i> <span>Master</span> </a>
                                                </li>
                                                <li>
                                                    <a href="gmap.html" class="auto"> <i class="i i-dot"></i> <span>Google Map</span> </a>
                                                </li>
                                                <li>
                                                    <a href="jvectormap.html" class="auto"> <i class="i i-dot"></i> <span>Vector Map</span> </a>
                                                </li>
                                                <li>
                                                    <a href="signin.html" class="auto"> <i class="i i-dot"></i> <span>Signin</span> </a>
                                                </li>
                                                <li>
                                                    <a href="signup.html" class="auto"> <i class="i i-dot"></i> <span>Signup</span> </a>
                                                </li>
                                                <li>
                                                    <a href="404.html" class="auto"> <i class="i i-dot"></i> <span>404</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Apps</span> </a>
                                            <ul class="nav dk">
                                                <li>
                                                    <a href="mail.html" class="auto"> <b class="badge bg-success lt pull-right">2</b> <i class="i i-dot"></i> <span>Mailbox</span> </a>
                                                </li>
                                                <li>
                                                    <a href="fullcalendar.html" class="auto"> <i class="i i-dot"></i> <span>Calendar</span> </a>
                                                </li>
                                                <li>
                                                    <a href="project.html" class="auto"> <i class="i i-dot"></i> <span>Project</span> </a>
                                                </li>
                                                <li>
                                                    <a href="media.html" class="auto"> <i class="i i-dot"></i> <span>Media</span> </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html" class="auto"> <i class="i i-dot"></i> <span>Chat</span> </a>
                                                </li>
                                                <li>
                                                    <a href="contacts.html" class="auto"> <i class="i i-dot"></i> <span>Contacts</span> </a>
                                                </li>
                                                <li>
                                                    <a href="note.html" class="auto"> <i class="i i-dot"></i> <span>Note</span> </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="line dk hidden-nav-xs"></div>
                                    <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Lables</div>
                                    <ul class="nav">
                                        <li>
                                            <a href="mail.html#work"> <i class="i i-circle-sm text-info-dk"></i> <span>Work space</span> </a>
                                        </li>
                                        <li>
                                            <a href="mail.html#social"> <i class="i i-circle-sm text-success-dk"></i> <span>Connection</span> </a>
                                        </li>
                                        <li>
                                            <a href="mail.html#projects"> <i class="i i-circle-sm text-danger-dk"></i> <span>Projects</span> </a>
                                        </li>
                                    </ul>
                                    <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Circles</div>
                                    <ul class="nav">
                                        <li>
                                            <a href="#"> <i class="i i-circle-sm-o text-success-lt"></i> <span>College</span> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="i i-circle-sm-o text-warning"></i> <span>Social</span> </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- / nav -->
                            </div>
                        </section>
                        <footer class="footer hidden-xs no-padder text-center-nav-xs">
                            <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a>
                            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>
                        </footer>
                    </section>
                </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable">
                            <section class="hbox stretch">
                                <aside class="aside-lg bg-light lter b-r">
                                    <section class="vbox">
                                        <section class="scrollable">
                                            <div class="wrapper">
                                                <section class="panel no-border bg-primary lt">
                                                    <div class="panel-body">
                                                        <div class="row m-t-xl">
                                                            <div class="col-xs-3 text-right padder-v"> <a href="#" class="btn btn-primary btn-icon btn-rounded m-t-xl"><i class="i i-mail2"></i></a> </div>
                                                            <div class="col-xs-6 text-center">
                                                                <div class="inline">
                                                                    <div class="easypiechart" data-percent="75" data-line-width="6" data-bar-color="#fff" data-track-Color="#2796de" data-scale-Color="false" data-size="140" data-line-cap='butt' data-animate="1000">
                                                                        <div class="thumb-lg avatar"> <img src="images/a5.png" class="dker"> </div>
                                                                    </div>
                                                                    <div class="h4 m-t m-b-xs font-bold text-lt">John.Smith</div> <small class="text-muted m-b">Art director</small> </div>
                                                            </div>
                                                            <div class="col-xs-3 padder-v">
                                                                <a href="#" class="btn btn-primary btn-icon btn-rounded m-t-xl" data-toggle="class:btn-danger"> <i class="i i-phone text"></i> <i class="i i-phone2 text-active"></i> </a>
                                                            </div>
                                                        </div>
                                                        <div class="wrapper m-t-xl m-b">
                                                            <div class="row m-b">
                                                                <div class="col-xs-6 text-right"> <small>Cell Phone</small>
                                                                    <div class="text-lt font-bold">1243 0303 0333</div>
                                                                </div>
                                                                <div class="col-xs-6"> <small>Family Phone</small>
                                                                    <div class="text-lt font-bold">+32(0) 3003 234 543</div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6 text-right"> <small>Reporter</small>
                                                                    <div class="text-lt font-bold">Coch Jose</div>
                                                                </div>
                                                                <div class="col-xs-6"> <small>Manager</small>
                                                                    <div class="text-lt font-bold">James Richo</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <footer class="panel-footer dk text-center no-border">
                                                        <div class="row pull-out">
                                                            <div class="col-xs-4">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">245</span> <small class="text-muted">Followers</small> </div>
                                                            </div>
                                                            <div class="col-xs-4 dker">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">55</span> <small class="text-muted">Following</small> </div>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <div class="padder-v"> <span class="m-b-xs h3 block text-white">2,035</span> <small class="text-muted">Tweets</small> </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                </section>
                                            </div>
                                        </section>
                                    </section>
                                </aside>
                                <aside class="col-lg-4 b-l no-padder">
                                    <section class="vbox">
                                        <section class="scrollable">
                                            <div class="wrapper">
                                                <section class="panel panel-default">
                                                    <form> <textarea class="form-control no-border" rows="3" placeholder="What are you doing..."></textarea> </form>
                                                    <footer class="panel-footer bg-light lter"> <button class="btn btn-info pull-right btn-sm">POST</button>
                                                        <ul class="nav nav-pills nav-sm">
                                                            <li><a href="#"><i class="fa fa-camera text-muted"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                                                        </ul>
                                                    </footer>
                                                </section>
                                                <section class="panel panel-default">
                                                    <h4 class="padder">Latest Tweets</h4>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>                                                            </li>
                                                        <li class="list-group-item">
                                                            <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>                                                            </li>
                                                        <li class="list-group-item">
                                                            <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. </p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small> </li>
                                                    </ul>
                                                </section>
                                                <section class="panel clearfix bg-info dk">
                                                    <div class="panel-body">
                                                        <a href="#" class="thumb pull-left m-r"> <img src="images/a0.png" class="img-circle b-a b-3x b-white"> </a>
                                                        <div class="clear"> <a href="#" class="text-info">@Mike Mcalidek <i class="fa fa-twitter"></i></a> <small class="block text-muted">2,415 followers / 225 tweets</small> <a href="#" class="btn btn-xs btn-info m-t-xs">Follow</a>                                                            </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </section>
                                    </section>
                                </aside>
                            </section>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../../dashboard/js/app.v1.js"></script>
    <script src="../../../dashboard/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="../../../dashboard/js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Apr 2018 06:59:34 GMT -->

</html>
