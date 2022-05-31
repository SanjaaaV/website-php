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
			
				<?php
				include('unesinavadmin.php');
				?>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Unesi adresu</h1>
					<div id="sadrzaj">
						<form action=“unesi-adresu.php" method="post">
							<label for="adresa">Ulica:</label>
							<select name="ulica" id="adresa">
								<option value="0001">prva ulica</option>
								<option value="0002">druga ulica</option>
								<option value="0003">treca ulica</option>
								<option value="0004">cetvrta ulica</option>
								<option value="0005">peta ulica</option>
								<option value="0006">sesta ulica</option>
							</select><br>
							<label>Brojevi zgrada odvojeni zarezom:</label>
							<input type="text" name="brojz1" class="brzgrade">
							<br><br>
							
						<button type="submit">Dodaj adresu</button>
						</form>
					</div>
			
			</div>
		</div>
	
	
	
	
		<?php
	include('footeradminaktivista.php')
	?>
</div>
</body>