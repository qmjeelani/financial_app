<?php
session_start();
//print_r($_SESSION); exit;
?>
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
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">

        <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
        <link href="css/demo.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    <title>Financial App</title>




    </head>
    <?php
    require_once("config/db.php");
require_once("classes/kpi.php");
require_once("classes/Heads.php");
require_once("classes/Assumption.php");
$assumption = new Assumption();
// load the KPI class
/*require_once("classes/ProfitLoss.php");
/$assumption = new Assumption();
if (isset($_POST['submit'])) {
    $assumption->saveAssumptions();
}*/
$kpi = new kpi();
$heads = new Heads();
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
            //include("views/left_nav.php");
            $current_kpi = $kpi->getKPIbyYear('2014');
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <h1>Profit and Loss 
                                    <small><?php  echo $_SESSION['branch_name'] ?></small>
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
                                $all_heads = $heads->getHeads();
                                foreach ($all_heads as $value) {
                                    $head_id = $value->id;
                                    $head_name = $value->name;
                                    if($head_name == 'Rooms Department') {
                                        $head_att = $heads->getHeadValues($head_id, '2014');
                                    } else if($head_name == 'Food & Beverage Department') {
                                        $head_att_fnb = $heads->getHeadValues($head_id, '2014');
                                    } else if($head_name == 'Minor Operating Department') {
                                        $head_att_min_op = $heads->getHeadValues($head_id, '2014');
                                    } else if($head_name == 'Undistributed Operating Expenses') {
                                        $head_att_expense = $heads->getHeadValues($head_id, '2014');
                                    } else if($head_name == 'Head Office Charges') {
                                        $head_att_ho_charges = $heads->getHeadValues($head_id, '2014');
                                    }
                                }
                                //$head_att = $heads->getHeadValues(1);
                                //$head_att_fnb = $heads->getHeadValues(2);
                                ?>
                                <div class="portlet portlet-red">
										<div class="portlet-heading">
											<div class="portlet-title">
												<h4>Profit and Loss Statement</h4>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="portlet-body">
											<div class="table-responsive">
												<table class="table table-condensed">
													<tbody>
														<tr style="background-color: #dff0d8;">
															<td ><b>TOTAL SALES</b>
                                                                                                                            
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div id="total_sales_all_dep_container" style="font-weight: bold ; text-align: right;"></div>
                                                                                                                        </td>
                                                                                                                        
														</tr>
														<tr style="background-color: #fcf8e3;">
															<td  colspan="2">ROOMS DEPARTMENT</td>
														</tr>
														<tr>
															<td>Sales
                                                                                                                        <input type="hidden" class="form-control" id="rooms_occupied" name="rooms_occupied" placeholder="Room Occupied" value="<?php  echo (!empty($current_kpi->rooms_occupied) ? $current_kpi->rooms_occupied : 'Rooms Occupied'); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="average_room_rate" name="average_room_rate" placeholder="Average Room Rate" value="<?php  echo (!empty($current_kpi->average_room_rate) ? $current_kpi->average_room_rate : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="sales" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
                                                                                                                        <td><div id="sales_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Payroll &amp; Related Expenses
                                                                                                                        <input type="hidden" class="form-control" id="payroll_expense_percent" name="payroll_expense_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att[0]->attribute == 'Payroll & Related Expenses') ? $head_att[0]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="payroll_expense_calc" name="payroll_expense_calc" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
                                                                                                                        <td><div id="expense_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Other Expenses 
                                                                                                                        <input type="hidden" class="form-control" id="other_expenses" name="other_expenses" placeholder="Placeholder Text" value="<?php  echo (($head_att[1]->attribute == 'Other Expenses') ? $head_att[1]->value : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="other_expenses_calc" name="other_expenses_calc" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="other_expenses_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Total Expenses
                                                                                                                        <input type="hidden" class="form-control" id="total_expense" name="total_expense" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="total_expense_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>DEPARTMENTAL PROFIT
                                                                                                                        <input type="hidden" id="department_profit" name="department_profit" class="form-control" readonly>
                                                                                                                        </td>
															<td><div id="department_profit_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #fcf8e3;">
															<td colspan="2">FOOD &amp; BEVERAGE DEPARTMENT</td>
														</tr>
														<tr>
															<td>Food Sales
                                                                                                                        <input type="hidden" class="form-control" id="total_cover" name="total_cover" placeholder="Total Covers (Food)" value="<?php  echo (!empty($current_kpi->total_covers_food) ? $current_kpi->total_covers_food : 'Total Covers (Food)'); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="average_spend_food" name="average_spend_food" placeholder="Average Spend Food" value="<?php  echo (!empty($current_kpi->average_spend_food) ? $current_kpi->average_spend_food : 'Average Spend Food'); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="food_sales" name="food_sales" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="food_sales_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Beverage Sales
                                                                                                                        <input type="hidden" class="form-control" id="average_spend_beverages" name="average_spend_beverages" placeholder="Average Spend Beverages" value="<?php  echo (!empty($current_kpi->average_spend_beverages) ? $current_kpi->average_spend_beverages : 'Average Spend Beverages'); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="beverage_sales" name="beverage_sales" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="beverage_sales_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Other Income 
                                                                                                                        <input type="hidden" class="form-control" id="fnb_other_income" name="fnb_other_income" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[0]->attribute == 'Other Income') ? $head_att_fnb[0]->value : ''); ?>" >
                                                                                                                        </td>
															<td><div id="fnb_other_income_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>Total Sales
                                                                                                                        <input type="hidden" class="form-control" id="total_sales_fnb" name="total_sales_fnb" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="total_sales_fnb_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Food Cost 
                                                                                                                        <input type="hidden" class="form-control" id="food_cost_percent" name="food_cost_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[1]->attribute == 'Food Cost') ? $head_att_fnb[1]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="food_cost_calc" name="food_cost_calc" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="food_cost_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Beverage Cost 
                                                                                                                        <input type="hidden" class="form-control" id="beverage_cost_percent" name="beverage_cost_percent" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[2]->attribute == 'Beverage Cost') ? $head_att_fnb[2]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="beverage_cost_calc" name="beverage_cost_calc" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="beverage_cost_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Other Income/ (Expense)
                                                                                                                        <input type="hidden" class="form-control" id="other_income_fnb" name="other_income_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="other_income_fnb_calc" name="other_income_fnb_calc" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" readonly>
                                                                                                                        </td>
															<td><div id="other_income_fnb_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>Total Cost of Sales
                                                                                                                            <input type="hidden" class="form-control" id="total_cost_sales_fnb" name="total_cost_sales_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[3]->attribute == 'Other Expenses') ? $head_att_fnb[3]->value : ''); ?>" readonly>
                                                                                                                        </td>
															<td><div id="total_cost_sales_fnb_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Payroll &amp; Related Expenses
                                                                                                                            <input type="hidden" class="form-control" id="payroll_expense_fnb" name="payroll_expense_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[4]->attribute == 'Payroll & Related Expenses') ? $head_att_fnb[4]->value : ''); ?>" >
                                                                                                                            <input type="hidden" class="form-control" id="payroll_expense_fnb_calc" name="payroll_expense_fnb_calc" placeholder="Placeholder Text"  readonly>
                                                                                                                        </td>
															<td><div id="payroll_expense_fnb_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Other Expenses
                                                                                                                            <input type="hidden" class="form-control" id="other_expenses_fnb" name="payroll_expense_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[5]->attribute == 'Other Expenses') ? $head_att_fnb[5]->value : ''); ?>" >
                                                                                                                            <input type="hidden" class="form-control" id="other_expenses_fnb_calc" name="other_expenses_fnb_calc" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="other_expenses_fnb_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>Total Costs
                                                                                                                        <input type="hidden" class="form-control" id="total_cost_fnb" name="total_cost_fnb" placeholder="Placeholder Text" value="<?php  echo (($head_att_fnb[5]->attribute == 'Other Expenses') ? $head_att_fnb[5]->value : ''); ?>" >
                                                                                                                        </td>
															<td><div id="total_cost_fnb_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>DEPARTMENTAL PROFIT
                                                                                                                        <input type="hidden" class="form-control" id="dep_profit_fnb" name="dep_profit_fnb" readonly>
                                                                                                                        </td>
															<td><div id="dep_profit_fnb_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #fcf8e3;">
															<td colspan="2">MINOR OPERATING DEPARTMENT</td>
														</tr>
														<tr>
															<td>Sales
                                                                                                                        <input type="hidden" class="form-control" id="min_op_sales" name="min_op_sales" placeholder="Sales" value="<?php  echo (($head_att_min_op[0]->attribute == 'Sales') ? $head_att_min_op[0]->value : ''); ?>">
                                                                                                                        </td>
															<td><div id="min_op_sales_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Cost of Sales
                                                                                                                        <input type="hidden" class="form-control" id="min_op_cost_sales_percent" name="min_op_cost_sales_percent" placeholder="Cost of Sales" value="<?php  echo (($head_att_min_op[1]->attribute == 'Cost of Sales') ? $head_att_min_op[1]->value : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="min_op_cost_sales_calc" name="min_op_cost_sales_calc" placeholder="Cost of Sales" readonly>
                                                                                                                        </td>
															<td><div id="min_op_cost_sales_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>DEPARTMENTAL PROFIT
                                                                                                                        <input type="hidden" class="form-control" id="min_op_dep_profit" name="min_op_dep_profit" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="min_op_dep_profit_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr>
															<td>Permit Room Sales</td>
															<td><?php echo "500"; ?></td>
														</tr>
														<tr>
															<td>Permit Room Cost</td>
															<td><?php echo "500"; ?></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>DEPARTMENTAL PROFIT</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
														<tr>
															<td>Sports &amp; Recreation Sales
                                                                                                                        <input type="hidden" class="form-control" id="min_op_sports_sales" name="min_op_sports_sales" placeholder="Sales" value="<?php  echo (($head_att_min_op[2]->attribute == 'Sports & Recreation Sales') ? $head_att_min_op[2]->value : ''); ?>">
                                                                                                                        </td>
															<td><div id="min_op_sports_sales_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Sports &amp; Recreation Expenses
                                                                                                                        <input type="hidden" class="form-control" id="min_op_sports_sales_percent" name="min_op_sports_sales_percent" placeholder="Sports & Recreation Expenses (%)" value="<?php  echo (($head_att_min_op[3]->attribute == 'Sports & Recreation Expenses') ? $head_att_min_op[3]->value : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="min_op_sports_sales_calc" name="min_op_sports_sales_calc" placeholder="Sports & Recreation Expenses (Calculated)" readonly>
                                                                                                                        </td>
															<td><div id="min_op_sports_sales_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>DEPARTMENTAL PROFIT
                                                                                                                        <input type="hidden" class="form-control" id="min_op_sports_sales_dep_profit" name="min_op_sports_sales_dep_profit" placeholder="Placeholder Text" readonly>
                                                                                                                        </td>
															<td><div id="min_op_sports_sales_dep_profit_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Rental &amp; Other Income
                                                                                                                        <input type="hidden" class="form-control" id="rental_other_income" name="rental_other_income" placeholder="rental_other_income" value="<?php  echo (($head_att_min_op[4]->attribute == 'Rental & Other Income') ? $head_att_min_op[4]->value : ''); ?>">
                                                                                                                        </td>
															<td><div id="rental_other_income_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Head Office Income
                                                                                                                        <input type="hidden" class="form-control" id="head_office_income" name="head_office_income" placeholder="Head Office Income" value="<?php  echo (($head_att_min_op[5]->attribute == 'Head Office Income') ? $head_att_min_op[5]->value : ''); ?>">
                                                                                                                        </td>
															<td><div id="head_office_income_container" style="text-align: right;"></div></td>
														</tr>
														
														<tr style="background-color: #fcf8e3;">
															<td colspan="2">UNDISTRIBUTED OPERATING EXPENSES
                                                                                                                        <input type="hidden" class="form-control" id="total_sales_all_dep" name="total_sales_all_dep" placeholder="rental_other_income" readonly>
                                                                                                                        </td>
														</tr>
														<tr>
															<td>Hotel Admin &amp; General
                                                                                                                        <input type="hidden" class="form-control" id="hotel_admin_general" name="hotel_admin_general" placeholder="Hotel Admin & General" value="<?php  echo (($head_att_expense[0]->attribute == 'Hotel Admin & General') ? $head_att_expense[0]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="hotel_admin_general_calc" name="hotel_admin_general_calc" placeholder="Hotel Admin & General"  readonly>
                                                                                                                        </td>
															<td><div id="hotel_admin_general_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Local Sales &amp; Marketing
                                                                                                                        <input type="hidden" class="form-control" id="local_sales_marketing" name="local_sales_marketing" placeholder="Local Sales & Marketing" value="<?php  echo (($head_att_expense[1]->attribute == 'Local Sales & Marketing') ? $head_att_expense[1]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="local_sales_marketing_calc" name="local_sales_marketing_calc" placeholder="Local Sales & Marketing Calc"  readonly>
                                                                                                                        </td>
															<td><div id="local_sales_marketing_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Energy Costs
                                                                                                                        <input type="hidden" class="form-control" id="energy_costs" name="energy_costs" placeholder="Energy Costs" value="<?php  echo (($head_att_expense[2]->attribute == 'Energy Costs') ? $head_att_expense[2]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="energy_costs_calc" name="energy_costs_calc" placeholder="Energy Costs"  readonly>
                                                                                                                        </td>
															<td><div id="energy_costs_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Repair &amp; Maintenance 
                                                                                                                        <input type="hidden" class="form-control" id="repair_maintence" name="repair_maintence" placeholder="Repair & Maintenance" value="<?php  echo (($head_att_expense[3]->attribute == 'Repair & Maintenance') ? $head_att_expense[3]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="repair_maintence_calc" name="repair_maintence_calc" placeholder="Repair & Maintenance" readonly>
                                                                                                                        </td>
                                                                                                                        
															<td><div id="repair_maintence_calc_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr>
															<td>Lease (Land) Rent</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
														<tr>
															<td>Real Estate Taxes/ Insurance
                                                                                                                        <input type="hidden" class="form-control" id="real_estate_taxes" name="real_estate_taxes" placeholder="Hotel Admin & General" value="<?php  echo (($head_att_expense[4]->attribute == 'Real Estate Taxes/ Insurance') ? $head_att_expense[4]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="real_estate_taxes_calc" name="real_estate_taxes_calc" placeholder="Hotel Admin & General" readonly>
                                                                                                                        </td>
															<td><div id="real_estate_taxes_calc_container" style="text-align: right;"></div></td>
														</tr>
                                                                                                                
                                                                                                                <tr style="background-color: #f9f9f9;">
															<td>GROSS OPERATING INCOME
                                                                                                                        
                                                                                                                        <input type="hidden" class="form-control" id="total_gross_income" name="total_gross_income" placeholder="total_gross_income" readonly>
                                                                                                                        </td>
															<td><div id="total_gross_income_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>INCOME BEFORE FIXED CHARGES (IBFC)
                                                                                                                        <input type="hidden" class="form-control" id="income_bef_fix_charges" name="income_bef_fix_charges" placeholder="income_bef_fix_charges" readonly>
                                                                                                                        </td>
															<td><div id="income_bef_fix_charges_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #fcf8e3;">
															<td colspan="2">HEAD OFFICE CHARGES</td>
														</tr>
														<tr>
															<td>Admin &amp; Finance (H.O.)
                                                                                                                        <input type="hidden" class="form-control" id="admin_finance_ho" name="admin_finance_ho" placeholder="admin_finance_ho" value="<?php  echo (($head_att_ho_charges[1]->attribute == 'Admin & Finance') ? $head_att_ho_charges[1]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="admin_finance_ho_calc" name="admin_finance_ho_calc" placeholder="admin_finance_ho" readonly>
                                                                                                                        </td>
															<td><div id="admin_finance_ho_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Marketing (H.O.) 
                                                                                                                        <input type="hidden" class="form-control" id="marketing_ho" name="marketing_ho" placeholder="marketing_ho" value="<?php  echo (($head_att_ho_charges[2]->attribute == 'Marketing') ? $head_att_ho_charges[2]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="marketing_ho_calc" name="marketing_ho_calc" placeholder="marketing_ho_calc" readonly>
                                                                                                                        </td>
															<td><div id="marketing_ho_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Management (Royalty) Fee
                                                                                                                        <input type="hidden" class="form-control" id="management_fee" name="management_fee" placeholder="management_fee" value="<?php  echo (($head_att_ho_charges[3]->attribute == 'Management Fee') ? $head_att_ho_charges[3]->value : ''); ?>" >
                                                                                                                        <input type="hidden" class="form-control" id="management_fee_calc" name="management_fee_calc" placeholder="management_fee_calc" readonly>
                                                                                                                        </td>
															<td><div id="management_fee_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Head Office Charges
                                                                                                                        <input type="hidden" class="form-control" id="head_office_charges" name="head_office_charges" placeholder="head_office_charges" readonly>
                                                                                                                        </td>
															<td><div id="head_office_charges_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr style="background-color: #f9f9f9;">
															<td>Total Deductions</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
														<tr style="background-color: #f9f9f9;">
															<td>Earning Before Interest Depreciation Amm. &amp; Taxation (EBIDAT)
                                                                                                                        <input type="hidden" class="form-control" id="ebidat_field" name="ebidat_field" placeholder="ebidat_field" readonly>
                                                                                                                        </td>
															<td><div id="ebidat_field_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr style="background-color: #fcf8e3;">
															<td colspan="2">FIXED CHARGES </td>
														</tr>-->
<!--														<tr>
															<td>Interest on Bank Loan</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
<!--														<tr>
															<td>PROFIT BEFORE DEPRECIATION AND TAXES</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
<!--														<tr style="background-color: #f9f9f9;">
															<td>TAXES</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
                                                                                                                <?php 
                                $current_assumptions = $assumption->getAssumptions();
                                ?>
														<tr>
															<td>Depreciation
                                                                                                                        <input type="hidden" class="form-control" id="depreciation_field" name="depreciation_field" placeholder="depreciation_field" value="<?php  echo (!empty($current_assumptions->depreciation) ? $current_assumptions->depreciation : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="depreciation_field_calc" name="depreciation_field_calc" placeholder="depreciation_field_calc" readonly>
                                                                                                                        </td>
															<td><div id="depreciation_field_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Ammortization
                                                                                                                            <input type="hidden" class="form-control" id="amortization_field" name="amortization_field" placeholder="depreciation_field" value="<?php  echo (!empty($current_assumptions->amortization) ? $current_assumptions->amortization : ''); ?>">
                                                                                                                            <input type="hidden" class="form-control" id="amortization_field_calc" name="amortization_field_calc" placeholder="amortization_field_calc" readonly>
                                                                                                                        </td>
															<td><div id="amortization_field_calc_container" style="text-align: right;"></div></td>
														</tr>
														<tr style="background-color: #f9f9f9;">
															<td>PROFIT BEFORE TAX (PBT)
                                                                                                                        <input type="hidden" class="form-control" id="pbt_field" name="pbt_field" placeholder="income_bef_fix_charges" readonly>
                                                                                                                        </td>
															<td><div id="pbt_field_container" style="text-align: right;"></div></td>
														</tr>
														<tr>
															<td>Turnover Tax / Presumptive Tax
                                                                                                                        <input type="hidden" class="form-control" id="taxation" name="taxation" placeholder="taxation" value="<?php  echo (!empty($current_assumptions->taxation) ? $current_assumptions->taxation : ''); ?>">
                                                                                                                        <input type="hidden" class="form-control" id="taxation_calc" name="taxation_calc" placeholder="taxation_calc" readonly>
                                                                                                                        </td>
															<td><div id="taxation_calc_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr>
															<td>Deferred Tax (Head Office)</td>
															<td><?php echo "500"; ?></td>
														</tr>
														<tr>
															<td>Wealth Tax (Head Office)</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
														<tr style="background-color: #f9f9f9;">
															<td>NET PROFIT OR (LOSS)
                                                                                                                        <input type="hidden" class="form-control" id="net_profit_loss" name="net_profit_loss" placeholder="net_profit_loss" readonly>
                                                                                                                        </td>
															<td><div id="net_profit_loss_container" style="text-align: right;"></div></td>
														</tr>
<!--														<tr>
															<td>Prior Year Adjustment Expenses / (Income)</td>
															<td><?php echo "500"; ?></td>
														</tr>-->
													</tbody>
												</table>
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
        <script src="js/calculate_print.js"></script>

    </body>

</html>
