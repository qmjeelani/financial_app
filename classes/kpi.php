<?php

/**
 * Class registration
 * handles the user registration
 */
class kpi {

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
        $this->getkpis();
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    function getkpis() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $years = $this->getYears();
            $kpis = array();
            foreach ($years as $value)  {
                $sql = "SELECT * FROM `kpi` WHERE branch_id = ".$_SESSION['branch_id'] ." AND year_id = ".$value['id'];
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
    
    function getKPIbyYear($year) {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $kpis_year = array();
            //print_r($_SESSION); exit;
            $year_sql = "SELECT * FROM `years` WHERE year = ".$year." AND branch_id = ".$_SESSION['branch_id'];
            $result_kpi_year = $this->db_connection->query($year_sql);
            $year_rec = $result_kpi_year->fetch_object();
            $year_id = $year_rec->id;
            $sql_year_based = "SELECT * FROM `kpi` WHERE branch_id = ".$_SESSION['branch_id'] ." AND year_id = ".$year_id;
            $query_get_kpi_y = $this->db_connection->query($sql_year_based);
            while ($data_year = $query_get_kpi_y->fetch_object()) {
                $kpis_year = $data_year;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $kpis_year;
        }
    }

    function savekpi() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $total_rooms = $this->db_connection->real_escape_string(strip_tags($_POST['total_rooms'], ENT_QUOTES));
            $no_of_days = $this->db_connection->real_escape_string(strip_tags($_POST['no_of_days'], ENT_QUOTES));
            $rooms_vailable = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_vailable'], ENT_QUOTES));
            $rooms_occupied = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_occupied'], ENT_QUOTES));
            $rooms_occupancy_precent = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_occupancy_precent'], ENT_QUOTES));
            $average_room_rate = $this->db_connection->real_escape_string(strip_tags($_POST['average_room_rate'], ENT_QUOTES));
            $total_covers_food = $this->db_connection->real_escape_string(strip_tags($_POST['total_covers_food'], ENT_QUOTES));
            $average_spend_food = $this->db_connection->real_escape_string(strip_tags($_POST['average_spend_food'], ENT_QUOTES));
            $average_spend_beverages = $this->db_connection->real_escape_string(strip_tags($_POST['average_spend_beverages'], ENT_QUOTES));
            $total_average_spend = $this->db_connection->real_escape_string(strip_tags($_POST['total_average_spend'], ENT_QUOTES));
            $total_payroll = $this->db_connection->real_escape_string(strip_tags($_POST['total_payroll'], ENT_QUOTES));
            $total_number_of_employees = $this->db_connection->real_escape_string(strip_tags($_POST['total_number_of_employees'], ENT_QUOTES));
            $precentage_revenue = $this->db_connection->real_escape_string(strip_tags($_POST['precentage_revenue'], ENT_QUOTES));
            $id = $_REQUEST['kpi_rec_id'];
            $branch_id = $_REQUEST['kpi_branch_id'];

            $sql = "UPDATE kpi SET total_rooms ='" . $total_rooms . "' , "
                    . "no_of_days =  '$no_of_days' , "
                    . "rooms_vailable = '$rooms_vailable', "
                    . "rooms_occupied = '$rooms_occupied', "
                    . "rooms_occupancy_precent = '$rooms_occupancy_precent', "
                    . "average_room_rate = '$average_room_rate', "
                    . "total_covers_food = '$total_covers_food', "
                    . "average_spend_food = '$average_spend_food', "
                    . "average_spend_beverages = '$average_spend_beverages', "
                    . "total_average_spend = '$total_average_spend', "
                    . "total_payroll = '$total_payroll', "
                    . "total_number_of_employees = '$total_number_of_employees', "
                    . "precentage_revenue = '$precentage_revenue' "
                    . "WHERE id = ".$id." AND branch_id = ".$branch_id;
            //echo $sql; exit;
            $query_new_user_update = $this->db_connection->query($sql);
            if ($query_new_user_update) {
                $this->messages[] = "KPI's updated successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
            //$employees = $query_get_guest_employees->fetch_all();
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
    
    function addkpi() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $year_post = $this->db_connection->real_escape_string(strip_tags($_POST['kpi_year'], ENT_QUOTES));
            $total_rooms = $this->db_connection->real_escape_string(strip_tags($_POST['total_rooms'], ENT_QUOTES));
            $no_of_days = $this->db_connection->real_escape_string(strip_tags($_POST['no_of_days'], ENT_QUOTES));
            $rooms_vailable = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_vailable'], ENT_QUOTES));
            $rooms_occupied = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_occupied'], ENT_QUOTES));
            $rooms_occupancy_precent = $this->db_connection->real_escape_string(strip_tags($_POST['rooms_occupancy_precent'], ENT_QUOTES));
            $average_room_rate = $this->db_connection->real_escape_string(strip_tags($_POST['average_room_rate'], ENT_QUOTES));
            $total_covers_food = $this->db_connection->real_escape_string(strip_tags($_POST['total_covers_food'], ENT_QUOTES));
            $average_spend_food = $this->db_connection->real_escape_string(strip_tags($_POST['average_spend_food'], ENT_QUOTES));
            $average_spend_beverages = $this->db_connection->real_escape_string(strip_tags($_POST['average_spend_beverages'], ENT_QUOTES));
            $total_average_spend = $this->db_connection->real_escape_string(strip_tags($_POST['total_average_spend'], ENT_QUOTES));
            $total_payroll = $this->db_connection->real_escape_string(strip_tags($_POST['total_payroll'], ENT_QUOTES));
            $total_number_of_employees = $this->db_connection->real_escape_string(strip_tags($_POST['total_number_of_employees'], ENT_QUOTES));
            $precentage_revenue = $this->db_connection->real_escape_string(strip_tags($_POST['precentage_revenue'], ENT_QUOTES));
            $branch_id = $_REQUEST['kpi_branch_id'];
            
           $year_id =  $this->addyear($year_post);
            
           
           $sql = "INSERT INTO `kpi` "
                   . "(branch_id, year_id, total_rooms, no_of_days, rooms_vailable, rooms_occupied, rooms_occupancy_precent,"
                   . "average_room_rate, total_covers_food, average_spend_food, average_spend_beverages, total_average_spend,"
                   . "total_payroll, total_number_of_employees, precentage_revenue) VALUES "
                   . "('". $branch_id . "','". $year_id . "',  '". $total_rooms . "' , '$no_of_days' , '$rooms_vailable',  '$rooms_occupied', "
                   . " '$rooms_occupancy_precent', '$average_room_rate', '$total_covers_food', "
                   . " '$average_spend_food',  '$average_spend_beverages', '$total_average_spend', "
                   . " '$total_payroll', '$total_number_of_employees',  '$precentage_revenue' "
                   . ")";
            $query_new_kpi = $this->db_connection->query($sql);
            if ($query_new_kpi) {
                $this->messages[] = "KPI's added successfully. ";
            } else {
                $this->errors[] = "Uncountered error occured";
            }
            //$employees = $query_get_guest_employees->fetch_all();
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
    
    function addyear($year) {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql = "INSERT INTO `years` (year, branch_id) VALUES ('$year', ".$_SESSION['branch_id']." )";
            $rs_insert = $this->db_connection->query($sql);
            $year_id = $this->db_connection->insert_id;
            return $year_id;
        } else {
            $this->errors[] = "Sorry, no database connection.";
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
    function getNextYears() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $year = $years = array();
            $sql = "SELECT year FROM `years` WHERE branch_id  = ".$_SESSION['branch_id']." ORDER BY `years`.`id` DESC LIMIT 0, 1";
            $rs = $this->db_connection->query($sql);
            $last_year = $rs->fetch_object()->year; 
            $select = "";
            $select = "<select size='1' class='form-control' id='kpi_year' name='kpi_year' aria-controls='example-table'>"
                    . "<option value='".($last_year+1)."' >".($last_year+1)."</option>"
                    . "<option value='".($last_year+1)."' >".($last_year+2)."</option>"
                    . "<option value='".($last_year+1)."' >".($last_year+3)."</option>"
                    . "<option value='".($last_year+1)."' >".($last_year+4)."</option>"
                    . "<option value='".($last_year+1)."' >".($last_year+5)."</option>"
                    . "</select> ";
            return $select;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
    function getLatestKpi() {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $kpis_year = array();
            //print_r($_SESSION); exit;
            $sql = "SELECT id FROM `years` WHERE branch_id  = ".$_SESSION['branch_id']." ORDER BY `years`.`id` DESC LIMIT 0, 1";
            $rs = $this->db_connection->query($sql);
            $year_id = $rs->fetch_object()->id; 
            $sql_year_based = "SELECT * FROM `kpi` WHERE branch_id = ".$_SESSION['branch_id'] ." AND year_id = ".$year_id;
            $query_get_kpi_y = $this->db_connection->query($sql_year_based);
            while ($data_year = $query_get_kpi_y->fetch_object()) {
                $latest_kpis = $data_year;
            }
            //$employees = $query_get_guest_employees->fetch_all();
            return $latest_kpis;
        }
    }
}

