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
					<h1>Unesi adresu</h1>
					<div id="sadrzaj">
						<form name="unesi-adresu.php" method="post">
							<label for="adresa">Ulica:</label>
							<select name="ulica" id="adresa">
							<?php
							include "../funkcije.php";
									$ulice= Funkcije::getMoguceUliceZaAdresu();
                                    foreach ($ulice as $ulica) {
                                        echo"<option value='$ulica[IDulice]'>"  ."$ulica[ulica]". "</option>";
									}
							?>
							</select><br>
							<label>Brojevi zgrada odvojeni zarezom:</label>
							<input type="text" name="brojz" class="brzgrade">
							<br>
							<label for="flajer">Flajer:</label>
							<select name="flajer" id="flajer">
							<?php
							
									$flajeri= Funkcije::getSveFlajereAdmin();
                                    foreach ($flajeri as $f) {
                                        echo"<option value='$f[IDflajera]'>"  ."$f[naziv]". "</option>";
									}
							?>
							</select><br>
							<br>
							
						<button type="submit" name="unesiadresu">Dodaj adresu</button>
						<?php
							if (isset ($_POST['unesiadresu'])){
								Funkcije::unesiAdresu($_POST['ulica'], $_POST['brojz'], $_POST['flajer'] );
								
								echo "Uneli ste adrese.";
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