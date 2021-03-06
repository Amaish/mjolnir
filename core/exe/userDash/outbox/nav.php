<aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                    <div class="dropdown">
                        <a href="#" class="auto"> 
                            <span class="thumb avatar pull-left m-r"> 
                                <img src="../../../../dashboard/images/icon.ico" class="dker" alt="..."> <i class="on md b-black"></i> 
                            </span> 
                            <span class="hidden-nav-xs clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold text-lt"><?php echo $username; ?> </strong> 
                                </span>                                           
                                <span class="text-muted text-xs block">User</span> 
                            </span>
                        </a>
                        
                    </div>
                </div>
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">General</div>
                    <div class="tab">
                        <ul class="nav nav-main" data-ride="collapse">
                            <li class="tablinks" onclick="openTab(event, 'Dashboard')">
                                <a href="http://localhost/mjolnir/core/exe/userDash/dashboard/" class="auto"> 
                                    <i class="fas fa-tachometer-alt"> </i> 
                                        <span class="font-bold">Dashboard</span> 
                                </a>
                            </li>
                            <li class="tablinks" onclick="openTab(event, 'Notassigned')">
                                <a href="http://localhost/mjolnir/core/exe/userDash/Unassigned/"class="auto"> 
                                    <i class="fa fa-envelope icon-muted" aria-hidden="true"> </i> 
                                        <span class="font-bold">Unassigned </span><span class="badge bg-success unassigned_alert"> <p id="unassigned_alert"></p></span>
                                </a>
                            </li>
                            <li class="tablinks" onclick="openTab(event, 'Outbox')">
                                <a href="http://localhost/mjolnir/core/exe/userDash/outbox/"class="auto"> 
                                    <i class="fa fa-reply icon-muted" aria-hidden="true"> </i> 
                                        <span class="font-bold">Outbox</span><span class="badge bg-success outbox_alert"> <p id="outbox_alert"></p></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="line dk hidden-nav-xs"></div>
                    <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">User Tools</div>
                    <ul class="nav nav-main" data-ride="collapse">
                        <li class="">
                            <a href="#" class="auto"> 
                                <i class="fas fa-user-alt-slash"> </i> 
                                    <span class="font-bold">Change status</span> 
                            </a>
                        </li>
                        <li class="">
                            <a href="#" data-toggle="modal" data-target="#userModal" class="auto"> 
                                <i class="fas fa-user-cog"> </i> 
                                    <span class="font-bold">Settings</span> 
                            </a>
                        </li>
                    </ul>
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
