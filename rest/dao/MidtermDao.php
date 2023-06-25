<?php

class MidtermDao {

    private $conn;
    private $connected = true;

    /**
    * constructor of dao class
    */
    public function __construct($db){
        try {

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */


        /*options array neccessary to enable ssl mode - do not change*/
        $options = array(
        	// PDO::MYSQL_ATTR_SSL_CA => 'https://drive.google.com/file/d/1g3sZDXiWK8HcPuRhS0nNeoUlOVSWdMAg/view?usp=share_link',
        	// PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );
        /** TODO
        * Create new connection
        * Use $options array as last parameter to new PDO call after the password
        */
          $this->conn = new PDO("mysql:host={$db['hostname']};dbname={$db['database']}", $db['username'], $db['password']);

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully";
        } catch(PDOException $e) {
          $this->connected = false;
          echo "Connection failed: " . $e->getMessage();
        }
    }

    public function check_connection() {
      return $this->connected === true ? 'Connected successfully!' : 'Connection failed.';
    }

    /** TODO
    * Implement DAO method used to get cap table
    */

    public function cap_table(){
      $sql = $this->conn->prepare('SELECT * FROM cap_table');
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method used to get summary
    */
    public function summary(){

    }

    /** TODO
    * Implement DAO method to return list of investors with their total shares amount
    */
    public function investors(){
      $sql = $this->conn->prepare('SELECT * FROM cap_table');
      $sql->execute();
      $data = $sql->fetchAll(PDO::FETCH_ASSOC);

      // foreach($data as $d) {
      //
      // }
    }
}
?>
