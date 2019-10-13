<header id="header" class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk">

        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> 
            <i class="fa fa-bars"></i> 
        </a>
        <a href="#" class="navbar-brand">
            <span class="hidden-nav-xs" style="margin-left: 25px;">Tryne Global LTD</span> 
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> 
            <i class="fa fa-cog"></i> 
        </a>
    </div>
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" > 
                <span class="thumb-sm avatar pull-left"> 
                    <img src="../../../../dashboard/images/icon.ico" alt="..."> </span>
                    <?php echo $username; ?> <b class="caret"></b> 
            </a>
            <ul class="dropdown-menu animated fadeInRight">
                <li> <span class="arrow top"></span> <a href="#">Settings</a> </li>
                <li> <a href="#">Profile</a> </li>
                <li class="divider"></li>
                <li> <a href="http://167.99.243.1/mjolnir/core/exe/adminLogout/" >Logout</a> </li>
            </ul>
        </li>
    </ul>
</header>
