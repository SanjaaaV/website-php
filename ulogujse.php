<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="registrujse.css">
	<title>Deljenje flajera</title>
	<script>
			function prikaziDatumIVreme(){
				document.getElementById("vremeIdatum").innerHTML=Date();
			}
		</script>
	<meta  http-equiv="content-type"  charset="utf-8">
</head>

<body onLoad="prikaziDatumIVreme()">
<div id="okvir">
	<div class="header">
			<div class="column">
				<?php
				include('zaglavlje.php');
				?>
			
			
				<nav id="navigacija">
					<div>
						<a href="Naslovna (1).php" >Početna</a>
					</div>
					<div>
						<a href="ulogujse.php"  class="active">Uloguj se</a>
					</div>
					
				</nav>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
		<div class="column">
			<h1>Uloguj se</h1>
			<div id="sadrzaj">
				<form action="uloguj-se.php" method="post">
				<label for="input-email">E-mail:</label>
				<input type="email" name="email" id="input-email"  required><br>
				<label for="password">Password:</label>
				<input type="password" name="sifra"  required><br>
				
				<button type="submit"><b>Uloguj se</b></button>
				</form><br>
				<label>Nemate nalog? <a class="red-link" href="registrujse.php">Registrujte se</a></label>
			</div>
		</div>
	</div>
	
	
<div class="footer">
			<div class="column">
				<?php
				include('footerdeo.php');
				?>
				<div class="footer-column" "align-right">
					<a class="red-link" href="./registrujse.php">Registruj se</a><br>
				</div>
			</div>
		</div>



</div>
</body>

</html>