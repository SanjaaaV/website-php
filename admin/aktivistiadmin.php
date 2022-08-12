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
			function filter(){
				var filterVrednost, input, ul, li, i;
				input = document.getElementById('pretraga');
				filterVrednost = input.value.toUpperCase();
				ul = document.getElementById('lista-aktivista');
				li = ul.getElementsByTagName('li');

				for(i=0;i<li.length;i++){
					var a = li[i].getElementsByTagName('a')[0];
					if(a.innerHTML.indexOf(filterVrednost) > -1){
						li[i].style.display = "";
					}else{
						li[i].style.display = "none";
					}
				}
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
						<a href="aktivistiadmin.php" class="active" >Aktivisti</a>
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
					<h1>Aktivisti</h1>
					<div id="sadrzaj">
						<form name="spisak-aktivista.php" method="post">
							<p><b>Spisak aktivista</b></p>
							<input onkeyup="filter()" id="pretraga"  type="text" style="width: 150px; height:25px; font-size: 18px;" name="poPrezimenu" placeholder="Pretraga..." ><br><br>
							<ul id="lista-aktivista">
							<?php 
							include "../funkcije.php";
                                    //$trenutniKor = Funkcije::getTrenutnogKorisnika('user');
                                    $aktivisti= Funkcije::getSveAktiviste();
                                    if (sizeof($aktivisti)>0){
                                        foreach ($aktivisti as $a) {
                                            echo '<li>';
											//echo '<p>';
												echo  ' ' ,' ',$a['ime'],' ', "<a>",$a['prezime'],"</a>";
											//echo '</p>';
                                            echo '</li>';
                                         }
                                    }
                                    else {
                                        echo "Nema flajera.";
                                    }
                                 ?>	
							</ul>
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