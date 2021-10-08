<?php 

    class Student{

        //dichiaro variabili 

        public $name;
        public $email;
        public $mobile; 


        private $conn;
        private $table_name; 

        //costruttore
        public function __construct($db){

            $this->conn = $db;
            $this->table_name = "tbl_students";

        }
        public function create_data(){

            //insert Data using sql
            $query = "INSERT INTO ".$this->table_name." SET name = ?, email = ?, mobile = ?";

            // prepare the sql 
            $obj = $this->conn->prepare($query);

            //sanitize input variabili 
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->mobile = htmlspecialchars(strip_tags($this->mobile));

            //binding parameters

            $obj->bind_param("sss" , $this->name, $this->email, $this->mobile);

            if($obj->execute()){
                return true;
            }
            
            return false;

        }
       

    }




?>