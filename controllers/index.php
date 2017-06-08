<?php 
   require_once(dirname(__FILE__,2)."/utils/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="look.com.ua-163681.jpg">
<style type="text/css">
	form{
		margin-top: 200px; 
		margin-left: 100px;
	}
	#t{
		margin-left: 60px;
		color: indigo;
	}
	#euser,#epass{
        color: indigo;
       	font-size: 11pt;
       	margin-top: 0px;
       	height: 7px;
    }
    #one,#two{
    	margin: 0;
    }
    button{
    	background: -moz-linear-gradient(#D0ECF4, #5BC9E1, #D0ECF4);
   		background: -webkit-gradient(linear, 0 0, 0  100%, from(#D0ECF4), to(#D0ECF4), color-stop(0.5, #5BC9E1));
   		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00BBD6', endColorstr='#EBFFFF');
   		padding: 3px 7px;
   		color: #333;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
   		border-radius: 5px;
   		border: 1px solid #666;
    }
</style>
<?php //session_start();?>
<form id="form" method="post" action="login.php">
	<h3 id = "t">LOGIN</h3>
	<p id="one"><input type="login" placeholder="Username" id="userlog" name="name"></p>
	<p id="euser"></p>
	<p id="two"><input type="password" placeholder="Password" id="password" name="pass"></p>
	<p id="epass"></p>
	<p><button type="submit" onclick="data.log()" id="button">Go!</button></p>
</form>
<?php //session_destroy(); ?>
</body>
</html>
<?php
if(isset($_GET['erru']))
{
	?><script type="text/javascript">
	var z = document.getElementById("euser");
	z.innerHTML="Wrong login!";
	</script>
<?php
}
if(isset($_GET['errp']))
{
	?><script type="text/javascript">
	var z = document.getElementById("epass");
	z.innerHTML="Wrong password!";
	</script>
<?php
}
?>