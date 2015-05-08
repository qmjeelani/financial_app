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
//    if (isset($employee)) {
//        if ($employee->errors) {
//            foreach ($employee->errors as $error) {
//                echo $error;
//            }
//        }
//        if ($employee->messages) {
//            foreach ($employee->messages as $message) {
//                echo $message;
//            }
//        }
//    }
    ?>
    <body>

        <div id="wrapper">
            <?php
            include("views/top_nav.php");
            include("views/left_nav.php");
            $year = $_REQUEST['year'];
            $current_kpi = $kpi->getKPIbyYear($year);
            $kpi_2009 = $kpi->getKPIbyYear('2015');
            $branch_name =  $heads->getbranchbyid($_SESSION['branch_id']);
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <div class="col-md-6">
                                    <h1>Profit and Loss 
                                    <small><?php  echo $branch_name->name ?></small>
                                    <!--<small>Table Options</small>-->
                                    
                                </h1>
                                </div>
<!--                                <div class="col-md-6">
                                    <a class="btn btn-green" href="pnl_print.php" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </div>-->
                                <!--                            <ol class="breadcrumb">
                                                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                                                </li>
                                                                <li class="active">Basic Tables</li>
                                                            </ol>-->
                               
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- end PAGE TITLE ROW -->
                    <form class="form-horizontal" id="pnl_room" action="pnl_generate.php" method="post" name="pnl_room" >
                        
                <!-- begin MAIN PAGE ROW -->
                <div class="row">
                    

                    <!-- begin LEFT COLUMN -->
                    <div class="col-lg-8">

                        <div class="row">

                            <!-- Form Controls -->
                            <div class="col-lg-12">
                                <?php 
                                $all_heads = $heads->getHeads();
                                foreach ($all_heads as $value) {
                                    $head_id = $value->id;
                                    $head_name = $value->name;
                                    if($head_name == 'Rooms Department') {
                                        $head_att = $heads->getHeadValues($head_id, $year);
                                    } else if($head_name == 'Food & Beverage Department') {
                                        $head_att_fnb = $heads->getHeadValues($head_id, $year);
                                    } else if($head_name == 'Minor Operating Department') {
                                        $head_att_min_op = $heads->getHeadValues($head_id, $year);
                                    } else if($head_name == 'Undistributed Operating Expenses') {
                                        $head_att_expense = $heads->getHeadValues($head_id, $year);
                                    } else if($head_name == 'Head Office Charges') {
                                        $head_att_ho_charges = $heads->getHeadValues($head_id, $year);
                                    }
                                }
                                //$head_att = $heads->getHeadValues(1);
                                //$head_att_fnb = $heads->getHeadValues(2);
                                ?>
                                <div  class="row">
                            <div class="form-group">
                                                    <label class="col-sm-1 control-label"></label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="year" id="year" value="<?php echo $_REQUEST['year'] ?>" >
                                                        <button type="submit" name="submit" id="submit" class="btn btn-default">Generate PNL Report</button>
                                                    </div>
                                                </div>
                        </div>
                                <div class="portlet portlet-red">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Room Department</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#formControls"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="formControls" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            
                                            
                                                <div class="form-group">
                                                        <div class="col-sm-5">&nbsp;</div>
                                                        <div class="col-sm-3" style="text-align: right"><label><?php echo $year ?></label></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="rooms_occupied" class="col-sm-6 control-label">Room Occupied</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="rooms_occupied" name="rooms_occupied" placeholder="Room Occupied" value="<?php  echo (!empty($current_kpi->rooms_occupied) ? $current_kpi->rooms_occupied : 'Rooms Occupied'); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="average_room_rate" class="col-sm-6 control-label">Average Room Rate</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="average_room_rate" name="average_room_rate" placeholder="Average Room Rate" value="<?php  echo (!empty($current_kpi->average_room_rate) ? $current_kpi->average_room_rate : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sales" class="col-sm-6 control-label">Sales</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="sales" id="sales" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sales_precentage" class="col-sm-6 control-label">Sales (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" name="sales_precentage" id="sales_precentage" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payroll_expense_percent" class="col-sm-6 control-label">Payroll & Related Expenses (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="payroll_expense_percent" name="payroll_expense_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att[0]->attribute == 'Payroll & Related Expenses') ? $head_att[0]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payroll_expense_calc" class="col-sm-6 control-label">Payroll & Related Expenses <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="payroll_expense_calc" name="payroll_expense_calc" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses" class="col-sm-6 control-label">Other Expenses (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_expenses" name="other_expenses" placeholder="Placeholder Text" value="<?php  echo (($head_att[1]->attribute == 'Other Expenses') ? $head_att[1]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses_calc" class="col-sm-6 control-label">Other Expenses <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_expenses_calc" name="other_expenses_calc" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_expense" class="col-sm-6 control-label">Total Expenses</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="total_expense" name="total_expense" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="col-sm-6"><span for="department_profit" class="input-group-addon">Department Profit</span></div>
                                                    <div class="col-sm-3"><input type="text" id="department_profit" name="department_profit" class="form-control" readonly></div>
                                                </div>
                                                
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="col-sm-6"><span for="department_profit_precentage" class="input-group-addon"><small>Department Profit (%) Calculated</small></span></div>
                                                        <div class="col-sm-3"><input type="text" id="department_profit_precentage" name="department_profit_precentage" class="form-control" readonly></div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                                <!-- portlet blue Food and Beverage Department -->
                                <div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>FOOD & BEVERAGE DEPARTMENT</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#fnbdep"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="fnbdep" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal">-->
                                                <div class="form-group">
                                                        <div class="col-sm-5">&nbsp;</div>
                                                        <div class="col-sm-3" style="text-align: right"><label><?php echo $year ?></label></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_cover" class="col-sm-6 control-label">Total Covers (Food)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="total_cover" name="total_cover" placeholder="Total Covers (Food)" value="<?php  echo (!empty($current_kpi->total_covers_food) ? $current_kpi->total_covers_food : 'Total Covers (Food)'); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="average_room_rate" class="col-sm-6 control-label">Average Spend Food</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="average_spend_food" name="average_spend_food" placeholder="Average Spend Food" value="<?php  echo (!empty($current_kpi->average_spend_food) ? $current_kpi->average_spend_food : 'Average Spend Food'); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food_sales" class="col-sm-6 control-label">Food Sales</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="food_sales" name="food_sales" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food_sales_percent" class="col-sm-6 control-label">Food Sales (%) (Calculated)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="food_sales_percent" name="food_sales_percent" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="avg_speed_beverage" class="col-sm-6 control-label">Average Spend Beverages</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="average_spend_beverages" name="average_spend_beverages" placeholder="Average Spend Beverages" value="<?php  echo (!empty($current_kpi->average_spend_beverages) ? $current_kpi->average_spend_beverages : 'Average Spend Beverages'); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_sales" class="col-sm-6 control-label">Beverage Sales</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="beverage_sales" name="beverage_sales" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_sales_percent" class="col-sm-6 control-label">Beverage Sales (%) <small>Calculated</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="beverage_sales_percent" name="beverage_sales_percent" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fnb_other_income" class="col-sm-6 control-label">Other Income</label>
                                                    <div class="col-sm-3"> 
                                                        <input type="text" class="form-control" id="fnb_other_income" name="fnb_other_income" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[0]->attribute == 'Other Income') ? $head_att_fnb[0]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fnb_other_income_percent" class="col-sm-6 control-label">Other Income (%) <small>Calculated</small></label>
                                                    <div class="col-sm-3"> 
                                                        <input type="text" class="form-control" id="fnb_other_income_percent" name="fnb_other_income_percent" placeholder="Placeholder Text" readonly >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_sales_fnb" class="col-sm-6 control-label">Total Sales <br/><small>(Food & Beverage Department)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="total_sales_fnb" name="total_sales_fnb" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food_cost_percent" class="col-sm-6 control-label">Food Cost (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="food_cost_percent" name="food_cost_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[1]->attribute == 'Food Cost') ? $head_att_fnb[1]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food_cost_calc" class="col-sm-6 control-label">Food Cost (Calculated)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="food_cost_calc" name="food_cost_calc" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_cost_percent" class="col-sm-6 control-label">Beverage Cost (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="beverage_cost_percent" name="beverage_cost_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[2]->attribute == 'Beverage Cost') ? $head_att_fnb[2]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_cost_calc" class="col-sm-6 control-label">Beverage Cost <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="beverage_cost_calc" name="beverage_cost_calc" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_income_fnb" class="col-sm-6 control-label">Other Income </label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_income_fnb" name="other_income_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses_calc" class="col-sm-6 control-label">Other Income <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_income_fnb_calc" name="other_income_fnb_calc" placeholder="Placeholder Text"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_cost_sales_fnb" class="col-sm-6 control-label">Total Cost of Sales</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="total_cost_sales_fnb" name="total_cost_sales_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_cost_sales_fnb_percent" class="col-sm-6 control-label">Total Cost of Sales <small>% (Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="total_cost_sales_fnb_percent" name="total_cost_sales_fnb_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payroll_expense_fnb" class="col-sm-6 control-label">Payroll & Related Expenses (%)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="payroll_expense_fnb" name="payroll_expense_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[4]->attribute == 'Payroll & Related Expenses') ? $head_att_fnb[4]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payroll_expense_fnb_calc" class="col-sm-6 control-label">Payroll & Related Expenses (Calculated)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="payroll_expense_fnb_calc" name="payroll_expense_fnb_calc" placeholder="Placeholder Text"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses_fnb" class="col-sm-6 control-label">Other Expenses</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_expenses_fnb" name="payroll_expense_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[5]->attribute == 'Other Expenses') ? $head_att_fnb[5]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses_fnb_calc" class="col-sm-6 control-label">Other Expenses (Calculated)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="other_expenses_fnb_calc" name="other_expenses_fnb_calc" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_cost_fnb" class="col-sm-6 control-label">Total Costs</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="total_cost_fnb" name="total_cost_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[5]->attribute == 'Other Expenses') ? $head_att_fnb[5]->value : ''); ?>" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="col-sm-6"><span class="input-group-addon">Department Profit</span></div>
                                                    <div class="col-sm-3"><input type="text" class="form-control" id="dep_profit_fnb" name="dep_profit_fnb" readonly></div>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="col-sm-6"><span class="input-group-addon">Department Profit <small>(%)</small></span></div>
                                                        <div class="col-sm-3"><input type="text" class="form-control" id="dep_profit_fnb_percent" name="dep_profit_fnb_percent" readonly></div>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                    </div>
                                                </div>
                                            <!--</form>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                                
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Minor Operating Department</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#minor_operating"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="minor_operating" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php //$head_att_min_op = $heads->getHeadValues(3); ?>
                                            <!--<form class="form-horizontal" id="minor_operating" name="minor_operating" >-->
                                                <div class="form-group">
                                                    <label for="min_op_sales" class="col-sm-6 control-label">Sales</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sales" name="min_op_sales" placeholder="Sales" value="<?php  echo (($head_att_min_op[0]->attribute == 'Sales') ? $head_att_min_op[0]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sales_percent" class="col-sm-6 control-label">Sales <small>(%)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sales_percent" name="min_op_sales_percent" placeholder="Sales" readonly="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_cost_sales_percent" class="col-sm-6 control-label">Cost of sales (%)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_cost_sales_percent" name="min_op_cost_sales_percent" placeholder="Cost of Sales" value="<?php  echo (($head_att_min_op[1]->attribute == 'Cost of Sales') ? $head_att_min_op[1]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_cost_sales_calc" class="col-sm-6 control-label">Cost of sales <br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_cost_sales_calc" name="min_op_cost_sales_calc" placeholder="Cost of Sales" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_dep_profit" class="col-sm-6 control-label">Department Profit</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_dep_profit" name="min_op_dep_profit" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_dep_profit_percent" class="col-sm-6 control-label">Department Profit <small>(%)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_dep_profit_percent" name="min_op_dep_profit_percent" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <!----------------->
                                                <br>
                                            <h4>Sports & Recreation</h4>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales" class="col-sm-6 control-label">Sports & Recreation Sales</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales" name="min_op_sports_sales" placeholder="Sales" value="<?php  echo (($head_att_min_op[2]->attribute == 'Sports & Recreation Sales') ? $head_att_min_op[2]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_percentage" class="col-sm-6 control-label">Sports & Recreation Sales <small>(%)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_percentage" name="min_op_sports_sales_percentage" placeholder="Sales" readonly="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_percent" class="col-sm-6 control-label">Sports & Recreation Expenses (%)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_percent" name="min_op_sports_sales_percent" placeholder="Sports & Recreation Expenses (%)" value="<?php  echo (($head_att_min_op[3]->attribute == 'Sports & Recreation Expenses') ? $head_att_min_op[3]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_calc" class="col-sm-6 control-label">Sports & Recreation Expenses <br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_calc" name="min_op_sports_sales_calc" placeholder="Sports & Recreation Expenses (Calculated)" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_dep_profit" class="col-sm-6 control-label">Department Profit</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_dep_profit" name="min_op_sports_sales_dep_profit" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_dep_profit_percent" class="col-sm-6 control-label">Department Profit <small>(%)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_dep_profit_percent" name="min_op_sports_sales_dep_profit_percent" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <!---------------->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                    </div>
                                                </div>
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Other Operating Income</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#gross_operating_form"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="gross_operating_form" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="gross_operating_form" name="gross_operating_form" role="form">-->
                                                <div class="form-group">
                                                    <label for="rental_other_income" class="col-sm-6 control-label">Rental & Other Income</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="rental_other_income" name="rental_other_income" placeholder="rental_other_income" value="<?php  echo (($head_att_min_op[4]->attribute == 'Rental & Other Income') ? $head_att_min_op[4]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rental_other_income_percent" class="col-sm-6 control-label">Rental & Other Income <small>(%)</small> </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="rental_other_income_percent" name="rental_other_income_percent" placeholder="rental_other_income" readonly="">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="head_office_income" class="col-sm-6 control-label">Head Office Income</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="head_office_income" name="head_office_income" placeholder="Head Office Income" value="<?php  echo (($head_att_min_op[5]->attribute == 'Head Office Income') ? $head_att_min_op[5]->value : ''); ?>" readonly>
                                                        </div>
                                                    
                                                </div>
                                                <?php //print_r($head_att_min_op_2009); echo $head_att_min_op_2009[5]->value; exit;?>
                                                <div class="form-group">
                                                    <label for="head_office_income_percent" class="col-sm-6 control-label">Head Office Income (%)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="head_office_income_percent" name="head_office_income_percent" placeholder="Head Office Income" readonly="" >
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Total Sales</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#total_sales_form"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="total_sales_form" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="total_sales_form" name="total_sales_form" role="form">-->
                                                <div class="form-group">
                                                    <label for="total_sales_all_dep" class="col-sm-6 control-label">Total Sales <br><small>(Sales of all department)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="total_sales_all_dep" name="total_sales_all_dep" placeholder="rental_other_income" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Gross Operating Income</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#gross_operating_income"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="gross_operating_income" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="gross_operating_income" name="gross_operating_income" role="form">-->
                                                <div class="form-group">
                                                    <label for="total_gross_income" class="col-sm-6 control-label">Gross Income <br><small>(Income of all department)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="total_gross_income" name="total_gross_income" placeholder="total_gross_income" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_gross_income_percent" class="col-sm-6 control-label">Gross Income <br><small>(%)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="total_gross_income_percent" name="total_gross_income_percent" placeholder="total_gross_income" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet portlet-orange">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Expenses</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#expenses_group"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="expenses_group" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="expenses_group" name="expenses_group">-->
                                                <div class="form-group">
                                                    <label for="hotel_admin_general" class="col-sm-6 control-label">Hotel Admin & General</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="hotel_admin_general" name="hotel_admin_general" placeholder="Hotel Admin & General" value="<?php  echo (($head_att_expense[0]->attribute == 'Hotel Admin & General') ? $head_att_expense[0]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hotel_admin_general_calc" class="col-sm-6 control-label">Hotel Admin & General <br><small>(%)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="hotel_admin_general_calc" name="hotel_admin_general_calc" placeholder="Hotel Admin & General"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="local_sales_marketing" class="col-sm-6 control-label">Local Sales & Marketing</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="local_sales_marketing" name="local_sales_marketing" placeholder="Local Sales & Marketing" value="<?php  echo (($head_att_expense[1]->attribute == 'Local Sales & Marketing') ? $head_att_expense[1]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="local_sales_marketing_calc" class="col-sm-6 control-label">Local Sales & Marketing <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="local_sales_marketing_calc" name="local_sales_marketing_calc" placeholder="Local Sales & Marketing Calc"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="energy_costs" class="col-sm-6 control-label">Energy Costs</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="energy_costs" name="energy_costs" placeholder="Energy Costs" value="<?php  echo (($head_att_expense[2]->attribute == 'Energy Costs') ? $head_att_expense[2]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="energy_costs_calc" class="col-sm-6 control-label">Energy Costs <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="energy_costs_calc" name="energy_costs_calc" placeholder="Energy Costs"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="repair_maintence" class="col-sm-6 control-label">Repair & Maintenance</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="repair_maintence" name="repair_maintence" placeholder="Repair & Maintenance" value="<?php  echo (($head_att_expense[3]->attribute == 'Repair & Maintenance') ? $head_att_expense[3]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="repair_maintence_calc" class="col-sm-6 control-label">Repair & Maintenance <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="repair_maintence_calc" name="repair_maintence_calc" placeholder="Repair & Maintenance" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="real_estate_taxes" class="col-sm-6 control-label">Real Estate Taxes/ Insurance</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="real_estate_taxes" name="real_estate_taxes" placeholder="Hotel Admin & General" value="<?php  echo (($head_att_expense[4]->attribute == 'Real Estate Taxes/ Insurance') ? $head_att_expense[4]->value : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="real_estate_taxes_calc" class="col-sm-6 control-label">Real Estate Taxes/ Insurance <br><small>(Calculated)</small></label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="real_estate_taxes_calc" name="real_estate_taxes_calc" placeholder="Hotel Admin & General" readonly>
                                                    </div>
                                                </div>
<!--                                                </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>EBIDAT</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#EBIDAT"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="EBIDAT" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="EBIDAT" name="EBIDAT" role="form">-->
                                                <div class="form-group">
                                                    <label for="admin_finance_ho" class="col-sm-6 control-label">Admin & Finance (H.O) </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="admin_finance_ho" name="admin_finance_ho" placeholder="admin_finance_ho" value="<?php  echo (($head_att_ho_charges[1]->attribute == 'Admin & Finance') ? $head_att_ho_charges[1]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="admin_finance_ho_calc" class="col-sm-6 control-label">Admin & Finance (H.O) <br><small>(Calculated)</small> </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="admin_finance_ho_calc" name="admin_finance_ho_calc" placeholder="admin_finance_ho" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marketing_ho" class="col-sm-6 control-label">Marketing (H.O)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="marketing_ho" name="marketing_ho" placeholder="marketing_ho" value="<?php  echo (($head_att_ho_charges[2]->attribute == 'Marketing') ? $head_att_ho_charges[2]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marketing_ho_calc" class="col-sm-6 control-label">Marketing (H.O) <br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="marketing_ho_calc" name="marketing_ho_calc" placeholder="marketing_ho_calc" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="management_fee" class="col-sm-6 control-label">Management (Royalty) Fee </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="management_fee" name="management_fee" placeholder="management_fee" value="<?php  echo (($head_att_ho_charges[3]->attribute == 'Management Fee') ? $head_att_ho_charges[3]->value : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="management_fee_calc" class="col-sm-6 control-label">Management (Royalty) Fee <br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="management_fee_calc" name="management_fee_calc" placeholder="management_fee_calc" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="head_office_charges" class="col-sm-6 control-label">Head Office Charges <br><small>Admin & Finance + Marketing + Management (Royalty) Fee</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="head_office_charges" name="head_office_charges" placeholder="head_office_charges" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ebidat_field" class="col-sm-6 control-label">Earning Before Interest Depreciation Amm. & Taxation <br><small>(IBFC - Head Office Charges)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="ebidat_field" name="ebidat_field" placeholder="ebidat_field" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ebidat_field_percent" class="col-sm-6 control-label">EBIDAT <small>%</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="ebidat_field_percent" name="ebidat_field_percent" placeholder="ebidat_field" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Income Before Fixed Charges (IBFC)</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#income_before_fixed_charges"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="income_before_fixed_charges" class="panel-collapse collapse in">
                                        <div class="portlet-body">
<!--                                            <form class="form-horizontal" id="income_before_fixed_charges" name="income_before_fixed_charges" role="form">-->
                                                <div class="form-group">
                                                    <label for="income_bef_fix_charges" class="col-sm-6 control-label">IBFC <br><small>(Income -  All Expenses)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="income_bef_fix_charges" name="income_bef_fix_charges" placeholder="income_bef_fix_charges" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <?php 
                                $current_assumptions = $assumption->getAssumptions();
                                ?>
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Profit Before Tax</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#pbt"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="pbt" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="pbt" name="pbt" role="form">-->
                                                <div class="form-group">
                                                    <label for="depreciation_field" class="col-sm-6 control-label">Depreciation<br><small>(From Assumptions)</small></label>
                                                        <div class="col-sm-3 input-group">
                                                            <input type="text" class="form-control" id="depreciation_field" name="depreciation_field" placeholder="depreciation_field" value="<?php  echo (!empty($current_assumptions->depreciation) ? $current_assumptions->depreciation : ''); ?>" readonly>
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="depreciation_field_calc" class="col-sm-6 control-label">Depreciation<br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="depreciation_field_calc" name="depreciation_field_calc" placeholder="depreciation_field_calc" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amortization_field" class="col-sm-6 control-label">Amortization<br><small>(From Assumptions)</small></label>
                                                        <div class="col-sm-3 input-group">
                                                            <input type="text" class="form-control" id="amortization_field" name="amortization_field" placeholder="depreciation_field" value="<?php  echo (!empty($current_assumptions->amortization) ? $current_assumptions->amortization : ''); ?>" readonly>
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amortization_field_calc" class="col-sm-6 control-label">Amortization<br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="amortization_field_calc" name="amortization_field_calc" placeholder="amortization_field_calc" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pbt_field" class="col-sm-6 control-label">Profit Before Tax <br><small>(EBIDAT - Depreciation - Amortization)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="pbt_field" name="pbt_field" placeholder="income_bef_fix_charges" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pbt_field_percent" class="col-sm-6 control-label">Profit Before Tax <small>%</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="pbt_field_percent" name="pbt_field_percent" placeholder="income_bef_fix_charges" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Basic Form Example -->

                            

                           

                            

                        </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                    <!-- end LEFT COLUMN -->

                    <!-- begin RIGHT COLUMN -->
                    <div class="col-lg-6">

                        <div class="row">

                            
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Form Controls -->

                            <!-- Input Sizing -->
                            <div class="col-lg-12">
                                
                                <!-- /.portlet -->
                                
                                
                                
                            </div>
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Form Controls -->

                        </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                    <!-- end RIGHT COLUMN -->

                </div>
                <!-- /.row -->
                <!-- end MAIN PAGE ROW -->
                
                <div class="row">

                    <!-- begin LEFT COLUMN -->
                    <div class="col-lg-12">

                        <div class="row">

                            <!-- Form Controls -->
                            <div class="col-lg-8 ">
                                
                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Net Profit or (Loss)</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#profit_loss"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="profit_loss" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <!--<form class="form-horizontal" id="profit_loss" name="profit_loss" role="form">-->
                                                <div class="form-group">
                                                    <label for="taxation" class="col-sm-6 control-label">Taxation</label>
                                                        <div class="col-sm-3 input-group">
                                                            <input type="text" class="form-control" id="taxation" name="taxation" placeholder="taxation" value="<?php  echo (!empty($current_assumptions->taxation) ? $current_assumptions->taxation : ''); ?>" readonly>
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="taxation_calc" class="col-sm-6 control-label">Taxation<br><small>(Calculated)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="taxation_calc" name="taxation_calc" placeholder="taxation_calc" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="net_profit_loss" class="col-sm-6 control-label">Net Profit or (Loss) <br><small>(PBT - Taxation)</small></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="net_profit_loss" name="net_profit_loss" placeholder="net_profit_loss" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="net_profit_loss_percent" class="col-sm-7 control-label">Net Profit or (Loss) <small>(%)</small></label>
                                                        <div div class="col-sm-2 input-group-left">
                                                            <input type="text" class="form-control" id="net_profit_loss_percent" name="net_profit_loss_percent" placeholder="net_profit_loss_percent" readonly>
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            </div>
                        </div>
                    </div>
</form>

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
        <script src="js/calculate.js"></script>
        <script src="js/calculate_yearwise.js"></script>
    </body>

</html>
