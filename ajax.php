
<html>
<head>
<script>

function showHint() {
	var xmlhttp = new XMLHttpRequest();
	str=document.getElementById('city').value;
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var m=document.getElementById("txtHint");
			m.innerHTML=xmlhttp.responseText;
			
		}
	};
	var url="server.php?cityid="+str;
	
	
	xmlhttp.open("Get", url, true);
	
	xmlhttp.send();
}

</script>

</script>
</head>
<body>

<form id="fm" action=""  method="post" name="fm"><pre>
	
	
	id        :   <input type="text" onkeyup="showHint()" name="city" id="city">
					<span id="txtHint"></span><br>

</form>
</pre>
</body>

</html>