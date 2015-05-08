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
            $current_kpi = $kpi->getkpis();
            $current_assumptions = $assumption->getAssumptions();
            //$kpi_2009 = $kpi->getKPIbyYear('2009');
            $all_heads = $heads->getHeads();
            foreach ($all_heads as $value) {
                $head_id = $value->id;
                $head_name = $value->name;
                if ($head_name == 'Rooms Department') {
                    $head_att = $heads->getHeadValues($head_id, '2014');
                    $head_att_2009 = $heads->getHeadValues($head_id, '2015');
                } else if ($head_name == 'Food & Beverage Department') {
                    $head_att_fnb = $heads->getHeadValues($head_id, '2014');
                    $head_att_fnb_2009 = $heads->getHeadValues($head_id, '2015');
                } else if ($head_name == 'Minor Operating Department') {
                    $head_att_min_op = $heads->getHeadValues($head_id, '2014');
                    $head_att_min_op_2009 = $heads->getHeadValues($head_id, '2015');
                } else if ($head_name == 'Undistributed Operating Expenses') {
                    $head_att_expense = $heads->getHeadValues($head_id, '2014');
                    $head_att_expense_2009 = $heads->getHeadValues($head_id, '2015');
                } else if ($head_name == 'Head Office Charges') {
                    $head_att_ho_charges = $heads->getHeadValues($head_id, '2014');
                    $head_att_ho_charges_2009 = $heads->getHeadValues($head_id, '2015');
                }
            }
            $branch_name = $heads->getbranchbyid($_SESSION['branch_id']);
            ?>
                    <!-- begin MAIN PAGE CONTENT -->
                    <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <h1>KPI's
                                    <small><?php echo $branch_name->name ?></small>
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
                                        <div class="form-group">
                                            <?php
                                            foreach ($current_kpi as $key => $value) {
                                                ?>
                                                <!--                                                    <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                                                        <div class="col-sm-4">&nbsp;</div>
                                                                                                       <div class="row"> <div class="col-sm-2" style="text-align: center"><label><?php echo $key ?></label></div></div>
                                                                                                       <div class="row"> <div class="col-sm-2" style="text-align: center"><label><?php echo $value->total_rooms ?></label></div></div>
                                                                                                       <div class="row"> <div class="col-sm-2" style="text-align: center"><label><?php echo $value->no_of_days ?></label></div></div>
                                                                                                      <div class="row">  <div class="col-sm-2" style="text-align: center"><label><?php echo $value->rooms_vailable ?></label></div></div>
                                                                                                        <div class="row"><div class="col-sm-2" style="text-align: center"><label><?php echo $value->rooms_occupied ?></label></div></div>
                                                                                                      <div class="row">  <div class="col-sm-2" style="text-align: center"><label><?php echo $value->rooms_occupancy_precent ?></label></div></div>
                                                                                                        <div class="row"><div class="col-sm-2" style="text-align: center"><label><?php echo $value->average_room_rate ?></label></div></div>
                                                                                                       <div class="row"> <div class="col-sm-2" style="text-align: center"><label><?php echo $value->total_covers_food ?></label></div></div>
                                                                                                     <div class="row">   <div class="col-sm-2" style="text-align: center"><label><?php echo $value->average_spend_food ?></label></div></div>
                                                                                                     <div class="row">   <div class="col-sm-2" style="text-align: center"><label><?php echo $value->average_spend_beverages ?></label></div></div>
                                                                                                       <div class="row"> <div class="col-sm-2" style="text-align: center"><label><?php echo $value->total_average_spend ?></label></div></div>
                                                                                                        <div class="row"><div class="col-sm-2" style="text-align: center"><label><?php echo $value->total_payroll ?></label></div></div>
                                                                                                        <div class="row"><div class="col-sm-2" style="text-align: center"><label><?php echo $value->total_number_of_employees ?></label></div></div>
                                                                                                        <div class="row"><div class="col-sm-2" style="text-align: center"><label><?php echo $value->precentage_revenue ?></label></div></div>
                                                                                                    </div>-->
                                                <?php
                                            }
                                            ?>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div id="example-table_length" class="dataTables_length">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="dataTables_filter" id="example-table_filter" style="float: right">
                                                            <label><a href="addkpi.php"><button class="btn btn-default">Add KPI</button></a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                                            <thead>
                                                                <tr>
                                                                    <th>Attributes</th>
                                                                    <?php
                                                                    $pnl_check = FALSE;
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        $pnl_check = $pnl->checkPnlGenerated($key);
                                                                        if($pnl_check) {
                                                                            echo "<th> <a href='editkpi.php?year=$key'>$key</a> </td>";
                                                                        } else {
                                                                            echo "<th> <a href='editkpi.php?year=$key'>$key</a><br/>(<small><a href='pnl_generate.php?year=$key'>Generate PNL</a><small>) </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Total Number of Rooms</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td class='left'> $value->total_rooms </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Number of days</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->no_of_days </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Room Available</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->rooms_vailable </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Room Occupied</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->rooms_occupied </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Room Occupancy Percentage</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->rooms_occupancy_precent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Average Room Rate</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->average_room_rate </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Total Covers (Food)</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->total_covers_food </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Average Spend Food</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->average_spend_food </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Average Spend Beverages</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->average_spend_beverages </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Total Average Spend</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->total_average_spend </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Total Payroll</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->total_payroll </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Number of Employees</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->total_number_of_employees </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>% to Revenue</td>
                                                                    <?php
                                                                    foreach ($current_kpi as $key => $value) {
                                                                        echo "<td> $value->precentage_revenue </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <?php
                                                                    echo "<td colspan='2'> <strong>Assumptions</strong> </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Rate of inflation</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->inflation_rate% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Increase in food covers</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->increase_food_covers% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Increase in number of employees</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->employees_increase_no% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Increase in occupancy</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->occupancy_increase% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Increase in ARR</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->arr_increase% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Food cost</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->food_cost% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Beverage cost</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->beverage_cost% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>MOD Cost of Sale</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->mod_cost_of_sale% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Permit Room Cost of Sale</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->permit_room_cost_sale% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Sports & Recreation Cost of Sale</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->sports_recreation_cost_sale% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Interest on bank loan</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->interestbank_loan% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Depreciation</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->depreciation% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Taxation</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->taxation% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Amortization</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->amortization% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Wealth Tax</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->wealth_tax% </td>";
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Deferred Tax</td>
                                                                    <?php
                                                                    echo "<td> $current_assumptions->deferred_tax% </td>";
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.col-lg-12 -->

                                            </div>
                                            <!-- /.row -->


















                                        </div>

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
