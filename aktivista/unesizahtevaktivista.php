<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="flajeriaktivista.css">
	<title>Aktivista</title>
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
				include('unesinavaktivista.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Unesi zahtev</h1>
					<div id="sadrzaj">
						<br><form name="unesi-zahtev.php" method="post">
							<label for="adresa">Izaberi flajer:</label>
							<select name="trenutniflajer" id="adresa">
							<?php
							include "../funkcije.php";
							$trenutniKor = Funkcije::getTrenutnogKorisnika('user');
                                    $flajeri= Funkcije::getMoguciFlajeriZaZahtev();
                                    foreach ($flajeri as $flajer) {
                                        echo"<option value='$flajer[IDflajera]'>"  ."$flajer[naziv]". "</option>";
                                    }
									
                            ?>
							</select><br>
							<label for="broj-flajera">Broj flajera:</label>
							<input id="broj-flajera" type="number" min="0" step="1" name="brojflajera" required><br>

							<label> Broj ulica(možete odabrati najviše 5 ulica): </label>
                                <select id="streetNumberID" style="width: 100px;" name="brojulica">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select><br>
							
							<label for="adresa">Ulica(nedodeljene zgrade, flajer):</label>
							
							
								
								<select name="ulica" id="adresa" style="width: auto;">
								<?php
									$ulice= Funkcije::getMoguceUliceZaZahtev();
                                    foreach ($ulice as $ulica) {
										$flajer=Funkcije::getFlajer($ulica['IDflajera']);
                                        echo"<option value='$ulica[IDulice]'>"  ,"$ulica[ulica]"," (","$ulica[nedodeljeniBrojevi]",")","  za  ","$flajer[naziv]", "</option>";}
								?>	
								</select><br>

							<label for="broj-zgrada">Brojevi zgrada za izabranu ulicu(odvojeni zarezom):</label>
							<input id="broj-zgrada" type="text" style="width: 200px;" name="brojevizgrada" required><br>
							<br>
							
							<button type="submit" name="posaljiZahtev">Zahtev</button>

							<?php
                            if(isset($_POST['posaljiZahtev'])){
                                $ispravan= Funkcije::proveraIspravnostiZahteva();
                                if (!$ispravan['ispravanZahtev']){
                                   echo $ispravan['ispis'];
                                }
                                else {
									Funkcije::dodajAdresuZahtev( $_POST['trenutniflajer'], $_POST['ulica'], $_POST['brojevizgrada'], $trenutniKor['IDaktiviste'], $_POST['brojflajera']);
									echo "Zahtev je poslat na obradu.";
                                }
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