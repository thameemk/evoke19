<?php




// Configurations
$host='localhost:3306';
$username='iedctkmc_evokeUR';
$password='Ev0k#2k19';
$dbase='iedctkmc_evokeDB';




//Establishing database connection

$conn = mysqli_connect($host,$username,$password,$dbase);

//Redirecting function after exec

function redirect_path($theme,$response,$type=NULL){
    $pathToFile='https://www.evoke19.com/events/';
    if($theme=='aavegame1'){
        $page='reg_aavegame.php';
    }
    // else if($theme=='Disaster Management'){
    //     $page='disastermanagement.php';
    // }
    // else if($theme=='Waste Management'){
    //     $page='wastemanagement.php';
    // }
    // else if($theme=='Assistive Technologies'){
    //     $page='assistivetechnologies.php';
    // }
    else{
        $page='index.html';
    }

    header('Location:'.$pathToFile.$page.'?response='.$response.'&type='.$type);

    mysqli_close($conn);

    exit();
}


$theme = $_POST['theme'];

if($conn){

        $leaderName=$_POST['fullNameLeader'];
        $instNameLeader = mysqli_real_escape_string($conn,$_POST['instNameLeader']);
        $emailLeader = mysqli_real_escape_string($conn,$_POST['emailLeader']);
        $contactLeader = mysqli_real_escape_string($conn,$_POST['contactLeader']);
        $fullNameMember1 = mysqli_real_escape_string($conn,$_POST['fullNameMember1']);
        $instNameMember1 = mysqli_real_escape_string($conn,$_POST['instNameMember1']);
        $instNameMember2 = mysqli_real_escape_string($conn,$_POST['instNameMember2']);
        $fullNameMember2 = mysqli_real_escape_string($conn,$_POST['fullNameMember2']);

        if(empty($leaderName) || empty($instNameLeader) || empty($fullNameMember1)|| empty($instNameMember1) || empty($emailLeader) || empty($contactLeader) ){
            redirect_path($theme,'error','fill_all');
        }
        else{
                $sql="SELECT * FROM aavegame WHERE emailid='$emailLeader'";
                $result = mysqli_query($conn, $sql);
                $userfake = mysqli_fetch_assoc($result);
                if ($userfake) { // if user exists

                  if ($userfake['emailid'] === $emailLeader) {
                    // array_push($errors, "email already exists");
                      redirect_path($theme,'error','already_exists');
                  }
                }
                else{
                        $sql="insert into aavegame (fullname,institution, emailid, contactnum1, fullNameMember2, contactnum2, fullNameMember3, contactnum3, pathtofile) values('$leaderName','$instNameLeader','$emailLeader','$contactLeader','$fullNameMember1','$instNameMember1','$fullNameMember2','$instNameMember2','$theRealFileName')";
                          $result=$conn->query($sql);
                          redirect_path($theme,'success');
                        }

            }
        }
else{
    echo "connection failed";
    redirect_path($theme,'error','error_conn');
}
