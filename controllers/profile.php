<?php 
   require_once(dirname(__FILE__,2)."/utils/functions.php");
function doo($sessionid,$count)
{
	if($log = fopen(dirname(__FILE__,3)."/web3/internal/session.txt", 'r'))
	{
		//var_dump(1234);
		$temp = false;
		$user = "";
		while(!feof($log))
		{
			$buffer = fgets($log);
			$data = preg_split("/[+\r\n]+/", $buffer);
			if (strcmp($data[0], $sessionid)==0) 
			{
				$temp = true;
				$user = $data[1];
			}
		}
		if($temp == true)
		{
			$buf = file_get_contents(dirname(__FILE__,3)."/web3/internal/".$user.".txt");
			$c = $count-10;
			$buf = substr($buf,$c,$count);
			echo $buf;
			//api_session($buf);
		}
		else { api_response_error("Not logged!");}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
<script type="text/javascript" src="java.js" id="java"></script>
</head>
<body background="look.com.ua-163681.jpg">
<style type="text/css">
	form{
		margin-top: 100px; 
		margin-left: 100px;
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
		height: 30px;
		padding-top: 0px;
		width: 55px;
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
  	#logo{
  		margin-left: 90px;
  	}
  	div{
  		background-color: lightcyan;
  		font-family: comic sans ms;
  		height: 150px;
  		width: 400px;
  		overflow: auto;
  		border-radius: 40px;
  		padding: 10px;
  	}
</style>
<?php?>
<form id="form">
	<img src="picture.jpg" height="170" width="150" id="minion">
	<h2><img src="banana1.png" id="banana">Bello!<img src="banana.png" id="banana"></h2>
	<?php
	$id = get_id();
	echo("<div id=three>");
	$json_msg = api_request("data","get","sessionid=$id");
	//var_dump($json_msg);
	if($json_msg["Error"] == "Not logged!") { header("Location: ../controllers/index.php");}
	//var_dump($id);
	else{
	if(empty($_GET)) {echo $json_msg["Result"];}
	else 
		{
	 		doo($id,$_GET["n"]);
		}
	}
	echo("</div>");
	?>
	<script type="text/javascript">
	var currentPage = 0;
		var atEnd = false;
		function get_cookie ( cookie_name )
		{
			var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
  			if ( results )
	  			return ( unescape ( results[2] ) );
  			else
    			return null;
		}
		function loadMore() {
			if(atEnd) {
				return;
			}
			//const loadurl = "index.php";
			//const loadparams = "count=" + (currentPage++);
			var request = new XMLHttpRequest();
			currentPage+=10;
			request.open("GET", "http://localhost/web3/api.php?action=data&method=doo&sessionid=" + get_cookie("sessionid") + "&count=" + (currentPage));
			request.onload = function loadCallback() {
				if(request.responseText) {
					var textElement = document.getElementById("three");
					var txt = request.responseText;
					txt = JSON.parse(txt);
						var text_extra = document.createTextNode(txt["Result"]);
                         textElement.innerText += txt["Result"];
					//txt = txt.text;
					//textElement.innerHTML=txt.Result;
					//if(txt)
				}
			};
			request.send();
		}
	</script>
	<p><button type="button" id="logo" onclick="data.logo()">Logout</button><button type="button" id="change" onclick="data.chan()">Change text</button><button type="button" id="add" onclick="data.add()">Add text</button><button type="button" id="php" onclick="loadMore()">Text</button></p>
</form>
</body>
</html>