<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="unesiulicuadmin.css">
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
	
	
	<div class="page" id="unosulice">
			<div class="column">
					<h1>Unesi ulicu</h1>
					<div id="sadrzaj">
						<form name="unesi-ulicu.php" method="post">
						
						<label for="ulica">Ulica:   </label><br>
						<input id="ulica" type="text" name="ulica" required><br>
						<br>
						<button type="submit" name="unesiulicu">Dodaj ulicu</button>

						<?php
							include "../funkcije.php";
							if (isset ($_POST['unesiulicu'])){
								Funkcije::unesiUlicu($_POST['ulica']);
								echo "Želite da unesete adresu?  ", '<a href="unesiadresuadmin.php"  style="text-decoration:underline; color: #fff;" >', "Unesi adresu","</a>";
							}
						?>



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