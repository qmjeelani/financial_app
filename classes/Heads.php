<?php

/**
 * Class registration
 * handles the user registration
 */
class Heads {

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
        //$this->getHeads();
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    function getHeads() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT * FROM `heads` WHERE branch_id = " . $_SESSION['branch_id'];
            $query_get_kpi = $this->db_connection->query($sql);
            while ($data = $query_get_kpi->fetch_object()) {
                $heads[] = $data;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $heads;
        }
    }

    function getHeadValues($headid, $year) {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $heads_att = array();
            $year_sql = "SELECT * FROM `years` WHERE year = " . $year;
            $result_kpi_year = $this->db_connection->query($year_sql);
            $year_rec = $result_kpi_year->fetch_object();
            $year_id = $year_rec->id;
            $sql = "SELECT hv.* FROM `heads_values` hv
                    INNER JOIN heads ON heads.id = hv.head_id
                    WHERE hv.head_id = '$headid' AND heads.branch_id = " . $_SESSION['branch_id'] . " AND hv.year_id = " . $year_id;
            //$sql = "SELECT * FROM `heads_values` WHERE head_id =  ".$headid." AND branch_id = ". ;
            $query_get_att = $this->db_connection->query($sql);
            while ($data = $query_get_att->fetch_object()) {
                $heads_att[] = $data;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $heads_att;
        }
    }

    function getbranchbyid($id) {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT `name` FROM `branches` WHERE id = " . $id;
            $query_get_kpi = $this->db_connection->query($sql);
            $name = $query_get_kpi->fetch_object();

            //$employees = $query_get_guest_employees->fetch_all();
            return $name;
        }
    }

    function getbranches() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT id, name FROM `branches`";
            $query_get_att = $this->db_connection->query($sql);
            while ($data = $query_get_att->fetch_object()) {
                //$branches['id'] = $data->id;
                //$branches['name'] = $data->name;
                $branch[$data->id] = $data->name;
            }

            //$employees = $query_get_guest_employees->fetch_all();
            return $branch;
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
            $sql = "SELECT * FROM `years` WHERE branch_id  = " . $_SESSION['branch_id'];
            $rs = $this->db_connection->query($sql);
            while ($row = $rs->fetch_assoc()) {
                $year['id'] = $row['id'];
                $year['year'] = $row['year'];
                $years[] = $year;
            }
            return $years;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

    function getHeadValuesNew($headid) {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $heads_att = array();
            $years = $this->getYears();
            foreach ($years as $value) {
                //$year_sql = "SELECT * FROM `years` WHERE year = ".$value['year'];
                //$result_kpi_year = $this->db_connection->query($year_sql);
                ///$year_rec = $result_kpi_year->fetch_object();
                $year_id = $value['id'];
                $sql = "SELECT hv.* FROM `heads_values` hv
                    INNER JOIN heads ON heads.id = hv.head_id
                    WHERE hv.head_id = '$headid' AND heads.branch_id = " . $_SESSION['branch_id'] . " AND hv.year_id = " . $year_id;
                //$sql = "SELECT * FROM `heads_values` WHERE head_id =  ".$headid." AND branch_id = ". ;
                $query_get_att = $this->db_connection->query($sql);
                while ($data = $query_get_att->fetch_object()) {
                    $heads_att[$value['year']][] = $data;
                }
            }

            //$employees = $query_get_guest_employees->fetch_all();
            return $heads_att;
        }
    }
    
    
    function saveHeadValues() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            
            $payroll_expense_percent = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_percent'], ENT_QUOTES));
            $other_expenses = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses'], ENT_QUOTES));
            $fnb_other_income = $this->db_connection->real_escape_string(strip_tags($_POST['fnb_other_income'], ENT_QUOTES));
            $food_cost_percent = $this->db_connection->real_escape_string(strip_tags($_POST['food_cost_percent'], ENT_QUOTES));
            $beverage_cost_percent = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_cost_percent'], ENT_QUOTES));
            $other_income_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['other_income_fnb'], ENT_QUOTES));
            $payroll_expense_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['payroll_expense_fnb'], ENT_QUOTES));
            $other_expenses_fnb = $this->db_connection->real_escape_string(strip_tags($_POST['other_expenses_fnb'], ENT_QUOTES));
            $min_op_sales = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sales'], ENT_QUOTES));
            $min_op_cost_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_cost_sales_percent'], ENT_QUOTES));
            $min_op_sports_sales = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales'], ENT_QUOTES));
            $min_op_sports_sales_percent = $this->db_connection->real_escape_string(strip_tags($_POST['min_op_sports_sales_percent'], ENT_QUOTES));
            $rental_other_income = $this->db_connection->real_escape_string(strip_tags($_POST['rental_other_income'], ENT_QUOTES));
            $head_office_income = $this->db_connection->real_escape_string(strip_tags($_POST['head_office_income'], ENT_QUOTES));
            $hotel_admin_general = $this->db_connection->real_escape_string(strip_tags($_POST['hotel_admin_general'], ENT_QUOTES));
            $local_sales_marketing = $this->db_connection->real_escape_string(strip_tags($_POST['local_sales_marketing'], ENT_QUOTES));
            $energy_costs = $this->db_connection->real_escape_string(strip_tags($_POST['energy_costs'], ENT_QUOTES));
            $repair_maintence = $this->db_connection->real_escape_string(strip_tags($_POST['repair_maintence'], ENT_QUOTES));
            $real_estate_taxes = $this->db_connection->real_escape_string(strip_tags($_POST['real_estate_taxes'], ENT_QUOTES));
            $admin_finance_ho = $this->db_connection->real_escape_string(strip_tags($_POST['admin_finance_ho'], ENT_QUOTES));
            $marketing_ho = $this->db_connection->real_escape_string(strip_tags($_POST['marketing_ho'], ENT_QUOTES));
            $management_fee = $this->db_connection->real_escape_string(strip_tags($_POST['management_fee'], ENT_QUOTES));
            $year = $_REQUEST['kpi_year'];
            $branch_id = $_REQUEST['kpi_branch_id'];

            $sql_year = "SELECT id FROM `years` WHERE year  = " . $year;
            $rs_year = $this->db_connection->query($sql_year);
            $year_id = $rs_year->fetch_object()->id;

            $all_heads = $this->getHeads();
            foreach ($all_heads as $value) {
                $head_id = $value->id;
                $head_name = $value->name;
                $head_values = $this->getHeadValues($head_id, $year);
                /*echo "<pre>";
                print_r($head_values);
                echo "</pre>";
                exit;*/
                foreach ($head_values as $key => $val) {
                    //echo $key;
                    if ($val->attribute == 'Payroll & Related Expenses' && $head_name == 'Rooms Department') {
                        $value = $payroll_expense_percent;
                    } else if ($val->attribute == 'Other Expenses' && $head_name == 'Rooms Department') {
                        $value = $other_expenses;
                    } else if ($val->attribute == 'Other Income' && $head_name == 'Food & Beverage Department') {
                        $value = $fnb_other_income;
                    } else if ($val->attribute == 'Food Cost' && $head_name == 'Food & Beverage Department') {
                        $value = $food_cost_percent;
                    } else if ($val->attribute == 'Beverage Cost' && $head_name == 'Food & Beverage Department') {
                        $value = $beverage_cost_percent;
                    } else if ($val->attribute == 'Other Expenses' && $head_name == 'Food & Beverage Department') {
                        $value = $other_income_fnb;
                    } else if ($val->attribute == 'Payroll & Related Expenses' && $head_name == 'Food & Beverage Department') {
                        $value = $payroll_expense_fnb;
                    } else if ($val->attribute == 'Other Expenses' && $head_name == 'Food & Beverage Department') {
                        $value = $other_expenses_fnb;
                    } else if ($val->attribute == 'Sales' && $head_name == 'Minor Operating Department') {
                        $value = $min_op_sales;
                    } else if ($val->attribute == 'Cost of Sales' && $head_name == 'Minor Operating Department') {
                        $value = $min_op_cost_sales_percent;
                    } else if ($val->attribute == 'Sports & Recreation Sales' && $head_name == 'Minor Operating Department') {
                        $value = $min_op_sports_sales;
                    } else if ($val->attribute == 'Sports & Recreation Expenses' && $head_name == 'Minor Operating Department') {
                        $value = $min_op_sports_sales_percent;
                    } else if ($val->attribute == 'Rental & Other Income' && $head_name == 'Minor Operating Department') {
                        $value = $rental_other_income;
                    } else if ($val->attribute == 'Head Office Income' && $head_name == 'Minor Operating Department') {
                        $value = $head_office_income;
                    } else if ($val->attribute == 'Hotel Admin & General' && $head_name == 'Undistributed Operating Expenses') {
                        $value = $hotel_admin_general;
                    } else if ($val->attribute == 'Local Sales & Marketing' && $head_name == 'Undistributed Operating Expenses') {
                        $value = $local_sales_marketing;
                    } else if ($val->attribute == 'Energy Costs' && $head_name == 'Undistributed Operating Expenses') {
                        $value = $energy_costs;
                    } else if ($val->attribute == 'Repair & Maintenance' && $head_name == 'Undistributed Operating Expenses') {
                        $value = $repair_maintence;
                    } else if ($val->attribute == 'Real Estate Taxes/ Insurance' && $head_name == 'Undistributed Operating Expenses') {
                        $value = $real_estate_taxes;
                    } else if ($val->attribute == 'Admin & Finance' && $head_name == 'Head Office Charges') {
                        $value = $admin_finance_ho;
                    } else if ($val->attribute == 'Marketing' && $head_name == 'Head Office Charges') {
                        $value = $marketing_ho;
                    } else if ($val->attribute == 'Management Fee' && $head_name == 'Head Office Charges') {
                        $value = $management_fee;
                    } else {
                        $value = '';
                    }
                    if(!empty($value)) {
                        $sql_update = "UPDATE heads_values SET value ='" . $value . "' WHERE `head_id` = $head_id AND year_id = $year_id AND attribute = '" . $val->attribute . "' ";
                        //echo $sql_update."<br/>";
                        $query_update = $this->db_connection->query($sql_update);
                    }
                }
            }
            if ($query_update) {
                $this->messages[] = "Heads updated successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
            //$employees = $query_get_guest_employees->fetch_all();
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
    
    function addHeadValues() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            
            $sql_year = "SELECT id, year FROM `years` WHERE branch_id  = ".$_SESSION['branch_id']." ORDER BY `years`.`id` DESC LIMIT 0, 1";
            $rs_year = $this->db_connection->query($sql_year);
            $year_rec = $rs_year->fetch_row(); 
            $year_id = $year_rec[0];
            $sql_q = "SELECT y.year FROM `heads_values` hv
                INNER JOIN heads h ON h.id  = hv.head_id
                INNER JOIN years y ON hv.year_id = y.id
                WHERE h.branch_id = 1 ORDER BY `hv`.`year_id`  DESC LIMIT 0 , 1";
            $rs_y = $this->db_connection->query($sql_q);
            $year = $rs_y->fetch_object()->year; 
            $all_heads = $this->getHeads();
            foreach ($all_heads as $value) {
                $head_id = $value->id;
                $head_name = $value->name;
                $head_values = $this->getHeadValues($head_id, $year);
                foreach ($head_values as $key => $val) {
                    $sql_insert = "INSERT INTO heads_values (`head_id`, `attribute`, `value`, `expense`, `year_id`) "
                        . "VALUES ($head_id, '$val->attribute', $val->value, $val->expense,  $year_id)";
                        $query_insert = $this->db_connection->query($sql_insert);
                }
            }
            if ($query_insert) {
                $this->messages[] = "Head Values Inserted successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
            //$employees = $query_get_guest_employees->fetch_all();
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

}
