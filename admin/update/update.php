<?php 
include('../connection.php');
$connection=new createConnection();
$connection_ref=$connection->connectToDatabase();

$dec1=$_POST["description_1"];
$dec2=$_POST["description_2"];
$dec3=$_POST["description_3"];
$dec4=$_POST["description_4"];
$cod1=$_POST["our_code_1"];
$cod2=$_POST["our_code_2"];
$ab=$_POST["about_us"];


/*include('safe.php');
$db=new SafeMySQL();
$allowed = array('description_1','description_2','description_3','description_4','our_code_1','our_code_2','about_us');
$data    = $db->filterArray($_POST,$allowed);
$sql     = "UPDATE content_edit SET ?u WHERE ind=?i";
$db->query($sql, $data, $_POST['ind']);*/


/*<?php
include('../connection.php');
$connection = new createConnection(); 			//created a new object
$connection_ref = $connection->connectToDatabase();

$dec1=$_POST["description1"];
$dec2=$_POST["description2"];
$dec3=$_POST["description3"];
$dec4=$_POST["description4"];
$cod1=$_POST["our_code1"];
$cod2=$_POST["our_code2"];
$ab=$_POST["about_us"];*/




/*$sql = "UPDATE content_edit SET  $dec1,'description_1'),
COALESCE(dec2,'description_2'),
COALESCE($dec3,'description_3'),
COALESCE($dec4,'description_4'),
COALESCE($cod1,'our_code_1'),
COALESCE($cod2,'our_code_2'),
COALESCE($ab,'about_us'),
WHERE index=1";*/

$sql = "UPDATE content_edit SET 
description_1='$dec1',
description_2='$dec2',
description_3='$dec3',
description_4='$dec4',
our_code_1='$cod1',
our_code_2='$cod2',
about_us='$ab' where ind=1";


/*$sql="update content_edit set COALESCE($dec1),COALESCE($dec2) where ind=1";
*/


if(mysqli_query($connection_ref, $sql))
{
	//header("Location: $index.php?message=success");
	echo "Message Saved";
}
else {
	echo mysqli_error($connection_ref);
}

?>