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
					<h1>Odobri registraciju aktiviste</h1>
					<div id="sadrzaj">
						<form name="odobri-registraciju.php" method="post">
							<p><b>Spisak aktivista</b></p><br>
							<ul id="lista-aktivista">
							<?php 
							include "../funkcije.php";
                                    $aktivisti= Funkcije::getSveNeodobreneAktiviste();
                                    if (sizeof($aktivisti)>0){
                                        foreach ($aktivisti as $a) {
                                            echo '<li>';
												echo ' ',$a['ime'],' ',$a['prezime'], '<button name="odobri" type="submit"  value="'.$a['IDaktiviste'].'"> Odobri</button>', '<button name="obrisi" type="submit"  value="'.$a['IDaktiviste'].'"> Obriši</button>';
                                            echo '</li>';
                                         }
                                    }
                                    else {
                                        echo "Nema novih registracija.";
                                    }
                                 ?>
									
							</ul>
							<?php 
                                if(isset($_POST['odobri'])){
                                    $IDaktiv = $_POST['odobri'];
                                    Funkcije::odobriAktivistiReg($IDaktiv);
									echo "<script> location.href='odobriaktivistuadmin.php'; </script>";
                                }

								if(isset($_POST['obrisi'])){
                                    $IDaktiv= $_POST['obrisi'];
                                    Funkcije::obrisiAktivistiReg($IDaktiv);
                                    echo "<script> location.href='odobriaktivistuadmin.php'; </script>";
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