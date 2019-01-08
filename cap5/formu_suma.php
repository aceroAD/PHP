<html>
	<head>
		<title>Formulario AJAX</title>
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("resul").innerHTML =
													this.responseText;
					}
				};
				var num1 = document.getElementById("num1").value;
				var num2 = document.getElementById("num2").value;
				xhttp.open("POST", "suma.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("num1=" + num1 + "&num2=" + num2);
				return false;
			}
			loadDoc();
			
		</script>
	</head>
	<body>
		<form onsubmit = "return loadDoc();">
			<input id = "num1">
			<input id = "num2">
			<input type = "submit">
		</form>
		<section id = "resul"><section>
		
		
		
	</body>
</html>
		