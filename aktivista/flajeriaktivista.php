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
			
			<nav id="navigacija">
					<div>
						<a href="navigacijaaktivista.php"  >Početna</a>
					</div>
					<div>
						<a href="flajeriaktivista.php" class="active" >Flajeri</a>
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
						<a href="../loguot.php">Izloguj se</a>
					</div>
				</nav>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Vaši flajeri</h1>
					<div id="sadrzaj">
						<form action=“flajer-aktivista.php" method="post">
							<label><b>Odaberite jedan flajer:</b></label><br>
							<ul>
							<li><input type="radio" name="kategorija" value="1"> Flajer1<br></li>
							<li><input type="radio" name="kategorija" value="2"> Flajer2<br></li>
							<li><input type="radio" name="kategorija" value="3"> Flajer3<br></li>
							<li><input type="radio" name="kategorija" value="4"> Flajer4<br></li>
							<li><input type="radio" name="kategorija" value="5"> Flajer5<br></li>
							<li><input type="radio" name="kategorija" value="1"> Flajer1<br></li>
							<li><input type="radio" name="kategorija" value="2"> Flajer2<br></li>
							<li><input type="radio" name="kategorija" value="3"> Flajer3<br></li>
							<li><input type="radio" name="kategorija" value="4"> Flajer4<br></li>
							<li><input type="radio" name="kategorija" value="5"> Flajer5<br></li>
							<li><input type="radio" name="kategorija" value="1"> Flajer1<br></li>
							<li><input type="radio" name="kategorija" value="2"> Flajer2<br></li>
							<li><input type="radio" name="kategorija" value="3"> Flajer3<br></li>
							<li><input type="radio" name="kategorija" value="4"> Flajer4<br></li>
							</ul><br>
							<button type="submit">Prosledi</button>
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