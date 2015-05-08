<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Financial App</title>
        <link href="css/plugins/pace/pace.css" rel="stylesheet">
        <script src="js/plugins/pace/pace.js"></script>

        <!-- GLOBAL STYLES - Include these on every page. -->
        <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
        <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- PAGE LEVEL PLUGIN STYLES -->

        <!-- THEME STYLES - Include these on every page. -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">

        <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
        <link href="css/demo.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <?php
// show potential errors / feedback (from registration object)
    if (isset($employee)) {
        if ($employee->errors) {
            foreach ($employee->errors as $error) {
                echo $error;
            }
        }
        if ($employee->messages) {
            foreach ($employee->messages as $message) {
                echo $message;
            }
        }
    }
    ?>
    <body>

        <div id="wrapper">
            <?php
            include("views/top_nav.php");
            include("views/left_nav.php");
            //$current_kpi = $kpi->getkpis();
            //$kpi_2009 = $kpi->getKPIbyYear('2009');
            $latest_kpi = $kpi->getLatestKpi();
            $branch_name =  $heads->getbranchbyid($_SESSION['branch_id']);
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <h1>KPI's
                                    <small><?php  echo $branch_name->name ?></small>
                                    <!--<small>Table Options</small>-->
                                </h1>
                                <!--                            <ol class="breadcrumb">
                                                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                                                </li>
                                                                <li class="active">Basic Tables</li>
                                                            </ol>-->
                                <?php if (!empty($kpi->messages)) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <span class="sr-only">Message:</span>
                                        <?php echo $kpi->messages[0]; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- end PAGE TITLE ROW -->

                    <!-- begin BASIC TABLES MAIN ROW -->
                    <div class="row">

                        <!-- Basic Responsive Table -->
                        <div class="col-lg-13">
                            <div class="portlet portlet-default">
                                <div class="portlet-heading">
                                    <div class="portlet-title">
                                        <h4>KPI</h4>
                                    </div>
                                    <div class="portlet-widgets">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#kpis_form"><i class="fa fa-chevron-down"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="kpis_form" class="panel-collapse collapse in">
                                    <div class="portlet-body">
                                        <form role="form" action="addkpi.php" method="post" id="kpi_form" name="kpi_form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                            <label for="year" class="col-xs-8">Year</label>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <?php echo  $kpi->getNextYears(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                            <label for="total_rooms" class="col-xs-8">Total Number of Rooms</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="total_rooms" name="total_rooms" placeholder="Total Number of Rooms"  value="<?php  echo (!empty($latest_kpi->total_rooms) ? $latest_kpi->total_rooms : 'Total Number of Rooms'); ?>">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                            <label for="no_of_days" class="col-xs-8">Number of days</label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="no_of_days" name="no_of_days" placeholder="Number of days" value="<?php  echo (!empty($latest_kpi->no_of_days) ? $latest_kpi->no_of_days : 'Number of days'); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                         <div class="col-sm-4">
                                                             <label for="rooms_vailable" class="col-xs-8">Room Available
                                                                 <br/>
                                                             <small>(Number of Rooms  X Number of days)</small>
                                                             </label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="rooms_vailable" name="rooms_vailable" placeholder="Room Available" value="<?php  echo (!empty($latest_kpi->rooms_vailable) ? $latest_kpi->rooms_vailable : 'Room Available'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                            <label for="rooms_occupancy_precent" class="col-xs-8">Room Occupancy Percentage</label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                                <input type="text" class="form-control" id="rooms_occupancy_precent" name="rooms_occupancy_precent" placeholder="Room Occupancy Percentage" value="<?php  echo (!empty($latest_kpi->rooms_occupancy_precent) ? $latest_kpi->rooms_occupancy_precent : 'Room Occupancy Percentage'); ?>">
                                                        </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                        <label for="rooms_occupied" class="col-xs-8">Room Occupied
                                                        <br/>
                                                        <small>(Room Available  X Room Occupany / 100)</small>
                                                        </label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="rooms_occupied" name="rooms_occupied" placeholder="Room Occupied" value="<?php  echo (!empty($latest_kpi->rooms_occupied) ? $latest_kpi->rooms_occupied : 'Room Occupied'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                         <div class="col-sm-4">
                                                        <label for="average_room_rate" class="col-xs-8">Average Room Rate</label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="average_room_rate" name="average_room_rate" placeholder="Average Room Rate" value="<?php  echo (!empty($latest_kpi->average_room_rate) ? $latest_kpi->average_room_rate : 'Average Room Rate'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">
                                                        <label for="total_covers_food" class="col-xs-8">Total Covers (Food)</label>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="total_covers_food"  name="total_covers_food" placeholder="Total Covers (Food)" value="<?php  echo (!empty($latest_kpi->total_covers_food) ? $latest_kpi->total_covers_food : 'Total Covers (Food)'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="average_spend_food" class="col-xs-8">Average Spend Food</label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="average_spend_food" name="average_spend_food" placeholder="Average Spend Food" value="<?php  echo (!empty($latest_kpi->average_spend_food) ? $latest_kpi->average_spend_food : 'Average Spend Food'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="average_spend_beverages" class="col-xs-8">Average Spend Beverages</label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="average_spend_beverages" name="average_spend_beverages" placeholder="Average Spend Beverages" value="<?php  echo (!empty($latest_kpi->average_spend_beverages) ? $latest_kpi->average_spend_beverages : 'Average Spend Beverages'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="total_average_spend" class="col-xs-8">Total Average Spend
                                                        <br/>
                                                        <small>(Average Spend Food + Beverage)</small>
                                                        </label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="total_average_spend" name="total_average_spend" placeholder="Total Average Spend" value="<?php  echo (!empty($latest_kpi->total_average_spend) ? $latest_kpi->total_average_spend : 'Total Average Spend'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="total_payroll" class="col-xs-8">Total Payroll</label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="total_payroll" name="total_payroll" placeholder="Total Payroll" value="<?php  echo (!empty($latest_kpi->total_payroll) ? $latest_kpi->total_payroll : 'Total Payroll'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="total_number_of_employees" class="col-xs-8">Number of Employees</label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="total_number_of_employees" name="total_number_of_employees" placeholder="Number of Employees" value="<?php  echo (!empty($latest_kpi->total_number_of_employees) ? $latest_kpi->total_number_of_employees : 'Number of Employees'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="precentage_revenue" class="col-xs-8">% to Revenue</label></div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control" id="precentage_revenue" name="precentage_revenue" placeholder="% to Revenue" value="<?php  echo (!empty($latest_kpi->precentage_revenue) ? $latest_kpi->precentage_revenue : ''); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" id="kpi_branch_id" name="kpi_branch_id" value="<?php echo $_SESSION['branch_id']; ?>" />
                                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.portlet -->
                        </div>
                        <!-- /.col-lg-6 -->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.page-content -->

            </div>
            <!-- /#page-wrapper -->
            <!-- end MAIN PAGE CONTENT -->

        </div>
        <!-- /#wrapper -->
        <!-- GLOBAL SCRIPTS -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
        <script src="js/plugins/popupoverlay/defaults.js"></script>

        <!-- /#logout -->
        <!-- Logout Notification jQuery -->
        <!-- HISRC Retina Images -->

        <!-- PAGE LEVEL PLUGIN SCRIPTS -->

        <!-- THEME SCRIPTS -->
        <script src="js/flex.js"></script>
        <script src="js/calculate_kpi.js"></script>
    </body>

</html>
