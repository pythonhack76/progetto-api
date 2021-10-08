<?php 


class Database{

    //variabili 
    private $hostname;
    private $dbname;
    private $username;
    private $pasword;
    private $conn; 

    public function connect(){
        //inizializzazione delle variabili 
        $this->hostname = "localhost";
        $this->dbname = "rest_php_api";
        $this->username = "root";
        $this->password = "root";

        $this->conn = new mysqli($this->hostname, $this->username, $this->password);
        if($this->conn->connect_errno){
                print_r($this->conn->connect_error);
                exit;
        }else{ 
            echo "connesisone OK";
            return $this->conn; 
           
            //print_r($this->conn);
        }
        
    }

}

$db = new Database();

$db->connect();


?>