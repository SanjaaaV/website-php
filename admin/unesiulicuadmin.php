<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="unesiulicuadmin.css">
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
	
	
	<div class="page" id="unosulice">
			<div class="column">
					<h1>Unesi ulicu</h1>
					<div id="sadrzaj">
						<form action=“unesi-ulicu.php" method="post">
						
						<label for="ulica">Ulica:   </label><br>
						<input id="ulica" type="text" name="Ulica" required><br>
						<br>
						<button type="submit">Dodaj ulicu</button>
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