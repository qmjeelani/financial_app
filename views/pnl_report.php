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
            $current_kpi = $kpi->getKPIbyYear('2014');
            $kpi_2009 = $kpi->getKPIbyYear('2015');
            $branch_name =  $heads->getbranchbyid($_SESSION['branch_id']);
            $current_pnl  = $pnl->getPnl_report();
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
                                <div class="col-md-6">
                                    <a class="btn btn-green" href="pnl_print.php" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </div>
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
                                        $head_att = $heads->getHeadValuesNew($head_id);
                                        $head_att_2009 = $heads->getHeadValues($head_id, '2015');
                                    } else if($head_name == 'Food & Beverage Department') {
                                        $head_att_fnb = $heads->getHeadValuesNew($head_id);
                                        $head_att_fnb_2009 = $heads->getHeadValues($head_id, '2015');
                                    } else if($head_name == 'Minor Operating Department') {
                                        $head_att_min_op = $heads->getHeadValuesNew($head_id);
                                        $head_att_min_op_2009 = $heads->getHeadValues($head_id, '2015');
                                    } else if($head_name == 'Undistributed Operating Expenses') {
                                        $head_att_expense = $heads->getHeadValuesNew($head_id);
                                        $head_att_expense_2009 = $heads->getHeadValues($head_id, '2015');
                                    } else if($head_name == 'Head Office Charges') {
                                        $head_att_ho_charges = $heads->getHeadValuesNew($head_id);
                                        $head_att_ho_charges_2009 = $heads->getHeadValues($head_id, '2015');
                                    }
                                }
                                //$head_att = $heads->getHeadValues(1);
                                //$head_att_fnb = $heads->getHeadValues(2);
                                ?>
                                            <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                                            <thead>
                                                                <tr>
                                                                    <th>Attributes</th>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<th colspan='2' style='text-align:center'> $key </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td><strong>Amount</strong></td><td><strong>%</strong></td>";
                                                                    }
                                                                    ?>
                                                                    
                                                                </tr>
                                                                <tr class="odd gradeX text-red">
                                                                    <td class="text-right"><strong>Total Sales</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td class='text-right'> <strong>".number_format($value->total_sales_all_dep, 2). "</strong> </td>";
                                                                        echo "<td class='text-right'> <strong>100.0</strong> </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                </tbody>
                                                                
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Room Department</th>
                                                                    <!--<th colspan="5" style="background-color: #e74c3c; color: #fff">Room Department</th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX    ">
                                                                    <td>Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->rooms_dep_sales, 2). " </td>";
                                                                        echo "<td> $value->rooms_dep_sales_precent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Payroll & Related Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->rm_payroll_expense_calc, 2). " </td>";
                                                                         if($head_att[$key][0]->attribute == 'Payroll & Related Expenses') { 
                                                                           echo "<td>" .$head_att[$key][0]->value.  "</td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Other Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->rm_other_expenses_calc, 2). "</td>";
                                                                         if($head_att[$key][1]->attribute == 'Other Expenses') { 
                                                                           echo "<td>". $head_att[$key][1]->value ." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Total Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->rm_total_expense, 2). "</td>";
                                                                           echo "<td> ".($head_att[$key][0]->value + $head_att[$key][1]->value)." </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX text-red">
                                                                    <td class="text-right"><strong>Department Profit</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> <strong> ".number_format($value->rm_department_profit, 2). " </strong></td>";
                                                                        echo "<td><strong> $value->rm_department_profit_precen </strong></td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <!--<th colspan="5" style="background-color: #2980b9; color: #fff">FOOD & BEVERAGE DEPARTMENT</th>-->
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000" >FOOD & BEVERAGE DEPARTMENT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Food Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->food_sales , 2). "</td>";
                                                                        echo "<td> $value->food_sales_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Beverage Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->beverage_sales, 2). " </td>";
                                                                        echo "<td> $value->beverage_sales_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Other Income</td>
                                                                    <?php
                                                                   // print_r($head_att_fnb); exit;
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         if($head_att_fnb[$key][0]->attribute == 'Other Income') { 
                                                                           echo "<td> ".number_format($head_att_fnb[$key][0]->value, 2). " </td>";
                                                                        }
                                                                        echo "<td> $value->fnb_other_income_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                
                                                                <tr class="even gradeX">
                                                                    <td>Total Sales <small>(Food & Beverage Department)</small></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->total_sales_fnb, 2). " </td>";
                                                                        echo "<td> $value->total_sales_fnb_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            <tr class="odd gradeX">
                                                                    <td>Food Cost</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->food_cost_calc, 2). " </td>";
                                                                         if($head_att_fnb[$key][1]->attribute == 'Food Cost') { 
                                                                           echo "<td> ".$head_att_fnb[$key][1]->value." </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            <tr class="even gradeX">
                                                                    <td>Beverage Cost</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->beverage_cost_calc, 2). " </td>";
                                                                         if($head_att_fnb[$key][2]->attribute == 'Beverage Cost') { 
                                                                           echo "<td> ".$head_att_fnb[$key][2]->value." </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            <tr class="odd gradeX">
                                                                    <td>Other Income</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->other_income_fnb_calc, 2). " </td>";
                                                                         if($head_att_fnb[$key][3]->attribute == 'Other Expenses') { 
                                                                           echo "<td> ".$head_att_fnb[$key][3]->value." </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Total Cost of Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->total_cost_sales_fnb, 2). " </td>";
                                                                        echo "<td> $value->total_cost_sales_fnb_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            <tr class="odd gradeX">
                                                                    <td>Payroll & Related Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->payroll_expense_fnb_calc , 2). "</td>";
                                                                         if($head_att_fnb[$key][4]->attribute == 'Payroll & Related Expenses') { 
                                                                           echo "<td> ".$head_att_fnb[$key][4]->value." </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            
                                                            <tr class="even">
                                                                    <td>Other Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->other_expenses_fnb_calc, 2). " </td>";
                                                                         if($head_att_fnb[$key][5]->attribute == 'Other Expenses') { 
                                                                           echo "<td> ".$head_att_fnb[$key][5]->value." </td>";
                                                                        }
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            <tr class="odd">
                                                                    <td>Total Costs</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->total_costs_fnb, 2). " </td>";
                                                                        echo "<td> $value->total_costs_fnb_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                
                                                                
                                                                <tr class="even gradeX text-red">
                                                                    <td class="text-right"><strong>Department Profit</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td class='text-right'> <strong>".number_format($value->dep_profit_fnb, 2). " </strong></td>";
                                                                        echo "<td  class='text-right'><strong> $value->dep_profit_fnb_percent </strong></td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <!--<th colspan="5" style="background-color: #16a085; color: #fff">Minor Operating Department</th>-->
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Minor Operating Department</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         if($head_att_min_op[$key][0]->attribute == 'Sales') { 
                                                                           echo "<td> ".number_format($head_att_min_op[$key][0]->value, 2). " </td>";
                                                                        }
                                                                        echo "<td> $value->min_op_sales_percent </td>";
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Cost of Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->min_op_cost_sales_calc, 2). " </td>";
                                                                         if($head_att_min_op[$key][1]->attribute == 'Cost of Sales') { 
                                                                           echo "<td> ".$head_att_min_op[$key][1]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX text-red">
                                                                    <td class="text-right"><strong>Department Profit</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td class='text-right'> <strong>".number_format($value->min_op_dep_profit, 2). " </strong></td>";
                                                                        echo "<td  class='text-right'><strong> $value->min_op_dep_profit_percent </strong></td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            <tr class="odd gradeX">
                                                                    <td>Sports & Recreation Sales</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         if($head_att_min_op[$key][2]->attribute == 'Sports & Recreation Sales') { 
                                                                           echo "<td> ".number_format($head_att_min_op[$key][2]->value, 2). " </td>";
                                                                        }
                                                                        echo "<td> $value->min_op_sports_sales_percentage </td>";
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                     
                                                            <tr class="even gradeX">
                                                                    <td>Sports & Recreation Expenses</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->min_op_sports_sales_calc, 2). " </td>";
                                                                         if($head_att_min_op[$key][3]->attribute == 'Sports & Recreation Expenses') { 
                                                                           echo "<td> ".$head_att_min_op[$key][3]->value." </td>";
                                                                        }
                                                                        
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX text-red">
                                                                    <td class="text-right"><strong>Department Profit</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td class='text-right'> <strong>".number_format($value->min_op_sports_sales_dep_profit, 2). " </strong></td>";
                                                                        echo "<td  class='text-right'><strong> $value->min_op_sports_sales_dep_profit_percent </strong></td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Other Operating Income</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Rental & Other Income</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         if($head_att_min_op[$key][4]->attribute == 'Rental & Other Income') { 
                                                                           echo "<td> ".number_format($head_att_min_op[$key][0]->value, 2). " </td>";
                                                                        }
                                                                        echo "<td> $value->rental_other_income_percent </td>";
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Head Office Income</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         if($head_att_min_op[$key][5]->attribute == 'Head Office Income') { 
                                                                           echo "<td> ".number_format($head_att_min_op[$key][5]->value, 2). "</td>";
                                                                        }
                                                                        echo "<td> $value->head_office_income_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Gross Operating Income</th>
                                                                </tr>
                                                            </thead>
                                                             <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Gross Income<small>(Income of all department)</small></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->total_gross_income, 2). " </td>";
                                                                        echo "<td> $value->total_gross_income_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Expenses</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Hotel Admin & General</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->hotel_admin_general_calc, 2). "  </td>";
                                                                         if($head_att_expense[$key][0]->attribute == 'Hotel Admin & General') { 
                                                                           echo "<td> ".$head_att_expense[$key][0]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Local Sales & Marketing</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->local_sales_marketing_calc, 2). " </td>";
                                                                         if($head_att_expense[$key][1]->attribute == 'Local Sales & Marketing') { 
                                                                           echo "<td> ".$head_att_expense[$key][1]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Energy Costs</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->energy_costs_calc, 2). " </td>";
                                                                         if($head_att_expense[$key][2]->attribute == 'Energy Costs') { 
                                                                           echo "<td> ".$head_att_expense[$key][2]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Repair & Maintenance</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->repair_maintence_calc, 2). " </td>";
                                                                         if($head_att_expense[$key][3]->attribute == 'Repair & Maintenance') { 
                                                                           echo "<td> ".$head_att_expense[$key][3]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Real Estate Taxes/ Insurance</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->real_estate_taxes_calc, 2). " </td>";
                                                                         if($head_att_expense[$key][4]->attribute == 'Real Estate Taxes/ Insurance') { 
                                                                           echo "<td> ".$head_att_expense[$key][4]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">EBIDAT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td>Admin & Finance (H.O)</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->admin_finance_ho_calc, 2). " </td>";
                                                                         if($head_att_ho_charges[$key][1]->attribute == 'Admin & Finance') { 
                                                                           echo "<td> ".$head_att_ho_charges[$key][1]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Marketing (H.O)</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->marketing_ho_calc, 2). " </td>";
                                                                         if($head_att_ho_charges[$key][2]->attribute == 'Marketing') { 
                                                                           echo "<td> ".$head_att_ho_charges[$key][2]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="odd gradeX">
                                                                    <td>Management (Royalty) Fee</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->management_fee_calc, 2). " </td>";
                                                                         if($head_att_ho_charges[$key][3]->attribute == 'Management Fee') { 
                                                                           echo "<td> ".$head_att_ho_charges[$key][3]->value." </td>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                <tr class="even gradeX">
                                                                    <td>Total Deduction <small>(Head Office Charges)</small></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->head_office_charges, 2). " </td>";
                                                                        echo "<td> $value->head_office_charges_total_deduc_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td> EBIDAT<small>(Earning Before Interest Depreciation Amm. & Taxation)</small></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->ebidat_field, 2). " </td>";
                                                                        echo "<td> $value->ebidat_field_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Income Before Fixed Charges</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                                <tr class="odd gradeX">
                                                                    <td>IBFC</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td colspan='2'> ".number_format($value->income_bef_fix_charges, 2). " </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            </tbody>
                                                            <?php 
                                $current_assumptions = $assumption->getAssumptions();
                                ?>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Profit Before Tax</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                                
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td>Depreciation </td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->depreciation_field_calc, 2). " </td>";
                                                                         echo "<td> $current_assumptions->depreciation</td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                
                                                                <tr class="even gradeX">
                                                                    <td>Amortization </td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                         echo "<td> ".number_format($value->amortization_field_calc, 2). " </td>";
                                                                        echo "<td> $current_assumptions->amortization</td>";
                                                                       
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td>Profit Before Tax</td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->pbt_field, 2). "</td>";
                                                                        echo "<td> $value->pbt_field_percent </td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5" style="background-color: #f9f9f9; color: #000">Net Profit or Loss</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd gradeX">
                                                                    <td>Taxation </td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td> ".number_format($value->taxation_calc, 2). " </td>";
                                                                        echo "<td> $current_assumptions->taxation</td>";
                                                                        
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                                
                                                                <tr class="odd gradeX text-red">
                                                                    <td class="text-right"><strong>Net Profit or (Loss)</strong></td>
                                                                    <?php
                                                                    foreach ($current_pnl as $key => $value) {
                                                                        echo "<td class='text-right'> <strong>".number_format($value->net_profit_loss, 2). "<strong></td>";
                                                                        echo "<td class='text-right'> <strong>$value->net_profit_loss_percent<strong></td>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                
                                
                                
                                
                                
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
