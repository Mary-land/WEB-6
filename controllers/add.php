<?php 
   require_once(dirname(__FILE__,2)."/utils/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="look.com.ua-163681.jpg">
<style type="text/css">
	form{
		margin-top: 100px; 
		margin-left: 0px;
	}
	#minion{
		border-radius: 50px;
		margin: 0;
		margin-left: 10px;
	}
	h2{
		margin-top: 0px;
		font-family: segoe script;
		padding-top: 0px;
		color: gainsboro;
	}
	#banana{
		height: 40px;
		padding-top: 0px;
		width: 70px;
	}
	button {
   		background: -moz-linear-gradient(#D0ECF4, #5BC9E1, #D0ECF4);
   		background: -webkit-gradient(linear, 0 0, 0  100%, from(#D0ECF4), to(#D0ECF4), color-stop(0.5, #5BC9E1));
   		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00BBD6', endColorstr='#EBFFFF');
   		padding: 3px 7px;
   		color: #333;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
   		border-radius: 5px;
   		border: 1px solid #666;
   		margin: 5px;
  	}
  	#ok{
  		margin-left: 200px;
  		height: 30px;
  		width: 50px;
  	}
  	textarea{
  		background-color: lightcyan;
  		font-family: comic sans ms;
  		height: 300px;
  		width: 500px;
  		overflow: auto;
  		border-radius: 20px;
  		padding: 10px;
  	}
</style>
<?php  ?>
<form id="form" method="post" action="login.php">
	<h2><img src="banana1.png" id="banana">ADD!<img src="banana.png" id="banana"></h2>
	<textarea name="myt"><?php
  $id = get_id();
    $json_msg = api_request("data","get","sessionid=${id}");
    if($json_msg["Error"] == "Not logged!") { header("Location: ../controllers/index.php");}
  ?></textarea>
	<p><button type="submit" id="ok">Ok!</button></p>
</form>
<?php ?>
</body>
</html>