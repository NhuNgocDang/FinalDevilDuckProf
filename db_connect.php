<?php
//connect the database 
$connection = mysqli_connect('localhost', 'seo2cash_zheng', 'ngocngoc123');

if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'seo2cash_ebiz');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}