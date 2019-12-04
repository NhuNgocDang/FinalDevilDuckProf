<?php

// get result   when user input   the keyword  display the result  limit to display 5 
    require "db_connect.php";
    if(!empty($_GET["val"])&&empty($_GET["region"])&&empty($_GET["industry"])){
        //Judge no region or industry
        //Search the database and send JSON results to the page
        $val=$_GET["val"];
        $sql="select `Company_name` from company where `Company_name` like '%$val%' limit 0,5";
        $r=mysqli_query($connection,$sql);
        $arr=array();
        while ($rows=mysqli_fetch_assoc($r)){
            $arr[]=$rows;
        }
        mysqli_close($connection);
        echo json_encode($arr);
    }
        //Judge no company or industry
        //Search the database and send JSON results to the page
    if (!empty($_GET["val"])&&!empty($_GET["region"])&&empty($_GET["industry"])){
        $val=$_GET["val"];
        $region=$_GET["region"];
        $sql="select `Company_name` from company where `Company_name` like '%$val%' 
        and `company_address_ID`=(select `Address_ID` from address where `Region` = '$region') limit 0,5";
        $r=mysqli_query($connection,$sql);
        $arr=array();
        while ($rows=mysqli_fetch_assoc($r)){
            $arr[]=$rows;
        }
        echo json_encode($arr);
        mysqli_close($connection);
    }
        //Judge no region
        //Search the database and send JSON results to the page
    if (!empty($_GET["val"])&&empty($_GET["region"])&&!empty($_GET["industry"])){
        $val=$_GET["val"];
        $industry=$_GET["industry"];
        $sql="select `Company_name` from company where `Company_name` like '%$val%' and `Industry`='$industry' limit 0,5";
        $r=mysqli_query($connection,$sql);
        $arr=array();
        while ($rows=mysqli_fetch_assoc($r)){
            $arr[]=$rows;
        }
        echo json_encode($arr);
        mysqli_close($connection);
    }
     //Judge no company
        //Search the database and send JSON results to the page
    if (!empty($_GET["val"])&&!empty($_GET["region"])&&!empty($_GET["industry"])){
        $val=$_GET["val"];
        $region=$_GET["region"];
        $industry=$_GET["industry"];
        $sql="select `Company_name` from company where `Company_name` like '%$val%' 
        and `company_address_ID`=(select `Address_ID` from address where `Region` = '$region') and `Industry`='$industry' limit 0,5";
        echo json_encode($arr);
        mysqli_close($connection);
    }

