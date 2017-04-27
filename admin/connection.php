<?php

class createConnection 				//create a class for make connection
{
   /* var $host="localhost";
    var $username="wuqehqcuch";             // specify the sever details for mysql
    Var $password="db123456";
    var $database="wuqehqcuch";*/

    var $host="localhost";
    var $username="exjnketxsg";             // specify the sever details for mysql
    Var $password="M7t7adhABZ";
    var $database="exjnketxsg";

   /* var $host="localhost";
    var $username="root";             // specify the sever details for mysql
    Var $password="";
    var $database="iadmin";
*/
    var $myconn;

   

    function connectToDatabase() 		// create a function for connect database
    {
        $conn= mysqli_connect($this->host,$this->username,$this->password, $this->database);

        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }

        else
        {

            $this->myconn = $conn;

						//            echo "Connection established";

        }

        return $this->myconn;

    }

    function selectDatabase() 			// selecting the database.
    {
        mysql_select_db($this->database);  	//use php inbuild functions for select database

        if(mysql_error()) 			// if error occured display the error message
        {

            echo "Cannot find the database ".$this->database;

        }
						//         echo "Database selected..";       
    }

    function closeConnection() 			// close the connection
    {
        mysql_close($this->myconn);

						//        echo "Connection closed";
    }


   /* function update2($table,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $query = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $update = $this->db->query($query);
            return $update?$this->db->affected_rows:false;
        }else{
            return false;
        }
    }*/



}

?>