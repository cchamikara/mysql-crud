<?php

class ConnectDb{

    const SERVERNAME = "localhost";
    const USERNAME = "cl44-db1-6tl";
    const PASSWORD = "XR9wT^KYB";
    const DBNAME = "muaw_scraper";

    function Connect(){

        // Create connection
        $conn = new mysqli(self::SERVERNAME,self::USERNAME,self::PASSWORD,self::DBNAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    function Insert($table,$cols,$vals){

        $conn = $this->Connect();
        $sql = "INSERT INTO ".$table." (".$cols.")
                VALUES ('John', 'Doe', 'john@example.com')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function Delete($cols,$vals){

    }

    function Update($cols,$vals){

    }

    function Select($cols,$vals){
        $colmns=$this->prepareList($cols);
        $sql = "SELECT * FROM MyGuests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    function prepareList(){

    }

    function select(){
        $db = new Database();
        $db->connect();
        $db->select('CRUDClass','id,name',NULL,'name="Name 1"','id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $db->getResult();
        print_r($res);

    }
}



$file = new ConnectDb();
//$file->Insert('site_info','id,url,email','');
?>
