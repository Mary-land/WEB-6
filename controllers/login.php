<?php
require_once(dirname(__FILE__,2)."/utils/functions.php");
if(isset($_GET["logout"]))
{
		$id= get_id();
		var_dump($id);
		$json_msg = api_request("user","logout","&sessionid=${id}");
	    logout();
}
if(isset($_GET["new"]))
{
		$id= get_id();
		//var_dump($id);
		$r = $_GET["new"];
		//var_dump(1234);
		$json_msg = api_request("data","doo","sessionid=${id}&count=${r}");
        //header("Location: http://localhost/web6/controllers/profile.php");
        $k = $json_msg["Result"];
        var_dump($k);
        //echo("<script>document.getElementById('content').innerHTML = "yyy";</script>");
        //echo("<script>$('#content').html('hfhfh')</script>");
		//echo $json_msg["Result"];
	}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['name']))
	{
	    $user = $_POST['name'];
	    $pass = $_POST['pass'];
    	$json_msg = api_request("user","login","username=$user&pass=$pass");
    	//var_dump($json_msg);
    	if($json_msg["Error"]==null)
    	{
    	header("Location: ../controllers/profile.php");
		session_id($json_msg["SessionId"]);
		$id = $json_msg["SessionId"];
		session_start();
		//var_dump(session_id());
    	session($id,$user);
    }
    else
    { 
    	if($json_msg["Error"]=="Wrong password!") { header("Location: ../controllers/index.php?errp");}
    	if($json_msg["Error"]=="This user does not exist") { header("Location: ../controllers/index.php?erru");}
    }
	}
	if(isset($_POST['myt']))
	{
		$tx =  $_POST['myt'];
		$id= get_id();
		//preg_replace("__", "\r\n", $tx);
		$json_msg = api_request("data","add","sessionid=${id}&text=${tx}");
		header("Location: ../controllers/profile.php");
	}
	if(isset($_POST['my']))
	{
		$tx =  $_POST['my'];
		$id= get_id();
		//preg_replace("/[+\r\n]+/", "$$$", $tx);
		$json_msg = api_request("data","set","sessionid=${id}&text=${tx}");
		header("Location: ../controllers/profile.php");
	}
}
else if(isset($_GET["set"]))
{
	$json_msg = api_request("data","login","username=$user&pass=$pass");
	if($json_msg["Error"]==null)
    {
    	header("Location: ../controllers/profile.php");
		session_id($json_msg["SessionId"]);
		session_start();
    	session($id,$user);
    }
}
?>