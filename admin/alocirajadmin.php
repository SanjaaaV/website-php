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
						<form name="alokacija.php" method="post">
							<label for="input-flajer">Flajer:</label>
							<select name="trenutniflajer" id="input-flajer">
							<?php
							include "../funkcije.php";
                                        $flajeri = Funkcije::getSveFlajereAdmin();
                                        $izabraniFlajer =$_SESSION['izabraniFlaj'];
                                        $_SESSION['izabraniFlaj']=null;
                                        foreach ($flajeri as $f) {
                                            $selected = "";
                                            if ($f['naziv'] == $izabraniFlajer){
                                                $selected = " selected";
                                            }
                                            echo "<option value='$f[IDflajera]' ".$selected.">".$f['naziv']."</option>";
                                        }
                                    ?>
							</select><br>
							<label for="input-aktivista">Aktivista:</label>
							<select name="aktivista" id="input-aktivista">
							<?php
                                        $activisti = Funkcije::getSveAktiviste(1);
                                        foreach ($activisti as $a) {
                                            echo "<option value='$a[IDaktiviste]'>".$a['ime']." ".$a['prezime']."</option>";
                                        }
                                    ?>
							</select><br>
							
							<label for="input-ulica">Ulica:</label>
							<select name="ulica" id="input-ulica">
							<?php
									$ulice= Funkcije::getMoguceUliceZaZahtev();
                                    foreach ($ulice as $ulica) {
										$flajer=Funkcije::getFlajer($ulica['IDflajera']);
                                        echo"<option value='$ulica[IDulice]'>"  ,"$ulica[ulica]"," (","$ulica[nedodeljeniBrojevi]",")","  za  ","$flajer[naziv]", "</option>";}
								?>	
							</select><br>
							
							<label>Brojevi zgrada odvojeni zarezom:</label>
							<input type="text" name="brojevizgrada" class="brzgrade"><br>
								
							<label for="broj">Broj flajera:</label>
							<input type="number" step="1" id="broj"
								min="0"  value="0" name="brojflajera" required><br><br>
								
							<button type="submit" name="alokacija">Alociraj</button>
							
							<?php
                            if(isset($_POST['alokacija'])){
                                $ispravan= Funkcije::proveraIspravnostiZahteva();
                                if (!$ispravan['ispravanZahtev']){
                                   echo $ispravan['ispis'];
                                }
                                else {
									Funkcije::dodajAdresuZahtevAdmin( $_POST['trenutniflajer'], $_POST['ulica'], $_POST['brojevizgrada'], $_POST['aktivista'], $_POST['brojflajera']);
									echo "Alokacija uspešna.";
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