<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="naslovnaadminaktivista.css">
	<title>Aktivista</title>
	<meta http-equiv="content-type" charset="utf-8">
</head>

<body>
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
									<li>flajer1 popusti</li>
									<li>flajer2 popusti</li>
									<li>flajer3 popusti</li>
									<li>flajer4 popusti</li>
									<li>flajer5 popusti</li>	
									<li>flajer1 popusti</li>
									<li>flajer2 popusti</li>
									<li>flajer3 popusti</li>
									<li>flajer4 popusti</li>
									<li>flajer5 popusti</li>
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