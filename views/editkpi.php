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
            $year = $_REQUEST['year'];
            $kpis = $kpi->getKPIbyYear($year);
            $current_assumptions = $assumption->getAssumptions();
            $all_heads = $heads->getHeads();
            foreach ($all_heads as $value) {
                $head_id = $value->id;
                $head_name = $value->name;
                if ($head_name == 'Rooms Department') {
                    $head_att = $heads->getHeadValues($head_id, $year);
                } else if ($head_name == 'Food & Beverage Department') {
                    $head_att_fnb = $heads->getHeadValues($head_id, $year);
                } else if ($head_name == 'Minor Operating Department') {
                    $head_att_min_op = $heads->getHeadValues($head_id, $year);
                } else if ($head_name == 'Undistributed Operating Expenses') {
                    $head_att_expense = $heads->getHeadValues($head_id, $year);
                } else if ($head_name == 'Head Office Charges') {
                    $head_att_ho_charges = $heads->getHeadValues($head_id, $year);
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
                                        <form role="form" action="editkpi.php" method="post" id="kpi_form" name="kpi_form">

                                            <div class="portlet portlet-green">
                                                <div class="portlet-heading">
                                                    <div class="portlet-title">
                                                        <h4>Head Value Attributes</h4>
                                                    </div>
                                                    <div class="portlet-widgets">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#roomControls"><i class="fa fa-chevron-down"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="roomControls" class="panel-collapse collapse in">
                                                    <div class="portlet-body">

                                                        <div class="form-group">

                                                            <div class="portlet">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4><strong>Rooms Department</strong></h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="payroll_expense_percent" class="col-xs-8">Payroll & Related Expenses</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="payroll_expense_percent" name="payroll_expense_percent" placeholder="Placeholder Text" value="<?php echo (($head_att[0]->attribute == 'Payroll & Related Expenses') ? $head_att[0]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="other_expenses" class="col-xs-8">Other Expenses (%)</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="other_expenses" name="other_expenses" placeholder="Placeholder Text" value="<?php echo (($head_att[1]->attribute == 'Other Expenses') ? $head_att[1]->value : ''); ?>">
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="portlet ">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4>FOOD & BEVERAGE DEPARTMENT</h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">

                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="fnb_other_income" class="col-xs-8">Other Income</label></div>
                                                                            <div class="col-sm-3">
                                                                                <input type="text" class="form-control" id="fnb_other_income" name="fnb_other_income" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[0]->attribute == 'Other Income') ? $head_att_fnb[0]->value : ''); ?>" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="food_cost_percent" class="col-xs-8">Food Cost</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="food_cost_percent" name="food_cost_percent" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[1]->attribute == 'Food Cost') ? $head_att_fnb[1]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="beverage_cost_percent" class="col-xs-8">Beverage Cost</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="beverage_cost_percent" name="beverage_cost_percent" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[2]->attribute == 'Beverage Cost') ? $head_att_fnb[2]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="other_income_fnb" class="col-xs-8">Other Income</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="other_income_fnb" name="other_income_fnb" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="payroll_expense_fnb" class="col-xs-8">Payroll & Related Expenses</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="payroll_expense_fnb" name="payroll_expense_fnb" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[4]->attribute == 'Payroll & Related Expenses') ? $head_att_fnb[4]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="other_expenses_fnb" class="col-xs-8">Other Expenses</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="other_expenses_fnb" name="other_expenses_fnb" placeholder="Placeholder Text" value="<?php echo (($head_att_fnb[5]->attribute == 'Other Expenses') ? $head_att_fnb[5]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="portlet ">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4>Minor Operating Department</h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">


                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="min_op_sales" class="col-xs-8">Sales</label></div>
                                                                            <div class="col-sm-3">
                                                                                <input type="text" class="form-control" id="min_op_sales" name="min_op_sales" placeholder="Sales" value="<?php echo (($head_att_min_op[0]->attribute == 'Sales') ? $head_att_min_op[0]->value : ''); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="min_op_cost_sales_percent" class="col-xs-8">Cost of sales</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="min_op_cost_sales_percent" name="min_op_cost_sales_percent" placeholder="Cost of Sales" value="<?php echo (($head_att_min_op[1]->attribute == 'Cost of Sales') ? $head_att_min_op[1]->value : ''); ?>">
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="min_op_sports_sales" class="col-xs-8">Sports & Recreation Sales</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="min_op_sports_sales" name="min_op_sports_sales" placeholder="Sales" value="<?php echo (($head_att_min_op[2]->attribute == 'Sports & Recreation Sales') ? $head_att_min_op[2]->value : ''); ?>">
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="min_op_sports_sales_percent" class="col-xs-8">Sports & Recreation Expenses </label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="min_op_sports_sales_percent" name="min_op_sports_sales_percent" placeholder="Sports & Recreation Expenses (%)" value="<?php echo (($head_att_min_op[3]->attribute == 'Sports & Recreation Expenses') ? $head_att_min_op[3]->value : ''); ?>">
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="portlet ">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4>Other Operating Income</h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">

                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="rental_other_income" class="col-xs-8">Rental & Other Income</label></div>
                                                                            <div class="col-sm-3">
                                                                                <input type="text" class="form-control" id="rental_other_income" name="rental_other_income" placeholder="rental_other_income" value="<?php echo (($head_att_min_op[4]->attribute == 'Rental & Other Income') ? $head_att_min_op[4]->value : ''); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="head_office_income" class="col-xs-8">Head Office Income</label></div>
                                                                            <div class="col-sm-3">
                                                                                <input type="text" class="form-control" id="head_office_income" name="head_office_income" placeholder="Head Office Income" value="<?php echo (($head_att_min_op[5]->attribute == 'Head Office Income') ? $head_att_min_op[5]->value : ''); ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="portlet ">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4>Expenses</h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">


                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="hotel_admin_general" class="col-xs-8">Hotel Admin & General</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="hotel_admin_general" name="hotel_admin_general" placeholder="Hotel Admin & General" value="<?php echo (($head_att_expense[0]->attribute == 'Hotel Admin & General') ? $head_att_expense[0]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="local_sales_marketing" class="col-xs-8">Local Sales & Marketing</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="local_sales_marketing" name="local_sales_marketing" placeholder="Local Sales & Marketing" value="<?php echo (($head_att_expense[1]->attribute == 'Local Sales & Marketing') ? $head_att_expense[1]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="energy_costs" class="col-xs-8">Energy Costs</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="energy_costs" name="energy_costs" placeholder="Energy Costs" value="<?php echo (($head_att_expense[2]->attribute == 'Energy Costs') ? $head_att_expense[2]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="repair_maintence" class="col-xs-8">Repair & Maintenance</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="repair_maintence" name="repair_maintence" placeholder="Repair & Maintenance" value="<?php echo (($head_att_expense[3]->attribute == 'Repair & Maintenance') ? $head_att_expense[3]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="real_estate_taxes" class="col-xs-8">Real Estate Taxes/ Insurance</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="real_estate_taxes" name="real_estate_taxes" placeholder="Hotel Admin & General" value="<?php echo (($head_att_expense[4]->attribute == 'Real Estate Taxes/ Insurance') ? $head_att_expense[4]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="portlet ">
                                                                <div class="portlet-heading">
                                                                    <div class="portlet-title">
                                                                        <h4>EBIDAT</h4>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="portlet-body">

                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="admin_finance_ho" class="col-xs-8">Admin & Finance (H.O)</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="admin_finance_ho" name="admin_finance_ho" placeholder="admin_finance_ho" value="<?php echo (($head_att_ho_charges[1]->attribute == 'Admin & Finance') ? $head_att_ho_charges[1]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="marketing_ho" class="col-xs-8">Marketing (H.O)</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="marketing_ho" name="marketing_ho" placeholder="marketing_ho" value="<?php echo (($head_att_ho_charges[2]->attribute == 'Marketing') ? $head_att_ho_charges[2]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                            <div class="col-sm-4"><label for="management_fee" class="col-xs-8">Management (Royalty) Fee</label></div>
                                                                            <div class="col-sm-3 input-group-left">
                                                                                <input type="text" class="form-control" id="management_fee" name="management_fee" placeholder="management_fee" value="<?php echo (($head_att_ho_charges[3]->attribute == 'Management Fee') ? $head_att_ho_charges[3]->value : ''); ?>" >
                                                                                <span class="input-group-addon">%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="portlet portlet-red">
                                                <div class="portlet-heading">
                                                    <div class="portlet-title">
                                                        <h4>KEY PERFORMANCE INDICATORS</h4>
                                                    </div>
                                                    <div class="portlet-widgets">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#kpiformcontrols"><i class="fa fa-chevron-down"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="kpiformcontrols" class="panel-collapse collapse in">
                                                    <div class="portlet-body">

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="year" class="col-xs-8">Year</label>
                                                                    </div>

                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="kpi_year" name="kpi_year" placeholder="Total Number of Rooms"  value="<?php echo $_REQUEST['year'] ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="total_rooms" class="col-xs-8">Total Number of Rooms</label>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="total_rooms" name="total_rooms" placeholder="Total Number of Rooms"  value="<?php echo (!empty($kpis->total_rooms) ? $kpis->total_rooms : 'Total Number of Rooms'); ?>">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="no_of_days" class="col-xs-8">Number of days</label>
                                                                    </div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="no_of_days" name="no_of_days" placeholder="Number of days" value="<?php echo (!empty($kpis->no_of_days) ? $kpis->no_of_days : 'Number of days'); ?>">
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
                                                                        <input type="text" class="form-control" id="rooms_vailable" name="rooms_vailable" placeholder="Room Available" value="<?php echo (!empty($kpis->rooms_vailable) ? $kpis->rooms_vailable : 'Room Available'); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="rooms_occupancy_precent" class="col-xs-8">Room Occupancy Percentage</label>
                                                                    </div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="rooms_occupancy_precent" name="rooms_occupancy_precent" placeholder="Room Occupancy Percentage" value="<?php echo (!empty($kpis->rooms_occupancy_precent) ? $kpis->rooms_occupancy_precent : 'Room Occupancy Percentage'); ?>">
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
                                                                        <input type="text" class="form-control" id="rooms_occupied" name="rooms_occupied" placeholder="Room Occupied" value="<?php echo (!empty($kpis->rooms_occupied) ? $kpis->rooms_occupied : 'Room Occupied'); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="average_room_rate" class="col-xs-8">Average Room Rate</label>
                                                                    </div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="average_room_rate" name="average_room_rate" placeholder="Average Room Rate" value="<?php echo (!empty($kpis->average_room_rate) ? $kpis->average_room_rate : 'Average Room Rate'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4">
                                                                        <label for="total_covers_food" class="col-xs-8">Total Covers (Food)</label>
                                                                    </div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="total_covers_food"  name="total_covers_food" placeholder="Total Covers (Food)" value="<?php echo (!empty($kpis->total_covers_food) ? $kpis->total_covers_food : 'Total Covers (Food)'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="average_spend_food" class="col-xs-8">Average Spend Food</label></div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="average_spend_food" name="average_spend_food" placeholder="Average Spend Food" value="<?php echo (!empty($kpis->average_spend_food) ? $kpis->average_spend_food : 'Average Spend Food'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="average_spend_beverages" class="col-xs-8">Average Spend Beverages</label></div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="average_spend_beverages" name="average_spend_beverages" placeholder="Average Spend Beverages" value="<?php echo (!empty($kpis->average_spend_beverages) ? $kpis->average_spend_beverages : 'Average Spend Beverages'); ?>">
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
                                                                        <input type="text" class="form-control" id="total_average_spend" name="total_average_spend" placeholder="Total Average Spend" value="<?php echo (!empty($kpis->total_average_spend) ? $kpis->total_average_spend : 'Total Average Spend'); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="total_payroll" class="col-xs-8">Total Payroll</label></div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="total_payroll" name="total_payroll" placeholder="Total Payroll" value="<?php echo (!empty($kpis->total_payroll) ? $kpis->total_payroll : 'Total Payroll'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="total_number_of_employees" class="col-xs-8">Number of Employees</label></div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="total_number_of_employees" name="total_number_of_employees" placeholder="Number of Employees" value="<?php echo (!empty($kpis->total_number_of_employees) ? $kpis->total_number_of_employees : 'Number of Employees'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="precentage_revenue" class="col-xs-8">% to Revenue</label></div>
                                                                    <div class="col-xs-3">
                                                                        <input type="text" class="form-control" id="precentage_revenue" name="precentage_revenue" placeholder="% to Revenue" value="<?php echo (!empty($kpis->precentage_revenue) ? $kpis->precentage_revenue : ''); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="portlet portlet-blue">
                                                <div class="portlet-heading">
                                                    <div class="portlet-title">
                                                        <h4>Assumptions</h4>
                                                    </div>
                                                    <div class="portlet-widgets">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#assumptionsControls"><i class="fa fa-chevron-down"></i></a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="assumptionsControls" class="panel-collapse collapse in">
                                                    <div class="portlet-body">

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="inflation_rate" class="col-xs-8">Rate of inflation</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="inflation_rate" name="inflation_rate" placeholder="Rate of inflation"  value="<?php echo (!empty($current_assumptions->inflation_rate) ? $current_assumptions->inflation_rate : 'Rate of inflation'); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="increase_food_covers" class="col-xs-8">Increase in food covers</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="increase_food_covers" name="increase_food_covers" placeholder="Number of days" value="<?php echo (!empty($current_assumptions->increase_food_covers) ? $current_assumptions->increase_food_covers : 'Increase in food covers'); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="employees_increase_no" class="col-xs-8">Increase in number of employees</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="employees_increase_no" name="employees_increase_no" placeholder="Increase in number of employees" value="<?php echo (!empty($current_assumptions->employees_increase_no) ? $current_assumptions->employees_increase_no : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="occupancy_increase" class="col-xs-8">Increase in occupancy</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="occupancy_increase" name="occupancy_increase" placeholder="Increase in occupancy" value="<?php echo (!empty($current_assumptions->occupancy_increase) ? $current_assumptions->occupancy_increase : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="arr_increase" class="col-xs-8">Increase in ARR</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="arr_increase" name="arr_increase" placeholder="Increase in ARR" value="<?php echo (!empty($current_assumptions->arr_increase) ? $current_assumptions->arr_increase : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="food_cost" class="col-xs-8">Food cost</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="food_cost" name="food_cost" placeholder="Food cost" value="<?php echo (!empty($current_assumptions->food_cost) ? $current_assumptions->food_cost : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="beverage_cost" class="col-xs-8">Beverage cost</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="beverage_cost"  name="beverage_cost" placeholder="Beverage cost" value="<?php echo (!empty($current_assumptions->beverage_cost) ? $current_assumptions->beverage_cost : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="mod_cost_of_sale" class="col-xs-8">MOD Cost of Sale</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="mod_cost_of_sale" name="mod_cost_of_sale" placeholder="MOD Cost of Sale" value="<?php echo (!empty($current_assumptions->mod_cost_of_sale) ? $current_assumptions->mod_cost_of_sale : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="permit_room_cost_sale" class="col-xs-8">Permit Room Cost of Sale</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="permit_room_cost_sale" name="permit_room_cost_sale" placeholder="Permit Room Cost of Sale" value="<?php echo (!empty($current_assumptions->permit_room_cost_sale) ? $current_assumptions->permit_room_cost_sale : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="sports_recreation_cost_sale" class="col-xs-8">Sports & Recreation Cost of Sale</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="sports_recreation_cost_sale" name="sports_recreation_cost_sale" placeholder="Sports & Recreation Cost of Sale" value="<?php echo (!empty($current_assumptions->sports_recreation_cost_sale) ? $current_assumptions->sports_recreation_cost_sale : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="interestbank_loan" class="col-xs-8">Interest on bank loan</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="interestbank_loan" name="interestbank_loan" placeholder="Interest on bank loan" value="<?php echo (!empty($current_assumptions->interestbank_loan) ? $current_assumptions->interestbank_loan : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Depreciation</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="depreciation" name="depreciation" placeholder="Number of Employees" value="<?php echo (!empty($current_assumptions->depreciation) ? $current_assumptions->depreciation : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="taxation" class="col-xs-8">Taxation</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="taxation" name="taxation" placeholder="Taxation" value="<?php echo (!empty($current_assumptions->taxation) ? $current_assumptions->taxation : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Amortization</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="amortization" name="amortization" placeholder="Amortization" value="<?php echo (!empty($current_assumptions->amortization) ? $current_assumptions->amortization : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="wealth_tax" class="col-xs-8">Wealth Tax</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="wealth_tax" name="wealth_tax" placeholder="Wealth Tax" value="<?php echo (!empty($current_assumptions->wealth_tax) ? $current_assumptions->wealth_tax : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-xs-12 col-sm-6 col-lg-12">
                                                                    <div class="col-sm-4"><label for="depreciation" class="col-xs-8">Deferred Tax</label></div>
                                                                    <div class="col-sm-3 input-group-left">
                                                                        <input type="text" class="form-control" id="deferred_tax" name="deferred_tax" placeholder="Deferred Tax" value="<?php echo (!empty($current_assumptions->deferred_tax) ? $current_assumptions->deferred_tax : ''); ?>">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <input type="hidden" id="kpi_rec_id" name="kpi_rec_id" value="<?php echo $kpis->id; ?>" />
                                                <input type="hidden" id="kpi_branch_id" name="kpi_branch_id" value="<?php echo $_SESSION['branch_id']; ?>" />
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
        <script src="js/calculate_kpi.js"></script>
    </body>

</html>
