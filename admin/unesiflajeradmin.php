<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="unesiflajeradmin.css">
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
	
	
	<div class="page" id="unosflajera">
			<div class="column">
					<h1>Unesi flajer</h1>
					<div id="sadrzaj">
						<form action=“dodaj-flajer.php" method="post">
						<label for="input-ime">Naziv flajera:</label>
						<input id="input-ime" type="text" name="Imeflajera" required><br>
						
						<label for="html-kod">Html kod:  </label><br>
						<textarea rows="6" name="htmlkod" id="html-kod" required></textarea><br>
						
						<label for="myfile">Dodaj pdf:</label>
						<input type="file" id="myfile" name="myfile"><br>
						
						<label for="broj-flajera">Broj flajera:</label>
						<input id="broj-flajera" type="number" min="0" step="1" name="broj-flajera" required><br>
						
						<label for ="kategorija">Flajer je:  </label>
							<input type="radio" class="injavni" name="kategorija" value="1"> Javni  
							<input type="radio" class="injavni" name="kategorija" value="2"> Tajni <br>
			
						<br>
						<button type="submit">Dodaj flajer</button>
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