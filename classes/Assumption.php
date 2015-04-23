<?php

/**
 * Class registration
 * handles the user registration
 */
class Assumption {

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
        $this->getAssumptions();
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    function getAssumptions() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            //echo $_SESSION['branch_id']; echo $_REQUEST['id']; exit;
            $sql = "SELECT * FROM `assumptions` WHERE branch_id = ".$_SESSION['branch_id'] ." AND year_id = 1";
            $query_get_assumptions = $this->db_connection->query($sql);
            while ($data = $query_get_assumptions->fetch_object()) {
                $assumptions = $data;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $assumptions;
        }
    }
    function getAssumptionsbyYear() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            //echo $_SESSION['branch_id']; echo $_REQUEST['id']; exit;
            $year_sql = "SELECT * FROM `years` WHERE year = ".$year;
            $result_kpi_year = $this->db_connection->query($year_sql);
            $year_rec = $result_kpi_year->fetch_object();
            $year_id = $year_rec->id;
            $sql = "SELECT * FROM `assumptions` WHERE branch_id = ".$_SESSION['branch_id'] ."  AND year_id = ".$year_id;
            $query_get_assumptions = $this->db_connection->query($sql);
            while ($data = $query_get_assumptions->fetch_object()) {
                $assumptions = $data;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $assumptions;
        }
    }

    function saveAssumptions() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $inflation_rate = $this->db_connection->real_escape_string(strip_tags($_POST['inflation_rate'], ENT_QUOTES));
            $increase_food_covers = $this->db_connection->real_escape_string(strip_tags($_POST['increase_food_covers'], ENT_QUOTES));
            $employees_increase_no = $this->db_connection->real_escape_string(strip_tags($_POST['employees_increase_no'], ENT_QUOTES));
            $occupancy_increase = $this->db_connection->real_escape_string(strip_tags($_POST['occupancy_increase'], ENT_QUOTES));
            $arr_increase = $this->db_connection->real_escape_string(strip_tags($_POST['arr_increase'], ENT_QUOTES));
            $food_cost = $this->db_connection->real_escape_string(strip_tags($_POST['food_cost'], ENT_QUOTES));
            $beverage_cost = $this->db_connection->real_escape_string(strip_tags($_POST['beverage_cost'], ENT_QUOTES));
            $mod_cost_of_sale = $this->db_connection->real_escape_string(strip_tags($_POST['mod_cost_of_sale'], ENT_QUOTES));
            $permit_room_cost_sale = $this->db_connection->real_escape_string(strip_tags($_POST['permit_room_cost_sale'], ENT_QUOTES));
            $sports_recreation_cost_sale = $this->db_connection->real_escape_string(strip_tags($_POST['sports_recreation_cost_sale'], ENT_QUOTES));
            $interestbank_loan= $this->db_connection->real_escape_string(strip_tags($_POST['interestbank_loan'], ENT_QUOTES));
            $depreciation = $this->db_connection->real_escape_string(strip_tags($_POST['depreciation'], ENT_QUOTES));
            $taxation = $this->db_connection->real_escape_string(strip_tags($_POST['taxation'], ENT_QUOTES));
            $amortization = $this->db_connection->real_escape_string(strip_tags($_POST['amortization'], ENT_QUOTES));
            $wealth_tax = $this->db_connection->real_escape_string(strip_tags($_POST['wealth_tax'], ENT_QUOTES));
            $deferred_tax = $this->db_connection->real_escape_string(strip_tags($_POST['deferred_tax'], ENT_QUOTES));
            $id = $_POST['assumption_rec_id'];
            $branch_id = $_SESSION['branch_id'];

            $sql = "UPDATE assumptions SET "
                    . "inflation_rate =  '$inflation_rate' , "
                    . "increase_food_covers = '$increase_food_covers', "
                    . "employees_increase_no = '$employees_increase_no', "
                    . "occupancy_increase = '$occupancy_increase', "
                    . "arr_increase = '$arr_increase', "
                    . "food_cost = '$food_cost', "
                    . "beverage_cost = '$beverage_cost', "
                    . "mod_cost_of_sale = '$mod_cost_of_sale', "
                    . "permit_room_cost_sale = '$permit_room_cost_sale', "
                    . "sports_recreation_cost_sale = '$sports_recreation_cost_sale', "
                    . "interestbank_loan = '$interestbank_loan', "
                    . "depreciation = '$depreciation', "
                    . "taxation = '$taxation', "
                    . "amortization = '$amortization', "
                    . "wealth_tax = '$wealth_tax', "
                    . "deferred_tax = '$deferred_tax' "
                    . "WHERE branch_id = $branch_id";
            $query_new_user_update = $this->db_connection->query($sql);
            if ($query_new_user_update) {
                $this->messages[] = "Assumptions updated successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
            //$employees = $query_get_guest_employees->fetch_all();
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

}
