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
						<a href="../logout.php">Izloguj se</a>
					</div>
				</nav>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Vaši flajeri</h1>
					<div id="sadrzaj">
						<form name="flajer-aktivista.php" method="post">
							<label><b>Odaberite jedan flajer:</b></label><br>
							<ul>
							<?php 
							include "../funkcije.php";
                                    $trenutniKor = Funkcije::getTrenutnogKorisnika('user');
                                    $flajeri= Funkcije::getSveFlajereKorisnika($trenutniKor['IDaktiviste'], 1);
									$redniBroj=1;
                                    if (sizeof($flajeri)>0){
                                        foreach ($flajeri as $f) {
                                            $flajer = Funkcije::getFlajer($f['IDflajera']);
                                            echo '<li>';
                                                 echo $redniBroj,". ", $flajer['naziv'], '<button name="trenutniFlajer" type="submit"  value="'.$flajer['IDflajera'].'"> Izaberi </button> ';
                                            echo '</li>';
											$redniBroj++;
                                         }
                                    }
                                    else {
                                        echo "Nema flajera.";
                                    }
                                 ?>
							</ul><br>
							<?php 
                             if(isset($_POST['trenutniFlajer'])){
                                $IDflaj = $_POST['trenutniFlajer'];
                                $izabraniflajer = Funkcije:: getFlajer($IDflaj);
								$_SESSION['trenutniFlajer'] =  $izabraniflajer ;
                                echo "Izabran je flajer : ".$izabraniflajer['naziv']." ";
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