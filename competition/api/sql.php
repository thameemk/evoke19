<?php

$sql = "CREATE TABLE userinfo (
    userid INT(255) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(50),
    institution VARCHAR(150),
    emailid VARCHAR(50),
    contactnum INT(20),
    pathtofile TEXT,
    leaderid INT(255),
    theme VARCHAR(50),
    PRIMARY KEY(userid)
)";


$host='localhost:3306';
$username='iedctkmc_evokeUR';
$password='Ev0k#2k19';
$dbase='iedctkmc_evokeDB';


//Establishing database connection

$conn = mysqli_connect($host,$username,$password,$dbase);

if($conn){
    echo "Successfully connected to server";
}
else{
    echo "Failed";
}

print(mysqli_query($conn,$sql));


?>