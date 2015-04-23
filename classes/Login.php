<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);
                $password = $this->db_connection->real_escape_string($_POST['user_password']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT uid,name, mail
                        FROM users
                        WHERE mail = '" . $user_name . "' and  pass = '" . $password . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    
                    $result_row = $result_of_login_check->fetch_object();
                    $dep_sql = "SELECT branch_id FROM users_branches WHERE uid = ".$result_row->uid;
                    $result_dep_id = $this->db_connection->query($dep_sql);
                    $dep_rec = $result_dep_id->fetch_object();
                    $branch_id = $dep_rec->branch_id;
                    $branch_sql = "SELECT name FROM branches WHERE id = ".$branch_id;
                    $result_branch = $this->db_connection->query($branch_sql);
                    $branch_rec = $result_branch->fetch_object();
                    $branch_name = $branch_rec->name;
                    $role = $this->getUserRole($result_row->uid);
                    $_SESSION['role'][] = $role;
                    $_SESSION['uid'] = $result_row->uid;
                                $_SESSION['name'] = $result_row->name;
                                $_SESSION['user_email'] = $result_row->mail;
                                 $_SESSION['user_login_status'] = 1;
                        if($role == 'Super User') {
                                $_SESSION['branch_id'] = 'All Branches';
                                $_SESSION['branch_name'] = 'Consolidated';
                                $_SESSION['user_login_status'] = 1;
                        } else {
                            $_SESSION['branch_id'] = $branch_id;
                            $_SESSION['branch_name'] = $branch_name;
                        }
                        // write user data into PHP SESSION (a file on your server)
                        

                } else {
                    $this->errors[] = "Wrong email or password. Try again";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    
     /**
     * Get User Role
     */
    public function getUserRole($uid)
    {
        // delete the session of the user
        // return a little feeedback message
        $rid_sql  = "SELECT r.name  FROM `role` r INNER JOIN users_roles ur ON ur.rid = r.rid WHERE ur.`uid` = ".$uid; 
        $result_rid = $this->db_connection->query($rid_sql);
        $rid_rec = $result_rid->fetch_object();
        $role_name = $rid_rec->name;
        return $role_name;
    }
    
    
    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
