<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Submit paper | 'Evoke 19</title>
	
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!--link rel="stylesheet" type="text/css" href="css/card.css" /-->
	<link rel="stylesheet" type="text/css" href="css/pattern.css" />
	<link rel="stylesheet" type="text/css" href="css/material-kit.min.css" />

	
	<script>
		if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
			var root = document.getElementsByTagName('html')[0];
			root.setAttribute('class', 'ff');
		};
	</script>
	 <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity=""
        crossorigin="anonymous">
    </script>
</head>

<body class="demo-2">
	<iframe src="../bg/index.html" class="main-frame" frameborder="0"></iframe>
	<div class="container">
		<!-- <header class="codrops-header">
			<h1> Submit your Paper</h1>
		</header>	 -->	
	</div>
	<section class="relative custom-section container-fluid" id="trafficmanagement">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h3>Submit your Paper</h3>
                    
                    <!-- <h4>Register Now</h4><br> -->
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="api/index.php" method="post" class="form-class" enctype="multipart/form-data">
                                <?php
                                if(isset($_GET['response'])){
                                    $response=$_GET['response'];
                                    if($response=='success'){
                                        print('<div class="form-control response success">Successfully registered </div>');
                                    }
                                    else{
                                        $type=$_GET['type'];
                                        if($type=='already_exists'){
                                            print('<div class="form-control response error">It seems like you have already registered!</div>');
                                        }
                                        else if($type=='fill_all'){
                                            print('<div class="form-control response error">Fill all fields</div>');
                                        }
                                        else if($type=='error_conn'){
                                            print('<div class="form-control response error">Cannot connect with the server</div>');
                                        }
                                        else if($type=='error_file_size'){
                                            print('<div class="form-control response error">File size exceeds the limit. Size should be less than 2MB.</div>');
                                        }
                                        else if($type=='error_file_type'){
                                            print('<div class="form-control response error">File format is not valid. Upload PDF Only </div>');
                                        }
                                        else if($type=='error_file_upload'){
                                            print('<div class="form-control response error">Trouble in uploading file.</div>');
                                        }
                                        else{
                                            print('<div class="form-control response error">Something went wrong!</div>');
                                        }
                                    }
                                }
                                ?>
                                <input type="text" name="fullNameLeader" class="form-control" placeholder="Full Name (Team Leader)">
                                <input type="text" name="instNameLeader" class="form-control" placeholder="Name of the Institution/Organization">
                                <input type="email" name="emailLeader" class="form-control" placeholder="Email Id">
                                <input type="tel" name="contactLeader" class="form-control" placeholder="Contact Number">
                                <div class="row member-section">
                                    <div class="form-group-div" style="display:none;" id="member_1">
                                        <div>Team Member<a id="member_1_close" class="close-href">Close</a></div>
                                        <input type="text" name="fullNameMember1" class="form-control" placeholder="Full Name">
                                        <input type="text" name="instNameMember1" class="form-control" placeholder="Name of the Institution/Organization">
                                        <!-- <input type="email" name="emailNameMember1" class="form-control" placeholder="Email Id"> -->
                                    </div>
                                    <div class="form-group-div" style="display:none;" id="member_2">
                                        <div>Team Member<a id="member_2_close" class="close-href">Close</a></div>
                                        <input type="text" name="fullNameMember2" class="form-control" placeholder="Full Name">
                                        <input type="text" name="instNameMember2" class="form-control" placeholder="Name of the Institution/Organization">
                                        <!-- <input type="email" name="emailNameMember2" class="form-control" placeholder="Email Id"> -->
                                    </div>
                                    <div class="form-group-div" style="display:none;" id="member_3">
                                        <div>Team Member<a id="member_3_close" class="close-href">Close</a></div>
                                        <input type="text" name="fullNameMember3" class="form-control" placeholder="Full Name">
                                        <input type="text" name="instNameMember3" class="form-control" placeholder="Name of the Institution/Organization">
                                        <!-- <input type="email" name="emailNameMember3" class="form-control" placeholder="Email Id"> -->
                                    </div>
                                    
                                </div>
                                <p>Only PDF format is supported</p>
                                <input type="file" name="abstractForm" class="btn btn-sm" style="display:none;" value="Upload Abstract" id="uploadAbstract">
                                <button  type="button" name="submitAbstract" class="btn btn-sm" style="width: 100%;"  id="uploadAbstractPseudo">Upload Paper</button>
                                <div class="row btn-group-div">
                                    <button type="button" name="addMoreMembers" class="btn btn-sm" id="addmoreMembersBtn"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Member</button>
                                    <input type="hidden" name="theme" value="paper_1">
                                    <button type="submit" name="submitForm" class="btn btn-sm ">Register</button>
                                </div>
                            </form>
                        </div>
                        <script>
                            let queMembers=[];
                            $(document).ready(function(){
                                $("#addmoreMembersBtn").click(function(){
                                    if(queMembers.length<4){
                                        let id_ = "#member_"+(queMembers.length+1);
                                        $(id_).show();
                                        for(let incr=0;incr<queMembers.length;incr++){
                                            $(queMembers[incr]+"_close").hide();
                                        }
                                        $(id_+"_close").show();
                                        queMembers.push(id_);
                                        if(queMembers.length>=3){
                                            $("#addmoreMembersBtn").css({
                                                "opacity":"0.7",
                                                "border-color":"grey",
                                                "color":"grey"
                                            });
                                            $("#addmoreMembersBtn").attr("disabled","disabled");
                                        }
                                    }
                                })
                                $(".close-href").click(function(){
                                    let id_=$(this).attr('id');
                                    $("#"+id_).hide();
                                    $(queMembers[queMembers.length-1]+" input").val('');
                                    id_=id_.substring(0,8);
                                    queMembers.splice(queMembers.indexOf("#"+id_),1);
                                    $("#"+id_).hide();
                                    $("#addmoreMembersBtn").css({
                                        "opacity":"1",
                                        "border-color":"black",
                                        "color":"black"
                                    });
                                    $("#addmoreMembersBtn").removeAttr("disabled","disabled");
                                    $(queMembers[queMembers.length-1]+"_close").show();
                                })
                                $("#uploadAbstractPseudo").click(function(){
                                    $("#uploadAbstract").trigger("click");
                                })
                            })
                        </script>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </section>
        <style>
            .response{
            padding: 10px 20px;
            font-size: 13px;
            color: black;
            margin-bottom: 10px;
            text-align: center;
            }
            .success{
            background: #2da1cc61;
            border: 1px solid #2da1cc;
            }
            .error{
            background: #ea0f0f61;
            border: 1px solid #ea0f0f61;
            }
            .form-group-div>div>a{
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
            color: dimgray;
            float: right;
            }
            #uploadAbstractPseudo{
            border: 1px solid #ced4da;
            color: #495057;
            font-weight: 500;
            }
            .btn-group-div{
            padding: 15px;
            display: grid;
            grid-template-columns: auto 1fr;
            grid-gap: 0.5em;
            }
            .member-section{
            margin: 5px 0px;
            padding: 0px;
            margin: 0px;
            }
            .form-group-div{
            display: block;
            width: 100%;
            }
            .member-section>div{
            color: black;
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 5px;
            line-height: 30px;
            }
            .form-class input{
            margin-bottom: 5px;
            font-size: 14px;
            }
            .form-class button{
            border: 1px solid black;
            background: white;
            color: black;
            }
            .form-class .btn i{
            margin-right: 5px;
            }
            body{
            margin: 0px;
            padding: 10px;
            }
            .href-link{
            border: 1px solid dimgrey;
            color: dimgrey;
            border-radius: 5px;
            font-weight: 500;
            padding: 0.4em 3em;
            transition: all 200ms;
            text-decoration: none;
            }
            .href-link:hover,
            .href-link:focus{
            background: dimgrey;
            color: white;
            }
            .content-group{
            margin-top: 5vh;
            text-align: justify;
            }
            .content-group img{
            max-height: 20vh;
            opacity: 0.7;
            }
            .content-group-main-row{
            margin-bottom: 8vh;
            }
            .custom-section{
            position: relative;
            top: 150px;
            box-sizing: border-box;
            max-width: 96vw;
            }
            .custom-section h1{
            margin: 10px auto;
            text-align: center;
            color: #2b840a;
            }
            .custom-section blockquote{
            text-align: center;
            }
            .center-text{
            margin: 10px;
            text-align: center;
            }
            .row div{
            /*                    border: 1px solid red;*/
            }
        </style>

	<script src="js/core/jquery.min.js" type="text/javascript"></script>
	<script src="js/core/popper.min.js" type="text/javascript"></script>
	<script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="js/core/moment.min.js"></script>
</body>
</html>