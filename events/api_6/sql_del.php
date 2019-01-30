<?php

$sql = "DELETE FROM aavegame
WHERE userid IN (1,2,3,4,5);";


//$sql = "DROP TABLE `intern`";

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
