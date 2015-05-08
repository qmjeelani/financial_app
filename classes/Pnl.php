<?php

/**
 * Class registration
 * handles the user registration
 */
class Pnl {

    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;

    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();

    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct() {
        //$this->getattributes();
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    function savePnl() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            
      /*      $rooms_sales = $this->db_connection->real_escape_string(strip_tags($_POST['sales_2009'], ENT_QUOTES));
            $room_sales_percentage = $this->db_connection->real_escape_string(strip_tags($_POST['sales_precentage_2009'], ENT_QUOTES));
            $payroll_expense_calc = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_calc_2009'], ENT_QUOTES));
            $other_expenses_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses_calc_2009'], ENT_QUOTES));
            $total_expense = $this->db_connection->real_escape_string(strip_tags($_POST['total_expense_2009'], ENT_QUOTES));
            $department_profit = $this->db_connection->real_escape_string(strip_tags($_POST['department_profit_2009'], ENT_QUOTES));
            $department_profit_precentage = $this->db_connection->real_escape_string(strip_tags($_POST['department_profit_precentage_2009'], ENT_QUOTES));
            $food_sales = $this->db_connection->real_escape_string(strip_tags($_POST['food_sales_2009'], ENT_QUOTES));
            $food_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['food_sales_percent_2009'], ENT_QUOTES));
            $beverage_sales = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_sales_2009'], ENT_QUOTES));
            $beverage_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_sales_percent_2009'], ENT_QUOTES));
            $fnb_other_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['fnb_other_income_percent_2009'], ENT_QUOTES));
            $total_sales_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['total_sales_fnb_2009'], ENT_QUOTES));
            $food_cost_calc = $this->db_connection->real_escape_string(strip_tags($_POST['food_cost_calc_2009'], ENT_QUOTES));
            $beverage_cost_calc = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_cost_calc_2009'], ENT_QUOTES));
            $other_income_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_income_fnb_calc_2009'], ENT_QUOTES));
            $payroll_expense_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_fnb_calc_2009'], ENT_QUOTES));
            $other_expenses_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses_fnb_calc_2009'], ENT_QUOTES));
            $dep_profit_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['dep_profit_fnb_2009'], ENT_QUOTES));
            $dep_profit_fnb_percent = $this->db_connection->real_escape_string(strip_tags($_POST['dep_profit_fnb_percent_2009'], ENT_QUOTES));
            $min_op_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sales_percent_2009'], ENT_QUOTES));
            $min_op_cost_sales_calc = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_cost_sales_calc_2009'], ENT_QUOTES));
            $min_op_dep_profit = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_dep_profit_2009'], ENT_QUOTES));
            $min_op_dep_profit_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_dep_profit_percent_2009'], ENT_QUOTES));
            $min_op_sports_sales_percentage = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_percentage_2009'], ENT_QUOTES));
            $min_op_sports_sales_calc = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_calc_2009'], ENT_QUOTES));
            $min_op_sports_sales_dep_profit = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_dep_profit_2009'], ENT_QUOTES));
            $min_op_sports_sales_dep_profit_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_dep_profit_percent_2009'], ENT_QUOTES));
            $rental_other_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['rental_other_income_percent_2009'], ENT_QUOTES));
            $head_office_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['head_office_income_percent_2009'], ENT_QUOTES));
            $total_sales_all_dep = $this->db_connection->real_escape_string(strip_tags($_POST['total_sales_all_dep_2009'], ENT_QUOTES));
            $total_gross_income = $this->db_connection->real_escape_string(strip_tags($_POST['total_gross_income_2009'], ENT_QUOTES));
            $total_gross_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['total_gross_income_percent_2009'], ENT_QUOTES));
            $hotel_admin_general_calc = $this->db_connection->real_escape_string(strip_tags($_POST['hotel_admin_general_calc_2009'], ENT_QUOTES));
            $local_sales_marketing_calc = $this->db_connection->real_escape_string(strip_tags($_POST['local_sales_marketing_calc_2009'], ENT_QUOTES));
            $energy_costs_calc = $this->db_connection->real_escape_string(strip_tags($_POST['energy_costs_calc_2009'], ENT_QUOTES));
            $repair_maintence_calc = $this->db_connection->real_escape_string(strip_tags($_POST['repair_maintence_calc_2009'], ENT_QUOTES));
            $real_estate_taxes_calc = $this->db_connection->real_escape_string(strip_tags($_POST['real_estate_taxes_calc_2009'], ENT_QUOTES));
            $admin_finance_ho_calc = $this->db_connection->real_escape_string(strip_tags($_POST['admin_finance_ho_calc_2009'], ENT_QUOTES));
            $marketing_ho_calc = $this->db_connection->real_escape_string(strip_tags($_POST['marketing_ho_calc_2009'], ENT_QUOTES));
            $management_fee_calc = $this->db_connection->real_escape_string(strip_tags($_POST['management_fee_calc_2009'], ENT_QUOTES));
            $head_office_charges = $this->db_connection->real_escape_string(strip_tags($_POST['head_office_charges_2009'], ENT_QUOTES));
            $ebidat_field = $this->db_connection->real_escape_string(strip_tags($_POST['ebidat_field_2009'], ENT_QUOTES));
            $ebidat_field_percent = $this->db_connection->real_escape_string(strip_tags($_POST['ebidat_field_percent_2009'], ENT_QUOTES));
            $income_bef_fix_charges = $this->db_connection->real_escape_string(strip_tags($_POST['income_bef_fix_charges_2009'], ENT_QUOTES));
            $depreciation_field_calc = $this->db_connection->real_escape_string(strip_tags($_POST['depreciation_field_calc_2009'], ENT_QUOTES));
            $amortization_field_calc = $this->db_connection->real_escape_string(strip_tags($_POST['amortization_field_calc_2009'], ENT_QUOTES));
            $pbt_field = $this->db_connection->real_escape_string(strip_tags($_POST['pbt_field_2009'], ENT_QUOTES));
            $pbt_field_percent = $this->db_connection->real_escape_string(strip_tags($_POST['pbt_field_percent_2009'], ENT_QUOTES));
            $taxation_calc = $this->db_connection->real_escape_string(strip_tags($_POST['taxation_calc_2009'], ENT_QUOTES));
            $net_profit_loss = $this->db_connection->real_escape_string(strip_tags($_POST['net_profit_loss_2009'], ENT_QUOTES));
            $net_profit_loss_percent = $this->db_connection->real_escape_string(strip_tags($_POST['net_profit_loss_percent_2009'], ENT_QUOTES));
       * 
       */

//            
//            
//            
            $rooms_sales = $this->db_connection->real_escape_string(strip_tags($_POST['sales'], ENT_QUOTES));
            $room_sales_percentage = $this->db_connection->real_escape_string(strip_tags($_POST['sales_precentage'], ENT_QUOTES));
            $payroll_expense_calc = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_calc'], ENT_QUOTES));
            $other_expenses_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses_calc'], ENT_QUOTES));
            $total_expense = $this->db_connection->real_escape_string(strip_tags($_POST['total_expense'], ENT_QUOTES));
            $department_profit = $this->db_connection->real_escape_string(strip_tags($_POST['department_profit'], ENT_QUOTES));
            $department_profit_precentage = $this->db_connection->real_escape_string(strip_tags($_POST['department_profit_precentage'], ENT_QUOTES));
            $food_sales = $this->db_connection->real_escape_string(strip_tags($_POST['food_sales'], ENT_QUOTES));
            $food_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['food_sales_percent'], ENT_QUOTES));
            $beverage_sales = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_sales'], ENT_QUOTES));
            $beverage_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_sales_percent'], ENT_QUOTES));
            $fnb_other_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['fnb_other_income_percent'], ENT_QUOTES));
            $total_sales_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['total_sales_fnb'], ENT_QUOTES));
            $food_cost_calc = $this->db_connection->real_escape_string(strip_tags($_POST['food_cost_calc'], ENT_QUOTES));
            $beverage_cost_calc = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_cost_calc'], ENT_QUOTES));
            $other_income_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_income_fnb_calc'], ENT_QUOTES));
            $payroll_expense_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_fnb_calc'], ENT_QUOTES));
            $other_expenses_fnb_calc = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses_fnb_calc'], ENT_QUOTES));
            $dep_profit_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['dep_profit_fnb'], ENT_QUOTES));
            $dep_profit_fnb_percent = $this->db_connection->real_escape_string(strip_tags($_POST['dep_profit_fnb_percent'], ENT_QUOTES));
            $min_op_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sales_percent'], ENT_QUOTES));
            $min_op_cost_sales_calc = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_cost_sales_calc'], ENT_QUOTES));
            $min_op_dep_profit = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_dep_profit'], ENT_QUOTES));
            $min_op_dep_profit_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_dep_profit_percent'], ENT_QUOTES));
            $min_op_sports_sales_percentage = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_percentage'], ENT_QUOTES));
            $min_op_sports_sales_calc = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_calc'], ENT_QUOTES));
            $min_op_sports_sales_dep_profit = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_dep_profit'], ENT_QUOTES));
            $min_op_sports_sales_dep_profit_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_dep_profit_percent'], ENT_QUOTES));
            $rental_other_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['rental_other_income_percent'], ENT_QUOTES));
            $head_office_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['head_office_income_percent'], ENT_QUOTES));
            $total_sales_all_dep = $this->db_connection->real_escape_string(strip_tags($_POST['total_sales_all_dep'], ENT_QUOTES));
            $total_gross_income = $this->db_connection->real_escape_string(strip_tags($_POST['total_gross_income'], ENT_QUOTES));
            $total_gross_income_percent = $this->db_connection->real_escape_string(strip_tags($_POST['total_gross_income_percent'], ENT_QUOTES));
            $hotel_admin_general_calc = $this->db_connection->real_escape_string(strip_tags($_POST['hotel_admin_general_calc'], ENT_QUOTES));
            $local_sales_marketing_calc = $this->db_connection->real_escape_string(strip_tags($_POST['local_sales_marketing_calc'], ENT_QUOTES));
            $energy_costs_calc = $this->db_connection->real_escape_string(strip_tags($_POST['energy_costs_calc'], ENT_QUOTES));
            $repair_maintence_calc = $this->db_connection->real_escape_string(strip_tags($_POST['repair_maintence_calc'], ENT_QUOTES));
            $real_estate_taxes_calc = $this->db_connection->real_escape_string(strip_tags($_POST['real_estate_taxes_calc'], ENT_QUOTES));
            $admin_finance_ho_calc = $this->db_connection->real_escape_string(strip_tags($_POST['admin_finance_ho_calc'], ENT_QUOTES));
            $marketing_ho_calc = $this->db_connection->real_escape_string(strip_tags($_POST['marketing_ho_calc'], ENT_QUOTES));
            $management_fee_calc = $this->db_connection->real_escape_string(strip_tags($_POST['management_fee_calc'], ENT_QUOTES));
            $head_office_charges = $this->db_connection->real_escape_string(strip_tags($_POST['head_office_charges'], ENT_QUOTES));
            $ebidat_field = $this->db_connection->real_escape_string(strip_tags($_POST['ebidat_field'], ENT_QUOTES));
            $ebidat_field_percent = $this->db_connection->real_escape_string(strip_tags($_POST['ebidat_field_percent'], ENT_QUOTES));
            $income_bef_fix_charges = $this->db_connection->real_escape_string(strip_tags($_POST['income_bef_fix_charges'], ENT_QUOTES));
            $depreciation_field_calc = $this->db_connection->real_escape_string(strip_tags($_POST['depreciation_field_calc'], ENT_QUOTES));
            $amortization_field_calc = $this->db_connection->real_escape_string(strip_tags($_POST['amortization_field_calc'], ENT_QUOTES));
            $pbt_field = $this->db_connection->real_escape_string(strip_tags($_POST['pbt_field'], ENT_QUOTES));
            $pbt_field_percent = $this->db_connection->real_escape_string(strip_tags($_POST['pbt_field_percent'], ENT_QUOTES));
            $taxation_calc = $this->db_connection->real_escape_string(strip_tags($_POST['taxation_calc'], ENT_QUOTES));
            $net_profit_loss = $this->db_connection->real_escape_string(strip_tags($_POST['net_profit_loss'], ENT_QUOTES));
            $net_profit_loss_percent = $this->db_connection->real_escape_string(strip_tags($_POST['net_profit_loss_percent'], ENT_QUOTES));
            $branch_id = $_SESSION['branch_id'];
            $year = $_REQUEST['year'];
            $sql_year  = "SELECT id FROM `years` WHERE year  = ".$year ;
            $rs_year = $this->db_connection->query($sql_year);
            $year_id = $rs_year->fetch_object()->id; 
            
            $sql = "INSERT INTO `pnl` "
                   . "(`branch_id`, `year_id`, `rooms_dep_sales`, `rooms_dep_sales_precent`, `rm_payroll_expense_calc`, "
                    . "`rm_other_expenses_calc`, `rm_total_expense`, `rm_department_profit`, `rm_department_profit_precen`, "
                    . "`food_sales`, `food_sales_percent`, `beverage_sales`, `beverage_sales_percent`, `fnb_other_income_percent`, `total_sales_fnb`, "
                    . "`food_cost_calc`, `beverage_cost_calc`, `other_income_fnb_calc`, `payroll_expense_fnb_calc`, "
                    . "`other_expenses_fnb_calc`, `dep_profit_fnb`, `dep_profit_fnb_percent`, "
                    . "`min_op_sales_percent`, `min_op_cost_sales_calc`, `min_op_dep_profit`, `min_op_dep_profit_percent`, "
                    . "`min_op_sports_sales_percentage`, `min_op_sports_sales_calc`, `min_op_sports_sales_dep_profit`, `min_op_sports_sales_dep_profit_percent`, "
                    . "`rental_other_income_percent`, `head_office_income_percent`, `total_sales_all_dep`, `total_gross_income`, `total_gross_income_percent`, "
                    . "`hotel_admin_general_calc`, `local_sales_marketing_calc`, `energy_costs_calc`, `repair_maintence_calc`, `real_estate_taxes_calc`, `admin_finance_ho_calc`, "
                    . "`marketing_ho_calc`, `management_fee_calc`, `head_office_charges`, `ebidat_field`, `ebidat_field_percent`, `income_bef_fix_charges`, `depreciation_field_calc`, "
                    . "`amortization_field_calc`, `pbt_field`, `pbt_field_percent`, `taxation_calc`, `net_profit_loss`, `net_profit_loss_percent`) VALUES "
                   . "($branch_id,$year_id,'". $rooms_sales . "','". $room_sales_percentage . "',  '". $payroll_expense_calc . "' , '$other_expenses_calc' , "
                    . "'$total_expense',  '$department_profit', $department_profit_precentage  ,  
            $food_sales ,  
            $food_sales_percent  ,  
            $beverage_sales  ,  
            $beverage_sales_percent  ,  
            $fnb_other_income_percent ,  
            $total_sales_fnb  ,  
            $food_cost_calc  ,  
            $beverage_cost_calc ,  
            $other_income_fnb_calc  ,  
            $payroll_expense_fnb_calc  ,  
            $other_expenses_fnb_calc  ,  
            $dep_profit_fnb  ,  
            $dep_profit_fnb_percent ,  
            $min_op_sales_percent  ,  
            $min_op_cost_sales_calc  ,  
            $min_op_dep_profit  ,  
            $min_op_dep_profit_percent  ,  
            $min_op_sports_sales_percentage  ,  
            $min_op_sports_sales_calc  ,  
            $min_op_sports_sales_dep_profit ,  
            $min_op_sports_sales_dep_profit_percent ,  
            $rental_other_income_percent  ,  
            $head_office_income_percent  ,  
            $total_sales_all_dep  ,  
            $total_gross_income  ,  
            $total_gross_income_percent  ,  
            $hotel_admin_general_calc  ,  
            $local_sales_marketing_calc  ,  
            $energy_costs_calc  ,  
            $repair_maintence_calc  ,  
            $real_estate_taxes_calc  ,  
            $admin_finance_ho_calc  ,  
            $marketing_ho_calc  ,  
            $management_fee_calc  ,  
            $head_office_charges ,
            $ebidat_field  ,  
            $ebidat_field_percent  ,  
            $income_bef_fix_charges  ,  
            $depreciation_field_calc  ,  
            $amortization_field_calc  ,  
            $pbt_field  ,  
            $pbt_field_percent  ,  
            $taxation_calc  ,  
            $net_profit_loss  ,  
            $net_profit_loss_percent    "
                   . ")";
            //echo $sql; exit;
             $query_new_pnl = $this->db_connection->query($sql);
            if ($query_new_pnl) {
                $this->messages[] = "PNL Generated successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
        }
    }

    function getPnl_report() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $years = $this->getYears();
            $kpis = array();
            foreach ($years as $value)  {
                $sql = "SELECT * FROM `pnl` WHERE branch_id = ".$_SESSION['branch_id'] ." AND year_id = ".$value['id'];
                $query_get_kpi = $this->db_connection->query($sql);
                while ($data = $query_get_kpi->fetch_object()) {
                    $kpis[$value['year']] = $data;
                }
            }
            //print_r($_SESSION); exit;
            //$employees = $query_get_guest_employees->fetch_all();
            return $kpis;
        }
    }
    
    function getYears() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $year = $years = array();
            $sql = "SELECT * FROM `years` WHERE branch_id  = ".$_SESSION['branch_id'];
            $rs = $this->db_connection->query($sql);
            while ($row = $rs->fetch_assoc()) {
                   $year['id'] = $row['id'] ;
                   $year['year'] = $row['year'];
                   $years[] = $year;
            }
            return $years;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
    
    function checkPnlGenerated($year) {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql_year  = "SELECT id FROM `years` WHERE year  = ".$year ;
            $rs_year = $this->db_connection->query($sql_year);
            $year_id = $rs_year->fetch_object()->id; 
            $sql = "SELECT id FROM `pnl` WHERE branch_id  = ".$_SESSION['branch_id']." AND year_id = ".$year_id;
            //echo $sql."<br/>";
            $rs = $this->db_connection->query($sql);
            $rows_count = $this->db_connection->affected_rows;
            //$pnl_id = $rs_year->fetch_row();
            //echo $rows_count;
            if(!empty($rows_count)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
}

