<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

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
            $current_assumptions = $assumption->getAssumptions();
            //$assumptions_2009 = $assumption->getAssumptions('2009');
            $branch_name = $heads->getbranchbyid($_SESSION['branch_id']);
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <h1>Assumptions
                                    <small><?php echo $branch_name->name ?></small>
                                    <!--<small>Table Options</small>-->
                                </h1>
                                <!--                            <ol class="breadcrumb">
                                                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                                                </li>
                                                                <li class="active">Basic Tables</li>
                                                            </ol>-->
                                <?php if (!empty($assumption->messages)) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <span class="sr-only">Message:</span>
                                        <?php echo $assumption->messages[0]; ?>
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
                                        <h4>Assumptions</h4>
                                    </div>
                                    <div class="portlet-widgets">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#assumption_form"><i class="fa fa-chevron-down"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="assumption_form" class="panel-collapse collapse in">
                                    <div class="portlet-body">
                                        <form role="form" action="assumptions.php" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4">&nbsp;</div>
                                                        <div class="col-sm-2" style="text-align: center"><label>2008</label></div>
                                                        <!--<div class="col-sm-2" style="text-align: center"><label>2009</label></div>-->
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="inflation_rate" class="col-xs-8">Rate of inflation</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="inflation_rate" name="inflation_rate" placeholder="Rate of inflation"  value="<?php echo (!empty($current_assumptions->inflation_rate) ? $current_assumptions->inflation_rate : 'Rate of inflation'); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="inflation_rate_2009" name="inflation_rate_2009" placeholder="Rate of inflation"  value="<?php echo (!empty($assumptions_2009->inflation_rate) ? $assumptions_2009->inflation_rate : 'Rate of inflation'); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                        <!--<div class="col-xs-8"></div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="increase_food_covers" class="col-xs-8">Increase in food covers</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="increase_food_covers" name="increase_food_covers" placeholder="Number of days" value="<?php echo (!empty($current_assumptions->increase_food_covers) ? $current_assumptions->increase_food_covers : 'Increase in food covers'); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="increase_food_covers_2009" name="increase_food_covers_2009" placeholder="Number of days" value="<?php echo (!empty($assumptions_2009->increase_food_covers) ? $assumptions_2009->increase_food_covers : 'Increase in food covers'); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>

                                                    <!--                                                    <div class="col-sm-6">
                                                                                                            <label for="no_rooms" class="col-sm-6 control-label form-inline">Total Number of Rooms</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>-->

                                                    <!--                                                    <div class="col-sm-6">
                                                                                                            <label for="no_days">Number of days</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>-->
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="employees_increase_no" class="col-xs-8">Increase in number of employees</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="employees_increase_no" name="employees_increase_no" placeholder="Increase in number of employees" value="<?php echo (!empty($current_assumptions->employees_increase_no) ? $current_assumptions->employees_increase_no : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="employees_increase_no_2009" name="employees_increase_no_2009" placeholder="Increase in number of employees" value="<?php echo (!empty($assumptions_2009->employees_increase_no) ? $assumptions_2009->employees_increase_no : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="occupancy_increase" class="col-xs-8">Increase in occupancy</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="occupancy_increase" name="occupancy_increase" placeholder="Increase in occupancy" value="<?php echo (!empty($current_assumptions->occupancy_increase) ? $current_assumptions->occupancy_increase : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="occupancy_increase_2009" name="occupancy_increase_2009" placeholder="Increase in occupancy" value="<?php echo (!empty($assumptions_2009->occupancy_increase) ? $assumptions_2009->occupancy_increase : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                    <!--                                                    <div class="col-sm-6">
                                                                                                            <label for="room_available">Room Available</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>
                                                                                                        <div class="col-sm-6">
                                                                                                            <label for="room_occupied">Room Occupied</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>-->
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="arr_increase" class="col-xs-8">Increase in ARR</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="arr_increase" name="arr_increase" placeholder="Increase in ARR" value="<?php echo (!empty($current_assumptions->arr_increase) ? $current_assumptions->arr_increase : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="arr_increase_2009" name="arr_increase_2009" placeholder="Increase in ARR" value="<?php echo (!empty($assumptions_2009->arr_increase) ? $assumptions_2009->arr_increase : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="food_cost" class="col-xs-8">Food cost</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="food_cost" name="food_cost" placeholder="Food cost" value="<?php echo (!empty($current_assumptions->food_cost) ? $current_assumptions->food_cost : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="food_cost_2009" name="food_cost_2009" placeholder="Food cost" value="<?php echo (!empty($assumptions_2009->food_cost) ? $assumptions_2009->food_cost : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                    <!--                                                    <div class="col-sm-6">
                                                                                                            <div class="col-sm-4"><label for="no_rooms">Room Occupany Precentage</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>
                                                                                                        <div class="col-sm-6">
                                                                                                            <label for="no_rooms">Average Room Rate</label>
                                                                                                            <input type="text" class="form-control" placeholder=".col-sm-6">
                                                                                                        </div>-->
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="beverage_cost" class="col-xs-8">Beverage cost</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="beverage_cost"  name="beverage_cost" placeholder="Beverage cost" value="<?php echo (!empty($current_assumptions->beverage_cost) ? $current_assumptions->beverage_cost : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="beverage_cost_2009"  name="beverage_cost_2009" placeholder="Beverage cost" value="<?php echo (!empty($assumptions_2009->beverage_cost) ? $assumptions_2009->beverage_cost : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="mod_cost_of_sale" class="col-xs-8">MOD Cost of Sale</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="mod_cost_of_sale" name="mod_cost_of_sale" placeholder="MOD Cost of Sale" value="<?php echo (!empty($current_assumptions->mod_cost_of_sale) ? $current_assumptions->mod_cost_of_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="mod_cost_of_sale_2009" name="mod_cost_of_sale_2009" placeholder="MOD Cost of Sale" value="<?php echo (!empty($assumptions_2009->mod_cost_of_sale) ? $assumptions_2009->mod_cost_of_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="permit_room_cost_sale" class="col-xs-8">Permit Room Cost of Sale</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="permit_room_cost_sale" name="permit_room_cost_sale" placeholder="Permit Room Cost of Sale" value="<?php echo (!empty($current_assumptions->permit_room_cost_sale) ? $current_assumptions->permit_room_cost_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="permit_room_cost_sale_2009" name="permit_room_cost_sale_2009" placeholder="Permit Room Cost of Sale" value="<?php echo (!empty($assumptions_2009->permit_room_cost_sale) ? $assumptions_2009->permit_room_cost_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="sports_recreation_cost_sale" class="col-xs-8">Sports & Recreation Cost of Sale</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="sports_recreation_cost_sale" name="sports_recreation_cost_sale" placeholder="Sports & Recreation Cost of Sale" value="<?php echo (!empty($current_assumptions->sports_recreation_cost_sale) ? $current_assumptions->sports_recreation_cost_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="sports_recreation_cost_sale_2009" name="sports_recreation_cost_sale_2009" placeholder="Sports & Recreation Cost of Sale" value="<?php echo (!empty($assumptions_2009->sports_recreation_cost_sale) ? $assumptions_2009->sports_recreation_cost_sale : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="interestbank_loan" class="col-xs-8">Interest on bank loan</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="interestbank_loan" name="interestbank_loan" placeholder="Interest on bank loan" value="<?php echo (!empty($current_assumptions->interestbank_loan) ? $current_assumptions->interestbank_loan : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="interestbank_loan_2009" name="interestbank_loan_2009" placeholder="Interest on bank loan" value="<?php echo (!empty($assumptions_2009->interestbank_loan) ? $assumptions_2009->interestbank_loan : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Depreciation</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="depreciation" name="depreciation" placeholder="Number of Employees" value="<?php echo (!empty($current_assumptions->depreciation) ? $current_assumptions->depreciation : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="depreciation_2009" name="depreciation_2009" placeholder="Number of Employees" value="<?php echo (!empty($assumptions_2009->depreciation) ? $assumptions_2009->depreciation : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="taxation" class="col-xs-8">Taxation</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="taxation" name="taxation" placeholder="Taxation" value="<?php echo (!empty($current_assumptions->taxation) ? $current_assumptions->taxation : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="taxation_2009" name="taxation_2009" placeholder="Taxation" value="<?php echo (!empty($assumptions_2009->taxation) ? $assumptions_2009->taxation : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Amortization</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="amortization" name="amortization" placeholder="Amortization" value="<?php echo (!empty($current_assumptions->amortization) ? $current_assumptions->amortization : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="amortization_2009" name="amortization_2009" placeholder="Amortization" value="<?php echo (!empty($assumptions_2009->amortization) ? $assumptions_2009->amortization : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="wealth_tax" class="col-xs-8">Wealth Tax</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="wealth_tax" name="wealth_tax" placeholder="Wealth Tax" value="<?php echo (!empty($current_assumptions->wealth_tax) ? $current_assumptions->wealth_tax : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="wealth_tax_2009" name="wealth_tax_2009" placeholder="Wealth Tax" value="<?php echo (!empty($assumptions_2009->wealth_tax) ? $assumptions_2009->wealth_tax : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                        <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Deferred Tax</label></div>
                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="deferred_tax" name="deferred_tax" placeholder="Deferred Tax" value="<?php echo (!empty($current_assumptions->deferred_tax) ? $current_assumptions->deferred_tax : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>
<!--                                                        <div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="deferred_tax_2009" name="deferred_tax_2009" placeholder="Deferred Tax" value="<?php echo (!empty($assumptions_2009->deferred_tax) ? $assumptions_2009->deferred_tax : ''); ?>">
                                                            <span class="input-group-addon">%</span>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" id="assumption_rec_id" name="assumption_rec_id" value="<?php echo $current_assumptions->id; ?>" />
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
    </body>

</html>
