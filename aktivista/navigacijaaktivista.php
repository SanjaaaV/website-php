<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="naslovnaadminaktivista.css">
	<title>Aktivista</title>
	<script>
			function prikaziDatumIVreme(){
				document.getElementById("vremeIdatum").innerHTML=Date();
			}
		</script>
	<meta http-equiv="content-type" charset="utf-8">
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
						<a href="navigacijaaktivista.php" class="active" >Početna</a>
					</div>
					<div>
						<a href="flajeriaktivista.php"  >Flajeri</a>
					</div>
					<div>
						<a href="unesizahtevaktivista.php" >Unesi</a>
						<div>
							<div class="drop-content">
								<a href="unesizahtevaktivista.php">Zahtev</a>
							</div>
							<div class="drop-content">
								<a href="unesiadreseaktivista.php">Adrese</a>
							</div>
							<div class="drop-content">
								<a href="unesibrojflajeraaktivista.php">Broj flajera</a>
							</div>
						</div>
					</div>

					<div>
						<a href="../logout.php">Izloguj se</a>
					</div>
				</nav>
				
			</div>
	</div>
	
	<div class="page" id="pocetna">
			<div class="column">
					<h1>Početna</h1>
					<div class="flex-container">
						<div id="c">
							<div><h2>Javni flajeri</h2></div>
							<div id="skrol">
								<ul id="lista-flajera">
								<?php 
									include "../funkcije.php";
               						$flyers =  Funkcije::getSveFlajere(1);
              						// Helper::setSession('publicFlyers', $flyers);
              						 if (sizeof($flyers)>0){
                  						 foreach ($flyers as $flyer) {
                       						echo '<li>';
                       						echo file_get_contents($flyer['HTMLfajl']);
                       						echo '</li>';
                   						 }
              						 }
              						// else {
                  						// Helper::message('Nema javnih flajera');
               						//}
           						 ?>
								</ul>
							</div>
						</div>

						<div id="d"><h2>Uputstvo za aktiviste</h2><br>Ovakav vid posla je odličan za studente ili kao dodatni posao.
						Radno vreme je fleksibilno i možete ga uskladiti za svojim obavezama. 
						Ulogujte se i unesite adrese koje bi vam najviše odgovarale, a mi ćemo Vas za iste angažovati, kako bismo bili što efikasniji. 
						Potrebno je da se registrujete na sajtu ukoliko već namate nalog.
						Moći ćete da izaberete adrese koje vam najviše odgovaraju za deljenje flajera.
						Srećno!
						</div>
					</div>
			
			</div>
		</div>
	
	
	
	<?php
	include('footeradminaktivista.php')
	?>
	
</div>
</body>

</html>