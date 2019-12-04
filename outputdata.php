<?php
require('db_connect.php');
	
	
$sql = "select * from members; ";
$result =mysqli_query($connection, $sql);
if (mysqli_num_rows($result)>0){
   while ($row =mysqli_fetch_array($result)){
	   echo "company: ". $row["company"]. 
	   " - city: " . $row["city"]. 
	   " - email: " . $row["email"].
	   " -location:" .$row["location"] . "
	   <br>";
    }
} else {
    echo "not find  reults ";
}
	   
	   
	   
   


$connection->close();	

	
?>