<?php
require('db_connect.php');
	
if (isset($_POST['register_btn'])) {
// set variable to  get the user input 
    $company = $_POST['company'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $province=$_POST["province"];
    $phoneNo=$_POST["phoneNo"];
    $address=$_POST["address"];
    $poCode=$_POST["poCode"];
    $webSite=$_POST["webSite"];
    $industry=$_POST["industry"];
    $name=$_POST["name"];
	$region=$_POST["region"];
	// insert the data to the database 
    if(!empty($poCode)&&!empty($province)&&!empty($address)&&!empty($city)){

        $addressSql = "INSERT INTO address (`Postal_Code`, `Province`, `address`, `City`,`Region`) VALUES ('$poCode','$province','$address','$city','$region')";
    }else{
        die("Incomplete data , program terminated 1.");
    }
    if(!empty($email)&&!empty($phoneNo)&&!empty($webSite)){
        $contactSql="insert into contact(`Email`,`Phone`,`Webiste`,`Name`) values('$email','$phoneNo','$webSite','$name')";
    }
    else{
        die("Incomplete data, program terminated2.");
    }
    if(!empty($company)&&!empty($industry)){
        mysqli_query($connection,$addressSql);
        $addressId=mysqli_insert_id($connection);
        mysqli_query($connection,$contactSql);
        $contactId=mysqli_insert_id($connection);
        $companySql="insert into company(`Company_name`,`company_address_ID`,Company_Contact_ID,Industry) value ('$company','$addressId','$contactId','$industry')";
        if(mysqli_query($connection,$companySql)==1){
            echo "Records added successfully.";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }else{
        die("Incomplete data, program terminated3.");
    }
    $connection->close();
}
?>