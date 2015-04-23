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
            $sql = "SELECT * FROM `heads` WHERE branch_id = ".$_SESSION['branch_id'];
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
            $year_sql = "SELECT * FROM `years` WHERE year = ".$year;
            $result_kpi_year = $this->db_connection->query($year_sql);
            $year_rec = $result_kpi_year->fetch_object();
            $year_id = $year_rec->id;
            $sql = "SELECT hv.* FROM `heads_values` hv
                    INNER JOIN heads ON heads.id = hv.head_id
                    WHERE hv.head_id = '$headid' AND heads.branch_id = ".$_SESSION['branch_id']. " AND hv.year_id = ".$year_id;
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
            $sql = "SELECT `name` FROM `branches` WHERE id = ".$id;
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
                $branch[$data->id] =$data->name;
            }
                    
            //$employees = $query_get_guest_employees->fetch_all();
            return $branch;
        }
    }


}

