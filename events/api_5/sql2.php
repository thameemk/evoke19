<?php
error_reporting(0);
$sql = "select * from test_int";



$host='localhost:3306';
$username='iedctkmc_evokeUR';
$password='Ev0k#2k19';
$dbase='iedctkmc_evokeDB';


//Establishing database connection

$conn = mysqli_connect($host,$username,$password,$dbase);
if($conn){
    $res = mysqli_query($conn,$sql);
    if($res){
        echo'
        <table class="test_int">
            <tr><th>User ID </th>
                <th>Full Name</th>
                <th>Institution</th>
                <th>Email-id</th>
                <th>Contact Number</th>
                <th>Company</th>
                <th>CV</th>

            </tr>';
        while($row = $res->fetch_assoc()){
            echo '
                <tr><td>';echo $row['userid'];echo '</td>
                    <td>';echo $row['fullname'];echo '</td>
                    <td>';echo $row['institution'];echo '</td>
                    <td>';echo $row['emailid'];echo '</td>
                    <td>';echo $row['contactnum1'];echo '</td>
                    <td>';echo $row['company'];echo '</td>
                    <td><a href="';echo $row['pathtofile'];echo '">CV</a></td>

                </tr>
            ';
        }
        echo '</table>';
    }
}
else{
    echo "Server connection failed";
}
mysqli_close($conn)
?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu:400,700');
    body{
        margin: 0px;
        padding: 10px;
        background: #f3f3f3;
        font-family: 'Ubuntu', sans-serif;
    }
    .test_int{
        width: 100vw;
        text-align: justify;
    }
    .test_int th{
        padding: 5px;
    }
    .test_int tr{
        background: #ccc;
    }
    .test_int td{
        padding: 5px;
    }
</style>
