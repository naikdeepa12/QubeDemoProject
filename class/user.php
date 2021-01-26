<?php
    class User{

        // Connection
        private $conn;

        // Table
        private $db_table = "user";

        // Columns
        public $id;
        public $name;
        public $email;
		public $contact;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // CREATE
        public function createUser(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name,
						contact = :contact,						
                        email = :email";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->contact=htmlspecialchars(strip_tags($this->contact));
			$this->email=htmlspecialchars(strip_tags($this->email));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":contact", $this->contact);
			$stmt->bindParam(":email", $this->email);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleUser(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        email,contact
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       contact = :contact
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(":contact", $this->contact);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
			$this->id = $dataRow['id'];
            $this->name = $dataRow['name'];
            $this->email = $dataRow['email'];
            $this->contact = $dataRow['contact'];
			
			return true;
        }        
    }
?>