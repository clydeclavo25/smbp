<?php
class Db
{
    /**
     * Database Variables
     */
    protected $host;
    protected $db_name;
    protected $db_username;
    protected $db_password;

    public function __construct() {
        $this->host = 'localhost'; //Host Name
        $this->db_name = 'db_smbpp'; //Database Name
        $this->db_username = 'root'; //Database Username
        $this->db_password = ''; //Database Password

    }
    

    /**
     * Returns the database connection
     */

    public function connect() {
        try {
            $pdo = new PDO('mysql:host='. $this->host .';dbname='.$this->db_name, $this->db_username, $this->db_password);
            return $pdo;
        }   catch (PDOException $e) {
            exit('Error Connecting To Database <br>'.$e);
        }
    }

}
?>
