<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="azurirajaktivistuadmin.css">
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
				include('odobrinavadmin.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Odobri zahtev</h1>
					<div id="sadrzaj">
						<form name="odobri-zahtev.php" method="post">
							<p><b>Spisak zahteva</b></p><br>
							<p style="font-size:18px;">Aktivista, tip flajera(broj flajera), Ulica(zgrade) </p><br>
							<ul id="lista-aktivista">
							<?php 
							include "../funkcije.php";
                                    $zahtevi = Funkcije::getZahteveZaOdobrenje();
                                    if (sizeof($zahtevi)>0){
                                        foreach ($zahtevi as $z) {
                                            $aktivista = Funkcije::getAktv($z['IDaktiviste']);
                                            $flajer = Funkcije::getFlajer($z['IDflajera']);
                                            $ulica = Funkcije::getUlicu($z['IDulice']);
                                             echo '<li>';
                                                 echo $aktivista['ime']." ".$aktivista['prezime'].", ".$flajer['naziv']." (".$z['brojFlajera']."),  ".$ulica['ulica']." (".$z['brojZgrade'].") ".
												 '<button name="odobri" type="submit"  value="'.$z['IDadrese'].'"> Odobri</button>', '<button name="obrisi" type="submit"  value="'.$z['IDadrese'].'"> Obriši</button>';
                                            echo '</li>';
                                         }
                                    }
                                    else {
                                         echo"Nema novih zahteva";
                                    }
                                ?>	
							</ul>
							<?php 
                                if(isset($_POST['odobri'])){
                                    $IDzah = $_POST['odobri'];
                                    Funkcije::odobriZahtev($IDzah);
									echo "<script> location.href='odobrizahtevadmin.php'; </script>";
                                }

								if(isset($_POST['obrisi'])){
                                    $IDzah= $_POST['obrisi'];
                                    Funkcije::obrisiAktivistiZahtev($IDzah);
                                    echo "<script> location.href='odobrizahtevadmin.php'; </script>";
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