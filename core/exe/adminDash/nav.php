<aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                    <div class="dropdown">
                        <a href="#" data-toggle="modal" data-target="#adminModal" class="dropdown-toggle"> 
                            <span class="thumb avatar pull-left m-r"> 
                                <img src="../../../dashboard/images/icon.ico" class="dker" alt="..."> <i class="on md b-black"></i> 
                            </span> 
                            <span class="hidden-nav-xs clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold text-lt"><?php echo $adminname; ?> </strong> 
                                </span>                                           
                                <span class="text-muted text-xs block">Admin</span> 
                            </span>
                        </a>
                        
                    </div>
                </div>
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">General</div>
                    <div class="tab">
                        <ul class="nav nav-main" data-ride="collapse">
                            <li class="tablinks" onclick="openTab(event, 'Dashboard')" id="defaultOpen">
                                <a href="#" class="auto"> 
                                    <i class="fas fa-tachometer-alt"> </i> 
                                        <span class="font-bold">Dashboard</span> 
                                </a>
                            </li>
                            <li class="tablinks" onclick="openTab(event, 'Inbox')">
                                <a href="#"class="auto"> 
                                    <i class="fas fa-inbox" aria-hidden="true"> </i> 
                                        <span class="font-bold">Inbox</span> 
                                </a>
                            </li>
                            <li class="tablinks" onclick="openTab(event, 'Outbox')">
                                <a href="#"class="auto"> 
                                    <i class="fas fa-paper-plane" aria-hidden="true"> </i> 
                                        <span class="font-bold">Outbox</span> 
                                </a>
                            </li>
                            <li class="tablinks" onclick="openTab(event, 'Analytics')">
                                <a href="#"class="auto"> 
                                    <i class="fas fa-chart-line" aria-hidden="true"> </i> 
                                        <span class="font-bold">Analytics</span> 
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="line dk hidden-nav-xs"></div>
                    <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Admin Tools</div>
                    <div class="tab">
                        <ul class="nav nav-main" data-ride="collapse">
                            <li class="">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="auto"> 
                                    <i class="fas fa-user-plus icon"> </i> 
                                        <span class="font-bold">Add Users</span> 
                                </a>
                            </li>
                            <li class="">
                                <a href="#" data-toggle="modal" data-target="#statusModal" class="auto"> 
                                    <i class="fas fa-user-edit icon"> </i> 
                                        <span class="font-bold">Edit user status</span> 
                                </a>
                            </li>
                            <li class="">
                                <a href="#" data-toggle="modal" data-target="#addAdminModal" class="auto"> 
                                    <i class="fas fa-user-shield icon"> </i> 
                                        <span class="font-bold">Add admin</span> 
                                </a>
                            </li>
                            <li class="">
                                <a href="#" data-toggle="modal" data-target="#adminModal" class="auto"> 
                                    <i class="fa fa-cog icon"> </i> 
                                        <span class="font-bold">Settings</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- / nav -->
            </div>
        </section>
        <footer class="footer hidden-xs no-padder text-center-nav-xs">
            <a href="http://167.99.243.1/mjolnir/core/exe/adminLogout/" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a>
            <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a>
        </footer>
    </section>
</aside>
