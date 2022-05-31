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
					<h1>Unesi broj flajera</h1>
					<div id="sadrzaj">
						<br><form action=“unesi-brpreostalihflajera.php" method="post">
						<label id="brojflajeralabela">Broj preostalih flajera je: </label>
						<input type="number" name="brojflajera" class="brflajera"
								min="0" step="1"><br><br>
						<button type="submit">Prosledi</button>
						</form><br>
				
					</div>
			
			</div>
		</div>
	
	
	
	
		<?php
	include('footeradminaktivista.php')
	?>
</div>
</body>

</html>