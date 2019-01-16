<html>
<head>
	<title>Live | Evoke'19</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/chat.js"></script>
	<style type="text/css">
  body{
    background-image: url('https://i.imgur.com/h1XimvD.jpg');

  }
  .custom1{
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }
		.box1 { width: 90%; margin: 0 auto;height: auto; border: 2px solid black;padding: 10px;	 }
		/* div { width: 400px;height: 450px;overflow: auto	 } */
		.userInput{float: left;
    color: #FFFFFF;}
		.responseData{float:right;
    color:#FFFFFF;}
		/* #input { width: auto; } */
		button { width: 50px; }
	</style>
</head>
<body >
<a href="index.php"><img class="custom1" src="https://i.imgur.com/4UEClcA.png"></a>
<div class="box1">

	<div class = 'chatBox'>
	</div>
	<input id="input" type="text" style="width: 70%;"> <button id="rec" onclick="send()">send</button>
</div>

</body>
</html>
