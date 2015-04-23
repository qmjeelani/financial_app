<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Financial App</title>
    <!-- GLOBAL STYLES -->
    <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PAGE LEVEL PLUGIN STYLES -->
    <!-- THEME STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">
    <!-- THEME DEMO STYLES -->
    <link href="css/demo.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
    
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
        <link href="css/custom.css" rel="stylesheet">

        <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
        <link href="css/demo.css" rel="stylesheet">
</head>
<?php
// include the configs / constants for the database connection
require_once("config/db.php");
require_once("classes/kpi.php");
require_once("classes/Heads.php");
require_once("classes/Assumption.php");
require_once("classes/Consolidation.php");
//$assumption = new Assumption();
// load the KPI class
/*require_once("classes/ProfitLoss.php");
/$assumption = new Assumption();
if (isset($_POST['submit'])) {
    $assumption->saveAssumptions();
}*/
//$kpi = new kpi();
//$heads = new Heads();
$consolidation = new Consolidation();
$heads = new Heads();
    
    ?>
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
<body onload="window.print();">

        <div id="wrapper">
            <?php
            //include("views/top_nav.html");
            //include("views/left_nav.html");
            //$current_kpi = $kpi->getkpis();
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <h1>Consolidated Profit and Loss 
                                    <small><?php // echo $_SESSION['branch_name'] ?></small>
                                    <!--<small>Table Options</small>-->
                                </h1>
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

                <!-- begin MAIN PAGE ROW -->
                <div class="row">

                    <!-- begin LEFT COLUMN -->
                    <div class="col-lg-6">

                        <div class="row">

                            <!-- Form Controls -->
                            <div class="col-lg-12">
                                <?php 
                                /*$all_heads = $heads->getHeads();
                                foreach ($all_heads as $value) {
                                    $head_id = $value->id;
                                    $head_name = $value->name;
                                    if($head_name == 'Rooms Department') {
                                        $head_att = $heads->getHeadValues($head_id);
                                    } else if($head_name == 'Food & Beverage Department') {
                                        $head_att_fnb = $heads->getHeadValues($head_id);
                                    } else if($head_name == 'Minor Operating Department') {
                                        $head_att_min_op = $heads->getHeadValues($head_id);
                                    } else if($head_name == 'Undistributed Operating Expenses') {
                                        $head_att_expense = $heads->getHeadValues($head_id);
                                    } else if($head_name == 'Head Office Charges') {
                                        $head_att_ho_charges = $heads->getHeadValues($head_id);
                                    }
                                }*/
                                //$head_att = $heads->getHeadValues(1);
                                //$head_att_fnb = $heads->getHeadValues(2);
                                $attributes  = $consolidation->getattributes();
                                //print_r($attributes); exit;
                                ?>
                                <div class="portlet portlet-red">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Room Department</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#room_dep_cons"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="room_dep_cons" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="room_dep_cons" name="room_dep_cons" >
                                                <div class="form-group">
                                                    <label for="room_sales_cons" class="col-sm-6 control-label">Sales</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="room_sales_cons" name="room_sales_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Room Department Sales']) ? $attributes['Room Department Sales'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room_payroll_expense_cons" class="col-sm-6 control-label">Payroll & Related Expenses</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="room_payroll_expense_cons" name="room_payroll_expense_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Payroll & Related Expenses']) ? $attributes['Payroll & Related Expenses'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room_other_expenses_cons" class="col-sm-6 control-label">Other Expenses</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="room_other_expenses_cons" name="room_other_expenses_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Other Expenses']) ? $attributes['Other Expenses'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room_total_expense_cons" class="col-sm-6 control-label">Total Expenses</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="room_total_expense_cons" name="room_total_expense_cons" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span for="room_department_profit_cons" class="input-group-addon">Department Profit</span>
                                                    <input type="text" id="room_department_profit_cons" name="room_department_profit_cons" class="form-control" readonly>
                                                </div>
                                                </div>
<!--                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                    </div>
                                                </div>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                                
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Minor Operating Department</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#minor_operating"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="minor_operating" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <?php //$head_att_min_op = $heads->getHeadValues(3); ?>
                                            <form class="form-horizontal" id="minor_operating" name="minor_operating" >
                                                <div class="form-group">
                                                    <label for="min_op_sales_cons" class="col-sm-6 control-label">Sales</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_sales_cons" name="min_op_sales_cons" placeholder="Sales" value="<?php  echo (!empty($attributes['Minor Operating Sales']) ? $attributes['Minor Operating Sales'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_cost_sales_cons" class="col-sm-6 control-label">Cost of sales </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_cost_sales_cons" name="min_op_cost_sales_cons" placeholder="Cost of Sales" value="<?php  echo (!empty($attributes['Minor Operating Cost Sales']) ? $attributes['Minor Operating Cost Sales'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_dep_profit_cons" class="col-sm-6 control-label">Department Profit</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_dep_profit_cons" name="min_op_dep_profit_cons" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <!----------------->
                                                <br>
                                            <h2>Sports & Recreation</h2>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_cons" class="col-sm-6 control-label">Sports & Recreation Sales</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_cons" name="min_op_sports_sales_cons" placeholder="Sales" value="<?php  echo (!empty($attributes['Sports & Recreation Sales']) ? $attributes['Sports & Recreation Sales'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_expenses_cons" class="col-sm-6 control-label">Sports & Recreation Expenses</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_sports_expenses_cons" name="min_op_sports_expenses_cons" placeholder="Sports & Recreation Expenses (%)"  value="<?php  echo (!empty($attributes['Sports & Recreation Expenses']) ? $attributes['Sports & Recreation Expenses'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_op_sports_sales_dep_profit_cons" class="col-sm-6 control-label">Department Profit</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="min_op_sports_sales_dep_profit_cons" name="min_op_sports_sales_dep_profit_cons" placeholder="Placeholder Text" readonly>
                                                        </div>
                                                </div>
                                                <!---------------->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Other Operating Income</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#gross_operating_form"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="gross_operating_form" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="gross_operating_form" name="gross_operating_form" role="form">
                                                <div class="form-group">
                                                    <label for="rental_other_income_cons" class="col-sm-6 control-label">Rental & Other Income</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="rental_other_income_cons" name="rental_other_income_cons" placeholder="rental_other_income" value="<?php  echo (!empty($attributes['Rental & Other Income']) ? $attributes['Rental & Other Income'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="head_office_income_cons" class="col-sm-6 control-label">Head Office Income</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="head_office_income_cons" name="head_office_income_cons" placeholder="Head Office Income"  value="<?php  echo (!empty($attributes['Head Office Income']) ? $attributes['Head Office Income'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Total Sales</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#total_sales_form"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="total_sales_form" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="total_sales_form" name="total_sales_form" role="form">
                                                <div class="form-group">
                                                    <label for="total_sales_all_dep_cons" class="col-sm-6 control-label">Total Sales <br><small>(Sales of all department)</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="total_sales_all_dep_cons" name="total_sales_all_dep_cons" placeholder="rental_other_income" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Gross Operating Income</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#gross_operating_income"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="gross_operating_income" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="gross_operating_income" name="gross_operating_income" role="form">
                                                <div class="form-group">
                                                    <label for="total_gross_income_cons" class="col-sm-6 control-label">Gross Income <br><small>(Income of all department)</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="total_gross_income_cons" name="total_gross_income_cons" placeholder="total_gross_income" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Income Before Fixed Charges (IBFC)</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#income_before_fixed_charges"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="income_before_fixed_charges" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="income_before_fixed_charges" name="income_before_fixed_charges" role="form">
                                                <div class="form-group">
                                                    <label for="income_bef_fix_charges_cons" class="col-sm-6 control-label">IBFC <br><small>(Income -  All Expenses)</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="income_bef_fix_charges_cons" name="income_bef_fix_charges_cons" placeholder="income_bef_fix_charges" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <?php 
                                //$current_assumptions = $assumption->getAssumptions();
                                ?>
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Profit Before Tax</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#pbt"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="pbt" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="pbt" name="pbt" role="form">
                                                <div class="form-group">
                                                    <label for="depreciation_field_cons" class="col-sm-6 control-label">Depreciation</label>
                                                        <div class="col-sm-4 input-group">
                                                            <input type="text" class="form-control" id="depreciation_field_cons" name="depreciation_field_cons" placeholder="depreciation_field" value="<?php  echo (!empty($attributes['Depreciation']) ? $attributes['Depreciation'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="amortization_field_cons" class="col-sm-6 control-label">Amortization<br><small>(From Assumptions)</small></label>
                                                        <div class="col-sm-4 input-group">
                                                            <input type="text" class="form-control" id="amortization_field_cons" name="amortization_field_cons" placeholder="depreciation_field" value="<?php  echo (!empty($attributes['Amortization']) ? $attributes['Amortization'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="pbt_field_cons" class="col-sm-6 control-label">Profit Before Tax <br><small>(EBIDAT - Depreciation - Amortization)</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="pbt_field_cons" name="pbt_field_cons" placeholder="income_bef_fix_charges" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
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
                                <div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>FOOD & BEVERAGE DEPARTMENT</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#fnbdep"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="fnbdep" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="food_sales_cons" class="col-sm-6 control-label">Food Sales</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="food_sales_cons" name="food_sales_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Food Sales']) ? $attributes['Food Sales'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_sales_cons" class="col-sm-6 control-label">Beverage Sales</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="beverage_sales_cons" name="beverage_sales_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Beverage Sales']) ? $attributes['Beverage Sales'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fnb_other_income_cons" class="col-sm-6 control-label">Other Income</label>
                                                    <div class="col-sm-4"> 
                                                        <input type="text" class="form-control" id="fnb_other_income_cons" name="fnb_other_income_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Other Income Fnb']) ? $attributes['Other Income Fnb'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_sales_fnb_cons" class="col-sm-6 control-label">Total Sales</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="total_sales_fnb_cons" name="total_sales_fnb_cons" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food_cost_cons" class="col-sm-6 control-label">Food Cost</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="food_cost_cons" name="food_cost_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Food Cost']) ? $attributes['Food Cost'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beverage_cost_cons" class="col-sm-6 control-label">Beverage Cost </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="beverage_cost_cons" name="beverage_cost_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Beverage Cost']) ? $attributes['Beverage Cost'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_income_fnb_cons" class="col-sm-6 control-label">Other Income </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="other_income_fnb_cons" name="other_income_fnb_cons" placeholder="Placeholder Text" value="<?php  echo $attributes['Other Income Cost Fnb'] ; ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="total_cost_sales_fnb_cons" class="col-sm-6 control-label">Total Cost of Sales</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="total_cost_sales_fnb_cons" name="total_cost_sales_fnb_cons" placeholder="Placeholder Text"  readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="payroll_expense_fnb_cons" class="col-sm-6 control-label">Payroll & Related Expenses</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="payroll_expense_fnb_cons" name="payroll_expense_fnb_cons" placeholder="Placeholder Text"   value="<?php  echo (!empty($attributes['Payroll & Related Expenses']) ? $attributes['Payroll & Related Expenses'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_expenses_fnb_cons" class="col-sm-6 control-label">Other Expenses</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="other_expenses_fnb_cons" name="other_expenses_fnb_cons" placeholder="Placeholder Text" value="<?php  echo (!empty($attributes['Other Expenses Fnb']) ? $attributes['Other Expenses Fnb'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="total_cost_fnb_cons" class="col-sm-6 control-label">Total Costs</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="total_cost_fnb_cons" name="total_cost_fnb_cons" placeholder="Placeholder Text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Department Profit</span>
                                                    <input type="text" class="form-control" id="dep_profit_fnb_cons" name="dep_profit_fnb_cons" readonly>
                                                </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                                
                                <div class="portlet portlet-orange">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Expenses</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#expenses_group"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="expenses_group" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="expenses_group" name="expenses_group">
                                                <div class="form-group">
                                                    <label for="hotel_admin_general_cons" class="col-sm-6 control-label">Hotel Admin & General</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="hotel_admin_general_cons" name="hotel_admin_general_cons" placeholder="Hotel Admin & General" value="<?php  echo (!empty($attributes['Hotel Admin & General']) ? $attributes['Hotel Admin & General'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="local_sales_marketing_cons" class="col-sm-6 control-label">Local Sales & Marketing</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="local_sales_marketing_cons" name="local_sales_marketing_cons" placeholder="Local Sales & Marketing" value="<?php  echo (!empty($attributes['Local Sales & Marketing']) ? $attributes['Local Sales & Marketing'] : ''); ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="energy_costs_cons" class="col-sm-6 control-label">Energy Costs</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="energy_costs_cons" name="energy_costs_cons" placeholder="Energy Costs" value="<?php  echo (!empty($attributes['Energy Costs']) ? $attributes['Energy Costs'] : ''); ?>" readonly >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="repair_maintence_cons" class="col-sm-6 control-label">Repair & Maintenance</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="repair_maintence_cons" name="repair_maintence_cons" placeholder="Repair & Maintenance" value="<?php  echo (!empty($attributes['Repair & Maintenance']) ? $attributes['Repair & Maintenance'] : ''); ?>" readonly >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="real_estate_taxes_cons" class="col-sm-6 control-label">Real Estate Taxes/ Insurance</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="real_estate_taxes_cons" name="real_estate_taxes_cons" placeholder="Hotel Admin & General" value="<?php  echo (!empty($attributes['Repair & Maintenance']) ? $attributes['Repair & Maintenance'] : ''); ?>" readonly >
                                                    </div>
                                                </div>
                                                
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="portlet portlet-purple">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>EBIDAT</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#EBIDAT"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="EBIDAT" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="EBIDAT" name="EBIDAT" role="form">
                                                <div class="form-group">
                                                    <label for="admin_finance_ho_cons" class="col-sm-6 control-label">Admin & Finance (H.O) </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="admin_finance_ho_cons" name="admin_finance_ho_cons" placeholder="admin_finance_ho" value="<?php  echo (!empty($attributes['Admin & Finance']) ? $attributes['Admin & Finance'] : ''); ?>" readonly >
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="marketing_ho_cons" class="col-sm-6 control-label">Marketing (H.O)</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="marketing_ho_cons" name="marketing_ho_cons" placeholder="marketing_ho"  value="<?php  echo (!empty($attributes['Marketing']) ? $attributes['Marketing'] : ''); ?>" readonly >
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="management_fee_cons" class="col-sm-6 control-label">Management (Royalty) Fee </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="management_fee_cons" name="management_fee_cons" placeholder="management_fee_cons" value="<?php  echo (!empty($attributes['Management (Royalty) Fee']) ? $attributes['Management (Royalty) Fee'] : ''); ?>" readonly >
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="head_office_charges_cons" class="col-sm-6 control-label">Head Office Charges <br><small>Admin & Finance + Marketing + Management (Royalty) Fee</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="head_office_charges_cons" name="head_office_charges_cons" placeholder="head_office_charges" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ebidat_field_cons" class="col-sm-6 control-label">Earning Before Interest Depreciation Amm. & Taxation <br><small>(IBFC - Head Office Charges)</small></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="ebidat_field_cons" name="ebidat_field_cons" placeholder="ebidat_field" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
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
                            <div class="col-lg-4 col-lg-offset-4">
                                
                                <div class="portlet portlet-default">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h2>Net Profit or (Loss)</h2>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#profit_loss"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="pbt" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <form class="form-horizontal" id="profit_loss" name="profit_loss" role="form">
                                                <div class="form-group">
                                                    <label for="taxation_cons" class="col-sm-6 control-label">Taxation</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="taxation_cons" name="taxation_cons" placeholder="taxation_calc" value="<?php  echo (!empty($attributes['Taxation']) ? $attributes['Taxation'] : ''); ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="net_profit_loss_cons" class="col-sm-6 control-label">Net Profit or (Loss) <br><small>(PBT - Taxation)</small></label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="net_profit_loss_cons" name="net_profit_loss_cons" placeholder="net_profit_loss_cons" readonly>
                                                        </div>
                                                </div>
                                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            </div>
                        </div>
                    </div>

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
        <script src="js/calculation_cons.js"></script>
    </body>

</html>
