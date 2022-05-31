<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="registrujse.css">
	<title>Deljenje flajera</title>
	<meta http-equiv="content-type" charset="utf-8">
</head>

<body>
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
						<a href="ulogujse.php" >Uloguj se</a>
					</div>
					
				</nav>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Registruj se</h1>
					<div id="sadrzaj">
						<form action="registruj-se.php" method="post">
						
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
						<input type="password" name="sifra" size="20" required><br>
						<br>
						<button type="submit"><b>Registruj se</b></button>
						</form>
					</div>
			
			</div>
	</div>
	
	
	
	<div class="footer">
			<div class="column">
			<?php
				include('footerdeo.php');
				?>
			</div>
	</div>
</div>
</body>

</html>