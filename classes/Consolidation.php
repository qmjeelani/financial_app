<?php

/**
 * Class registration
 * handles the user registration
 */
class Consolidation {

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
        $this->getattributes();
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    function getattributes() {

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $attribute = array();
            $sum_attribute = array();
            $sql = "SELECT * FROM `consolidated_attributes` ";
            $query_get_attributes = $this->db_connection->query($sql);
            while ($data = $query_get_attributes->fetch_assoc()) {
                //$attribute[] = $data;
                $attribute[$data['attribute']][] = $data['value'];
            }
            //print_r($attribute);
            foreach ($attribute as $key => $value) {
              //  print_r( $attribute[$key] );
                $sum_attribute[$key] = array_sum($attribute[$key]);
               // echo $key;
//                foreach ($key as $key_n => $val) {
//                    $sum_attribute[$key] =+ $val;
//                }
            }
            //print_r($sum_attribute); exit;
            return $sum_attribute;
        }
    }

}

