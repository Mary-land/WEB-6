var data = {
	log : function()
	{
		var one = document.getElementById("userlog").value;
		var two = document.getElementById("password").value;
		var input = document.getElementById("password");
		var b = 0;
		one = one.replace(/^\s+|\s+$/g, '');
		two = two.replace(/^\s+|\s+$/g, '');
		var z=document.getElementById("euser");
		var zz=document.getElementById("epass");
		if(!one)
		{
			z.innerHTML="Nothing has been entered";
			document.getElementsByTagName('form')[0].setAttribute('onsubmit', 'event.preventDefault()');
			b=1;
		}
		else z.innerHTML="";
		if(!two)
		{
			zz.innerHTML="Nothing has been entered";
			document.getElementsByTagName('form')[0].setAttribute('onsubmit', 'event.preventDefault()');
			b=1;
		}
		else zz.innerHTML="";
		if(b==0) document.getElementsByTagName('form')[0].setAttribute('onsubmit', '');
	},
	chan : function()
	{
		window.location = "http://localhost/web6/controllers/change.php";
	},
	add : function()
	{
		window.location = "http://localhost/web6/controllers/add.php";
	},
	logo : function()
	{
		window.location = "http://localhost/web6/controllers/login.php?logout";
	},
}