<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="alocirajadmin.css">
	<title>Administrator</title>
	<script>
			function prikaziDatumIVreme(){
				document.getElementById("vremeIdatum").innerHTML=Date();
			}
		</script>
	<meta charset="utf-8">
</head>

<body onLoad="prikaziDatumIVreme()">
<div id="okvir">
	<div class="header">
			<div class="column">
				
				<?php
				include('zaglavlje.php');
				?>
			
				<?php
				include('unesinavadmin.php');
				?>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Unesi aktivistu</h1>
					<div id="sadrzaj">
						<form action="../registruj-aktivistu.php" method="post">
						<label for="input-ime">Ime:</label>
						<input id="input-ime" type="text" name="ime" required><br>
						<label for="input-prezime">Prezime:</label>
						<input id="input-prezime" type="text" name="prezime" required><br>
						<label for="i-phone">Telefon:</label>
						<input type="phone" name="telefon" id="i-phone" required><br>
						<label for="input-adresa">Adresa:</label>
						<textarea rows="4" name="adresa" id="input-adresa" required></textarea><br>
						<label for="input-email">E-mail:</label>
						<input type="email" name="email" id="input-email"  required><br>
						<label for="password">Password:
						<input type="password" name="sifra" size=“20” required><br>
						<br>
						<button type="submit">Registruj aktivistu</button>
						</form>
					</div>
			
			</div>
	</div>
	
	
	
	<?php
	include('footeradminaktivista.php')
	?>
</div>
</body>

</html>