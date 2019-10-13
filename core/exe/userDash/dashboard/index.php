<!DOCTYPE html>
<html lang="en" class="app">
<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>User -
            <?php echo $username; ?>
        </title>
        <link href="../../../../dashboard/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="../../../../dashboard/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../../../../dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="../../../../dashboard/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="../../../../dashboard/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../../../../dashboard/css/app.v1.css" rel="stylesheet">
        <link href="../../../../dashboard/css/app.min.1.css" rel="stylesheet">
        <link href="../../../../dashboard/css/app.min.2.css" rel="stylesheet">
    </head>

    <body class="" style="overflow: auto;">
        <section class="vbox">
            <?php require_once 'topbar.php'; ?>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <?php require_once 'nav.php'; ?>
                        <!-- /.aside -->
                        <section id="content">
                            <section class="hbox stretch">
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
                                                                            <h4 class="m-b-xs text-black"><center> Incoming Messages </center></h4>
                                                                        </div>
                                                                    </div>
                                                                </header>
                                                                <div class="table-responsive">
                                                                    <table id="data-table-basic" class="table table-hover" style="margin-bottom: 0;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th data-column-id="date" data-order="desc">Date</th>
                                                                                <th data-column-id="Message">Message</th>
                                                                                <th data-column-id="Name" data-type="numeric">Number</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                        $tableArgs = array('assignedUser'=>$userId);
                                                                        $myTableMessages =getManyByValue("messages", "id",$tableArgs );
                                                                        foreach ($myTableMessages as $key => $tableId){
                                                                            $argsTable = array("id"=>$tableId);
                                                                            $tableDate=date_create(getByValue("messages", "date", $argsTable));
                                                                            $tableMessage=getByValue("messages", "content", $argsTable);
                                                                            $tableNumber=getByValue("messages", "phoneNumber", $argsTable);
                                                                            $formartNumber = substr_replace($tableNumber,"0",0,4);
                                                                            echo "<tr>";
                                                                            echo "<td>".date_format($tableDate, "M d")."</td>";
                                                                            echo "<td>".$tableMessage."</td>";
                                                                            echo "<td>".$formartNumber."</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    ?>
                                                                        </tbody>
                                                                    </table>
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
                                                                <div class="table-responsive">
                                                                    <table id="data-table-selection" class="table table-hover" style="margin-bottom: 0;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th data-column-id="Date" data-order="desc">Date</th>
                                                                                <th data-column-id="Message">Message</th>
                                                                                <th data-column-id="Phone Number" data-type="numeric">Recipient</th>
                                                                                <th data-column-id="Status">Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                    $table2Args = array('user_id'=>$userId);
                                                                    $myTable2Messages =getManyByValue("replies", "id",$table2Args );
                                                                    foreach ($myTable2Messages as $key => $table2Id){
                                                                        $argsTable2 = array("id"=>$table2Id);
                                                                        $table2Date=date_create(getByValue("replies", "replied_on", $argsTable2));
                                                                        $table2Message=getByValue("replies", "content", $argsTable2);
                                                                        $table2Number=getByValue("replies", "phoneNumber", $argsTable2);
                                                                        $formartNumber2 = substr_replace($table2Number,"0",0,4);
                                                                        echo "<tr>";
                                                                        echo "<td>".date_format($table2Date, "M d")."</td>";
                                                                        echo "<td>".$table2Message."</td>";
                                                                        echo "<td>".$formartNumber2."</td>";
                                                                        echo "<td>Sent</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                    ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </section>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <section>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <canvas id="myChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </section>
                                    </div>
                                </section>
                            </section>
                        </section>
                </section>
        </section>
        <!-- Bootstrap -->
        <script src="../../../../dashboard/js/notification.js"></script>
        <script src="../../../../dashboard/js/app.v1.js"></script>
        <script src="../../../../dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../../../../dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="../../../../dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../../../../dashboard/vendors/bower_components/Waves/dist/waves.min.js"></script>        
        <!--responsible for the welcome message -->
        <!-- <script src="../../../dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script> -->
        <script src="../../../../dashboard/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>

        <script src="../../../../dashboard/js/functions.js"></script>
        <script src="../../../../dashboard/js/actions.js"></script>
        <script src="../../../../dashboard/js/demo.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //Basic Example
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                });

                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true
                });

                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " +
                                "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript" src="../../../../dashboard/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../../../../dashboard/js/bootstrap2.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../../../../dashboard/js/mdb.min.js"></script>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["<?php echo array_keys($inboxData)[0];?>", "<?php echo array_keys($inboxData)[1];?>", "<?php echo array_keys($inboxData)[2];?>", "<?php echo array_keys($inboxData)[3];?>", "<?php echo array_keys($inboxData)[4];?>", "<?php echo array_keys($inboxData)[5];?>", "<?php echo array_keys($inboxData)[6];?>"],
                    datasets: [{
                        label: 'Inbound Messages',
                        data: [<?php echo $inboxData[array_keys($inboxData)[0]];?>, <?php echo $inboxData[array_keys($inboxData)[1]];?>, <?php echo $inboxData[array_keys($inboxData)[2]];?>, <?php echo $inboxData[array_keys($inboxData)[3]];?>, <?php echo $inboxData[array_keys($inboxData)[4]];?>, <?php echo $inboxData[array_keys($inboxData)[5]];?>, <?php echo $inboxData[array_keys($inboxData)[6]];?>],
                        backgroundColor: [
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)'
                        ],
                        borderColor: [
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)',
                            'rgba(11, 99, 182, 0.5)'
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Outbound Messages',
                        data: [<?php echo $outboxData[array_keys($outboxData)[0]];?>, <?php echo $outboxData[array_keys($outboxData)[1]];?>, <?php echo $outboxData[array_keys($outboxData)[2]];?>, <?php echo $outboxData[array_keys($outboxData)[3]];?>, <?php echo $outboxData[array_keys($outboxData)[4]];?>, <?php echo $outboxData[array_keys($outboxData)[5]];?>, <?php echo $outboxData[array_keys($outboxData)[6]];?>],
                        backgroundColor: [
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)'
                        ],
                        borderColor: [
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)',
                            'rgba(132, 206, 235, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>

</html>