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
			
				<nav id="navigacija">
					<div>
						<a href="navigacijaadmin.php"  >Početna</a>
					</div>
					<div>
						<a href="flajeriadmin.php" class="active" >Flajeri</a>
					</div>
					<div>
						<a href="aktivistiadmin.php" >Aktivisti</a>
					</div>

					<?php
					include('unesiazurirajnav.php');
					?>
					
					<div>
						<a href="alocirajadmin.php">Alociraj</a>
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
					<h1>Flajeri</h1>
					<div id="sadrzaj">
						<form name="spisak-flajera.php" method="post">
							<p><b>Flajer(broj preostalih flajera)</b></p><br>
							<ul id="lista-flajera">
							<?php 
							include "../funkcije.php";
                                    //$trenutniKor = Funkcije::getTrenutnogKorisnika('user');
                                    $flajeri= Funkcije::getSveFlajereAdmin();
                                    if (sizeof($flajeri)>0){
                                        foreach ($flajeri as $f) {
                                            echo '<li>';
                                                 echo ' ', "<a href=\"".$f['PDFFajl']."\"  style='text-decoration:none; color: #fff;' >", $f['naziv'],' (', $f['brojPreostalihFlajera'],') ', "</a>", '<button name="azuriraj" type="submit"  value="'.$f['IDflajera'].'"> Ažuriraj </button> ', '<button name="alociraj" type="submit"  value="'.$f['IDflajera'].'"> Alociraj </button> ';
                                            echo '</li>';
                                         }
                                    }
                                    else {
                                        echo "Nema flajera.";
                                    }
                                 ?>
							</ul>
							<?php 
                                if(isset($_POST['alociraj'])){
                                    $IDflaj = $_POST['alociraj'];
                                    $flajer =Funkcije::getFlajer($IDflaj);
                                    $_SESSION['izabraniFlaj']= $flajer['naziv'];
                                    echo "<script> location.href='alocirajadmin.php'; </script>";
                                }

								if(isset($_POST['azuriraj'])){
                                    $IDflaj = $_POST['azuriraj'];
                                    $flajer =Funkcije::getFlajer($IDflaj);
                                    $_SESSION['izabraniFlaj']= $flajer['naziv'];
                                    echo "<script> location.href='azurirajflajeradmin.php'; </script>";
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