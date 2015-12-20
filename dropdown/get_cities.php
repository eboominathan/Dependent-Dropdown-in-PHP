<?php
include('conn.php');

$sql = "SELECT * FROM city WHERE stateid = '".$_POST['id']."'";
$result = mysqli_query($conn, $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['id'];
	$data['label']=$row['city'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close($conn);
?> 