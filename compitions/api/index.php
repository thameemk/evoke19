<?php



//Configurations
$host='localhost:3306';
$username='freelearntoday_evoke19_1';
$password=',{?NPg2[tCTC';
$dbase='freelearntoday_evoke19';

//Establishing database connection

$conn = mysqli_connect($host,$username,$password,$dbase);

//Redirecting function after exec

function redirect_path($theme,$response,$type=NULL){
    $pathToFile='https://www.exuro.net/compitions/';
    if($theme=='paper_1'){
        $page='paper_present.php';
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

//File validity checking

function fileValidity($size,$extension){
    $size = (floatval($size)/(1024*1024));
    if($size<2){
        if($extension=='pdf'){
            return 1;
        }
        else{
            return -1;
        }
    }
    else{
        return 0;
    }
}




$theme = $_POST['theme'];

if($conn){
    //Reading input values

    if(isset($_POST['submitForm'])){
        $leaderName=$_POST['fullNameLeader'];
        $instNameLeader = mysqli_real_escape_string($conn,$_POST['instNameLeader']);
        $emailLeader = mysqli_real_escape_string($conn,$_POST['emailLeader']);
        $contactLeader = mysqli_real_escape_string($conn,$_POST['contactLeader']);
        $fullNameMember1 = mysqli_real_escape_string($conn,$_POST['fullNameMember1']);
        $instNameMember1 = mysqli_real_escape_string($conn,$_POST['instNameMember1']);
        // $emailNameMember1 = mysqli_real_escape_string($conn,$_POST['emailNameMember1']);
        $fullNameMember2 = mysqli_real_escape_string($conn,$_POST['fullNameMember2']);
        $instNameMember2 = mysqli_real_escape_string($conn,$_POST['instNameMember2']);
        // $emailNameMember2 = mysqli_real_escape_string($conn,$_POST['emailNameMember2']);
        $fullNameMember3= mysqli_real_escape_string($conn,$_POST['fullNameMember3']);
        $instNameMember3 = mysqli_real_escape_string($conn,$_POST['instNameMember3']);
        // $emailNameMember3 = mysqli_real_escape_string($conn,$_POST['emailNameMember3']);
        
        if(empty($leaderName) || empty($instNameLeader) || empty($emailLeader) || empty($contactLeader) || empty($_FILES['abstractForm']['name'])){
            redirect_path($theme,'error','fill_all');
        }
        else{
            $fileSize = $_FILES['abstractForm']['size'];
            
            $valid_result=fileValidity($fileSize,strtolower(pathinfo(basename($_FILES["abstractForm"]["name"]),PATHINFO_EXTENSION)));
            
            if($valid_result==0){
                redirect_path($theme,'error','error_file_size');
            }
            else if($valid_result==-1){
                redirect_path($theme,'error','error_file_type');
            }
            else if($valid_result==1){
                $sql="SELECT * FROM userinfo WHERE emailid='$emailLeader' AND theme='$theme'";
                if(mysqli_num_rows(mysqli_query($con,$sql))==0){                
                    if(move_uploaded_file($_FILES['abstractForm']['tmp_name'],'abstract/'.$emailLeader.$theme.'.'.strtolower(pathinfo(basename($_FILES["abstractForm"]["name"]),PATHINFO_EXTENSION)))){
                        
                        $theRealFileName = 'https://www.exuro.net/compitions/api/abstract/'.$emailLeader.$theme.'.'.strtolower(pathinfo(basename($_FILES["abstractForm"]["name"]),PATHINFO_EXTENSION));
                        
                        $sql="insert into userinfo (fullname,institution, emailid, contactnum, theme, pathtofile) values('$leaderName','$instNameLeader','$emailLeader','$contactLeader','$theme','$theRealFileName')";
                        $result=$conn->query($sql);
                        if($result){
                            $sql="select userid from userinfo where fullname='$leaderName' and emailid='$emailLeader' and theme='$theme'";
                            $result=$conn->query($sql);
                            if($result){
                                if(mysqli_num_rows($result)==1){
                                    $result=$result->fetch_assoc();
                                    $userid=$result['userid'];

                                    if(!empty($fullNameMember1) and !empty($instNameMember1)){
                                        $sql="insert into userinfo (fullname,institution, emailid, contactnum, leaderid, theme, pathtofile) values('$fullNameMember1','$instNameMember1','$emailLeader','$contactLeader',$userid,'$theme', '$theRealFileName')";
                                        $result=$conn->query($sql);


                                        if(!empty($fullNameMember2) and !empty($instNameMember2)){
                                            $sql="insert into userinfo (fullname,institution, emailid, contactnum, leaderid, theme, pathtofile) values('$fullNameMember2','$instNameMember2','$emailLeader','$contactLeader',$userid, '$theme', '$theRealFileName')";
                                            $result=$conn->query($sql);


                                            echo "reached flag1";

                                            if(!empty($fullNameMember3) and !empty($instNameMember3)){
                                                $sql="insert into userinfo (fullname,institution, emailid, contactnum, leaderid,theme, pathtofile) values('$fullNameMember3','$instNameMember3','$emailLeader','$contactLeader',$userid, '$theme', '$theRealFileName')";
                                                $result=$conn->query($sql);
                                            }
                                            else{
                                                redirect_path($theme,'success');
                                            }

                                        }
                                        else{
                                                redirect_path($theme,'success');
                                        }
                                    }
                                    else{
                                                redirect_path($theme,'success');
                                    }
                                }
                                else{
                                    $result=mysqli_fetch_assoc($result);
                                    $id_ = $result['userid'];
                                    $sql="delete from userinfo where theme='$theme' and fullname='$leaderName' and emailid='$emailLeader' and userid <>$id_";
                                    mysqli_query($conn,$sql);

                                    echo "already exists";
                                    //redirect_path($theme,'error','already_exists');
                                }
                            }
                            else{
                                echo "no result for select";
                                //redirect_path($theme,'error','error_conn');
                            }
                        }
                        else echo "no result for insert";
                    }
                    else{
                        echo "wrong file";
                        //redirect_path($theme,'error','error_file_upload');
                    }
                }
                else{
                    echo "already exists";
                    //redirect_path($theme,'error','already_exists');
                }
            }
            else{
                echo "invalid result";
                //redirect_path('home','error');
            }
        }
    }
    else{
        echo "form is not set";
        //redirect_path($theme,'error');
    }
}
else{
    echo "connection failed";
    //redirect_path($theme,'error','error_conn');
}