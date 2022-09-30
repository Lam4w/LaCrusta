<?php


class createDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename1;
        public $tablename2;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "newdb",
        $tablename1 = "productdb",
        $tablename2 = "order",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename1 = $tablename1;
      $this->tablename2 = $tablename2;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

     // create connection
        $conn = mysqli_connect($servername, $username, $password);
        $this->con = mysqli_connect($servername, $username, $password);
        
      // $con = mysqli_connect("localhost", "root", "");

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

       // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

           // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename1
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(25) NOT NULL,
                product_filter VARCHAR(10),
                product_desc VARCHAR(100),
                product_price FLOAT,
                product_image VARCHAR (100)
            );";

            $sql = " CREATE TABLE IF NOT EXISTS $tablename2
            (order_id INT(11) NOT NULL PRIMARY KEY,
                quantity INT(100) NOT NULL,
                order_price FLOAT
            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

   // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename1";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}





