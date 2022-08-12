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
					<h1>Unesi broj flajera</h1>
					<div id="sadrzaj">

						<br><form name="unesi-brpreostalihflajera.php" method="post">
						<?php 
							include "../funkcije.php";
							$izabraniflajer='';
							if(isset($_SESSION['trenutniFlajer'])){
								$izabraniflajer = $_SESSION['trenutniFlajer'];}
                             if ($izabraniflajer == ""){
                        	    echo 'Niste odabrali flajer. Idite na stranicu za izbor flajera';
                            }
                            else {
                                echo "<label>Odabrani flajer : ".$izabraniflajer['naziv']." </label><br>";
								echo "<label id=\"brojflajeralabela\">Broj preostalih flajera je: </label>";
                                echo "<input type=\"number\"  class=\"brflajera\" style=\"width:180px;\" name=\"brojflajera\" min=\"1\" max=\"500\" placeholder=\"Broj flajera...\"><br><br>";
                                echo '<button name="updatebrFlajera" type="submit"> Prosledi </button>';
                            }
                         ?>
						<?php 
                                if(isset($_POST['updatebrFlajera'])){
                                    Funkcije::dodajPreostaleFlajere($izabraniflajer);
                                }
                            ?>	
						</form><br> 
								
				
					</div>
			
			</div>
		</div>
	
	
	
	
		<?php
	include('footeradminaktivista.php')
	?>
</div>
</body>

</html>