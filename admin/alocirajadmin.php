<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="alocirajadmin.css">
	<title>Administrator</title>
	<meta charset="utf-8">
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
						<a href="navigacijaadmin.php"  >Početna</a>
					</div>
					<div>
						<a href="flajeriadmin.php" >Flajeri</a>
					</div>
					<div>
						<a href="aktivistiadmin.php" >Aktivisti</a>
					</div>

					<?php
					include('unesiazurirajnav.php');
					?>
					
					<div>
						<a href="alocirajadmin.php" class="active" >Alociraj</a>
					</div>
					
					<div>
						<a href="odobriaktivistuadmin.php" >Odobri</a>
						<div>
							<div class="drop-content">
								<a href="odobriaktivistuadmin.php">Aktivistu</a>
							</div>
							<div class="drop-content">
								<a href="odobrizahtevadmin.php">Zahtev</a>
							</div>
						</div>
					</div>
					
					<div>
						<a href="../logout.php">Izloguj se</a>
					</div>
				</nav>
				
			</div>
	</div>
	
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Alociranje</h1>
					<div id="sadrzaj">
						<form action=“alokacija.php" method="post">
							<label for="input-flajer">Flajer:</label>
							<select name="flajer" id="input-flajer">
								<option value="0001">flajer1</option>
								<option value="0002">flajer2</option>
								<option value="0003">flajer3</option>
								<option value="0004">flajer4</option>
								<option value="0005">flajer5</option>
								<option value="0006">flajer6</option>
							</select><br>
							<label for="input-aktivista">Aktivista:</label>
							<select name="aktivista" id="input-aktivista">
								<option value="0001">aktivista1</option>
								<option value="0002">aktivista2</option>
								<option value="0003">aktivista3</option>
								<option value="0004">aktivista4</option>
								<option value="0005">aktivista5</option>
								<option value="0006">aktivista6</option>
							</select><br>
							
							<label for="input-ulica">Ulica:</label>
							<select name="ulica" id="input-ulica">
								<option value="0001">ulica1</option>
								<option value="0002">ulica2</option>
								<option value="0003">ulica3</option>
								<option value="0004">ulica4</option>
								<option value="0005">ulica5</option>
								<option value="0006">ulica6</option>
							</select><br>
							
							<label>Brojevi zgrada odvojeni zarezom:</label>
							<input type="text" name="brojz1" class="brzgrade"><br>
								
							<label for="broj">Broj flajera:</label>
							<input type="number" step="1" id="broj"
								min="0"  value="0"  required><br><br>
								
							<button type="submit">Alociraj</button>
							
							
							
							
						</form>
					</div>
			
			</div>
	</div> 
	
	
	
	<?php
	include('footeradminaktivista.php')
	?>
</div>
</body>