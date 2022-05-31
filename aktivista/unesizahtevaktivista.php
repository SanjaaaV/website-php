<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="flajeriaktivista.css">
	<title>Aktivista</title>
	<meta charset="utf-8">
</head>

<body>
<div id="okvir">
	<div class="header">
			<div class="column">
				
				<?php
				include('zaglavlje.php');
				?>
			
				<?php
				include('unesinavaktivista.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Unesi zahtev</h1>
					<div id="sadrzaj">
						<br><form action=“unesi-zahtev.php" method="post">
							<label for="adresa">Izaberi flajer:</label>
							<select name="flajer" id="adresa">
								<option value="0001">prvi flajer</option>
								<option value="0002">drugi flajer</option>
								<option value="0003">treci flajer</option>
								<option value="0004">cetvrti flajer</option>
								<option value="0005">peti flajer</option>
								<option value="0006">sesti flajer</option>
							</select><br>
							<label for="broj-flajera">Broj flajera:</label>
							<input id="broj-flajera" type="number" min="0" step="1" name="broj-flajera" required><br>
						
							<label for="adresa">Ulica:</label>
							<select name="ulica" id="adresa">
								<option value="0001">prva ulica</option>
								<option value="0002">druga ulica</option>
								<option value="0003">treca ulica</option>
								<option value="0004">cetvrta ulica</option>
								<option value="0005">peta ulica</option>
								<option value="0006">sesta ulica</option>
							</select><br>
							<label>Brojevi zgrada odvojeni zarezom: </label>
							<input type="text" name="brojz1" class="brzgrade">
							<br><br>
							
							<button type="submit">Zahtev</button>
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