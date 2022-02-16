<?php
$serverName="localhost";
$username="root_anu";
$password="anusha";

$conn= new mysqli($serverName,$username,$password);
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
} else{
    echo "connection ESTABLISHED";
}
$dbanme="hospital";
$sql="CREATE DATABASE hospital";
if($conn->query($sql)===TRUE){
    echo "databse hospital created";
} else{
    echo "databse not created".$conn->error;
}
$conn= new mysqli($serverName,$username,$password,$dbanme);
$sql="CREATE TABLE Doctors( 
    Id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FName VARCHAR(30) NOT NULL, 
    Specialization VARCHAR(40) NOT NULL,
    Date_of_joining DATE, 
    Total_experience VARCHAR(10) NOT NULL, 
    Age DATE NOT NULL, 
    Contact_number INT(15) NOT NULL  
    )";

if($conn->query($sql)===TRUE){
    echo "table created ";
} else{
    echo "table not created".$conn->error;
}
$conn= new mysqli($serverName,$username,$password,$dbanme);
$sql="CREATE TABLE  Rooms_Wards( 
    Type_room VARCHAR(20) NOT NULL,
    Total_no_of_beds INT(20) NOT NULL , 
    charges_per_day INT(20) NOT NULL,
    number_of_pateint INT(20) NOT NULL
    )";
if($conn->query($sql)===TRUE){
    echo "table Rooms_&_Wards created ";
} else{
    echo "table Rooms_&_Wards not created".$conn->error;
}


$conn->close();
?>