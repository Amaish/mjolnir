<!-- index log in panel -->
<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/header.php');
?>

    <body>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <h3>Tryne Global Limited</h3>
            </div>
        </nav>
        <section class="centertab">
            <div class="tab">
                <button class="tablinks" onclick="openUser(event,'admin')">Admin</button>
                <button class="tablinks" onclick="openUser(event,'user')" id="defaultOpen">User</button>
            </div>
            <div id="admin" class="tabcontent">
                <div class="form form-horizontal">

                            <legend>Admin Login Panel</legend>

                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="adminPhoneNumber">Phone Number</label>
                                <div class="col-md-7">
                                    <input id="adminPhoneNumber" name="adminPhoneNumber" type="text" placeholder="0712XXXYYY" class="form-control input-md">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password">Password</label>
                                <div class="col-md-7">
                                    <input id="adminpassword" name="adminpassword" type="password" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <div class="checkbox m-b">
                                <p id="admlsresp"></p>
                            </div>

                            <div class="form-group" align="right">
                                <label class="col-md-3 control-label" for="login"></label>
                                <div class="col-md-7">
                                    <button id="loginadmin" class="btn btn-primary ">Login</button>
                                </div>
                            </div>
                </div>
            </div>
            <div id="user" class="tabcontent">
                <div class="form form-horizontal">

                            <legend>User Login Panel</legend>

                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="userPhoneNumber">Phone Number</label>
                                <div class="col-md-7">
                                    <input id="userPhoneNumber" name="userPhoneNumber" type="text" placeholder="0712XXXYYY" class="form-control input-md">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password">Password</label>
                                <div class="col-md-7">
                                    <input id="userpassword" name="userpassword" type="password" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <div class="checkbox m-b">
                                <p id="usrlsresp"></p>
                            </div>

                            <div class="form-group" align="right">
                                <label class="col-md-4 control-label" for="login"></label>
                                <div class="col-md-5">
                                <button id="loginuser" class="btn btn-primary ">Login</button>
                                </div>
                            </div>
                </div>
            </div>
        </section>
        <?php
            include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/footer.php');
        ?>
    </body>
</html>