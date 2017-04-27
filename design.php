<?php
include("connection.php");
$connection = new createConnection(); 			//created a new object
$connection_ref = $connection->connectToDatabase();

	$pic =$_FILES['pic']['name'];
    $pic_loc = $_FILES['pic']['tmp_name'];
	$folder="uploads/";
	if(move_uploaded_file($pic_loc,$folder.$pic))
	{
		?><script>alert('successfully uploaded');</script><?php
	}
	else
	{
		?><script>alert('error while uploading file');</script><?php
	}



$handle = "uploads/".$pic;
//$handle = "janak";
$name=$_POST['name'];
//$name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$description=$_POST['description'];
//$rooms=$_POST['rooms'];
$address=$_POST['address'];



$sql = "INSERT INTO test(Full_name,Address,Description,email,telephone,image_path) VALUES ('$name', '$address', '$description','$email','$telephone','$handle');";

if(mysqli_query ($connection_ref, $sql)){
   echo "<script>
		var r = confirm('ADDED NEW ENTRY SUCCESSFULLY!Do You Want To Add One More?');
    		if (r == true) 
		{
			window.location.assign('order.html');    
		} 
		else 
		{
        		window.location.assign('index.html');
	    	}
	</script>";
} else{
    echo "ERROR: Could not able to execute $sql. ";

}




?> 