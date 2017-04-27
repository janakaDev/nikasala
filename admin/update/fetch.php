 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "content_edit");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM content_edit WHERE index = '".$_POST["index"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 












