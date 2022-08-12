<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="naslovnastil.css">
	<title>Deljenje flajera</title>
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
						<a href="Naslovna (1).php" class="active">Početna</a>
					</div>
					<div>
						<a href="./ulogujse.php">Uloguj se</a>
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
									include 'funkcije.php';
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
		
		
		
		<div class="footer">
			<div class="column">
				<?php
				include('footerdeo.php');
				?>
				<div class="footer-column" "align-right">
					<a class="red-link" href="./ulogujse.php">Uloguj se </a><br>
					<a class="red-link" href="./registrujse.php">Registruj se</a><br>
				</div>
			</div>
		</div>



</div>
</body>

</html>