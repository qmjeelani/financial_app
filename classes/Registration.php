<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration {

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
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser() {
        //session_destroy();
        if (empty($_POST['firstname'])) {
            $this->errors[] = "Empty First Name";
        } elseif (empty($_POST['lastname'])) {
            $this->errors[] = "Empty Last Name";
        } elseif (empty($_POST['user_phone'])) {
            $this->errors[] = "Phone cannot be empty";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } elseif (!empty($_POST['firstname']) && !empty($_POST['user_phone']) && strlen($_POST['user_email']) <= 64 && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = $this->db_connection->real_escape_string(strip_tags($_POST['firstname'], ENT_QUOTES));
                $lastname = $this->db_connection->real_escape_string(strip_tags($_POST['lastname'], ENT_QUOTES));
                $user_phone = $this->db_connection->real_escape_string(strip_tags($_POST['user_phone'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));
                $address = $this->db_connection->real_escape_string(strip_tags($_POST['address'], ENT_QUOTES));
                $country_code = $this->db_connection->real_escape_string(strip_tags($_POST['country'], ENT_QUOTES));
                $city = $this->db_connection->real_escape_string(strip_tags($_POST['city'], ENT_QUOTES));
                //$state = $this->db_connection->real_escape_string(strip_tags($_POST['state'], ENT_QUOTES));
                $zip = $this->db_connection->real_escape_string(strip_tags($_POST['zip'], ENT_QUOTES));
                $company = $this->db_connection->real_escape_string(strip_tags($_POST['user_company'], ENT_QUOTES));

                $user_password = $this->getRandomPassword();

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
//                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
                // check if user or email address already exists
                $sql = "SELECT * FROM employees WHERE phone = '" . $user_phone . "' OR email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);
                //var_dump($query_check_user_name);
                if ($query_check_user_name->num_rows > 0) {
                    /*$_SESSION['fname'] = $firstname;
                    $_SESSION['lname'] = $lastname;
                    $_SESSION['phone'] = $user_phone;
                    $_SESSION['email'] = $user_email;
                    $_SESSION['address'] = $address;
                    $_SESSION['country'] = $country_code;
                    $_SESSION['city'] = $city;*/
                    $this->errors[] = "Sorry, that phone / email address is already taken.";
                } else {
                    // write new user's data into database
                    $now = date("Y-m-d H-i-s", time());
                    $franchise_sql = "INSERT INTO franchises (logo, packageid, isactivated, isdeleted, createdon, createdby, isdemo, company) VALUES (1,1,1,0,'$now', 0, 1, '" . $company . "')";
                    $query_franchise = $this->db_connection->query($franchise_sql);
                    $franchise_id = $this->db_connection->insert_id;
                    $manager_role_sql = "INSERT INTO role (name,franchiseid) VALUES ('Manager',$franchise_id) ";
                    $manager_role_insert = $this->db_connection->query($manager_role_sql);
                    $manager_role_id  =  $this->db_connection->insert_id;
                    $managers_modules = "SELECT id, name From modules";
                    $query_manag_modules = $this->db_connection->query($managers_modules);
                    while ($row = $query_manag_modules->fetch_assoc() ) {
                         $sql = "INSERT INTO rolemodules (roleid,moduleid,isallow,franchiseid) VALUES ($manager_role_id,".$row['id'].",1,".$franchise_id.")";
                         $rolemodule_insert = $this->db_connection->query($sql);
                    }
                    $reception_role_sql = "INSERT INTO role (name,franchiseid) VALUES ('Receptionist',$franchise_id) ";
                    $reception_role_insert = $this->db_connection->query($reception_role_sql);
                    $reception_role_id  =  $this->db_connection->insert_id;
                    $reception_modules = "SELECT id, name  FROM `modules` WHERE `name` LIKE '%dashboard%' OR  `name` LIKE '%schedule%' OR  `name` LIKE '%booking%'";
                    $query_recep_modules = $this->db_connection->query($reception_modules);
                    while ($row = $query_recep_modules->fetch_assoc() ) {
                         $sql_recep = "INSERT INTO rolemodules (roleid,moduleid,isallow,franchiseid) VALUES ($reception_role_id,".$row['id'].",1,".$franchise_id.")";
                         $rolemodule_insert_recep = $this->db_connection->query($sql_recep);
                    }
                    $sql = "INSERT INTO employees (firstname, lastname, phone, email, password, address, country, city, zip, isnew,franchiseid, isfranchise, isactivated)
                            VALUES('" . $firstname . "','" . $lastname . "','" . $user_phone . "','" . $user_email . "','" . $user_password . "', '" . $address . "', '" . $country_code . "', '" . $city . "', '" . $zip . "' ,1,$franchise_id, 1, 1);";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    $employee_id = $this->db_connection->insert_id;
                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->send_email_registration($employee_id);
                        /* $this->messages[] = "Thank you for registering. Your request for an account is currently pending approval. "
                          . "Once it has been approved, you will receive another e-mail containing information about how to log in, set your password, and other details."; */
                        $this->messages[] = "Thank you for registering. Email has been sent containing information about how to log in, your password, and other details. ";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }

    private function getRandomPassword() {
        $acceptablePasswordChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.$@#&0123456789";
        $randomPassword = "";

        for ($i = 0; $i < 8; $i++) {
            $randomPassword .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);
        }
        return $randomPassword;
    }

    function getcountries() {
        // create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            // escaping, additionally removing everything that could be (html/javascript-) code
            $countries = "";
            $sql = "SELECT Code,Name FROM data_adres_country";
            $query_country = $this->db_connection->query($sql);
            while ($country = $query_country->fetch_assoc()) {
                $countries.="<option value='" . $country["Code"] . "'>" . $country["Name"] . "</option>";
            }
            return $countries;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

    function getstates($country) {
        // create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $output = "";
            $output .= "state_options.push(new Option('Choose State', ''));\n";
            $sql_state = "SELECT DISTINCT District FROM data_adres_city WHERE CountryCode='" . $country . "'";
            $query_state = $this->db_connection->query($sql_state);
            while ($state = $query_state->fetch_assoc()) {
                //$output.="<option value='".$state["Code"]."'>".$state["Name"]."</option>";
                $output .= "state_options.push(new Option('" . $state["District"] . "', '" . $state["District"] . "'));\n";
            }
            return $output;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

    function getcities($state) {
        // create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $output = "";
            $output .= "city_options.push(new Option('Choose City', ''));\n";
            $xqs_12 = "SELECT ID,Name FROM data_adres_city WHERE District='" . $state . "'";
            $query_city = $this->db_connection->query($xqs_12);
            while ($city = $query_city->fetch_assoc()) {
                $output .= "city_options.push(new Option('" . $city["Name"] . "', '" . $city["ID"] . "'));\n";
            }
            return $output;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

    function getcitiesbycountry($country) {
        // create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $output = "";
            $output .= "city_options.push(new Option('Choose City', ''));\n";
            $xqs_12 = "SELECT ID,Name FROM data_adres_city WHERE CountryCode='" . $country . "'";
            $query_city = $this->db_connection->query($xqs_12);
            while ($city = $query_city->fetch_assoc()) {
                $output .= "city_options.push(new Option('" . $city["Name"] . "', '" . $city["ID"] . "'));\n";
            }
            return $output;
        } else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }

    private function send_email_registration($id) {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $id = $this->db_connection->real_escape_string($id);
            $sql = "SELECT * FROM employees WHERE id = $id ";
            $query_get_guest_employees = $this->db_connection->query($sql);
            $employee = $query_get_guest_employees->fetch_assoc();
            $name = $employee['firstname'] . " " . $employee['lastname'];
            $phone = $employee['phone'];
            $password = $employee['password'];
            $email = $employee['email'];
            $status = $employee['isactivated'];
        }
        if ($status == 1) {
            $msg = "Dear $name<br/> 
                        Your account has been registered.<br/>
                        You may now log in by clicking this link or copying and pasting it into your browser:<br/>
                        <a href='http://outsourced.dk/' target='_blank'>Saloon - A franchise solution</a><br/>
                        You will be able to log in using:<br/>
                        username: $phone<br/>
                        password: $password<br/><br/>"
                    . "-Saloon Team";
        } else {
            $msg = "Dear $name\n Your account has been deactivated.\n\n";
        }


// use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);
//echo "<pre>";
//print_r($msg);
//print_r($email);
//echo "</pre>";
//exit;
// send email
        $headers = "From: info@outsourced.dk \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8 \r\n";
        mail($email, "Account details for $name", $msg, $headers);
    }

}
