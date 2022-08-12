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
					<h1>Unesi adresu</h1>
					<div id="sadrzaj">
						<form name="unesi-adreseaktivista.php" method="post">
						<ul id="lista-alocadresa">
						<?php 
							include "../funkcije.php";
							$trenutniKor = Funkcije::getTrenutnogKorisnika('user');
							$izabraniflajer='';
							if(isset($_SESSION['trenutniFlajer'])){
								$izabraniflajer = $_SESSION['trenutniFlajer'];}
                             if ($izabraniflajer == ""){
                        	    echo 'Niste odabrali flajer. Idite na stranicu za izbor flajera';
                            }
                            else {
                                $infos=Funkcije::getinfoKorSpecFlajer($trenutniKor['IDaktiviste'],$izabraniflajer['IDflajera'], 1);
                                            if (sizeof($infos)>0){
											$rednibroj=1;
											echo "<label>Odabrani flajer : ".$izabraniflajer['naziv']." </label><br>";
											echo "<label>Izaberite adrese(naziv ulice, brojevi zgrada, završeno):</label><br><br>";
                                            foreach ($infos as $info) {
                                                $ulica= Funkcije::getUlicu($info['IDulice']);
                                                $zavrseno = ($info['flajerisano'] == 1) ? "Da" : "Ne";
                                                $dugme = '<td> <button name="flajerisano"  type="submit" value="'.$info['IDadrese'].'"> Izflajeriši </button> </td>';
                                                $button = ($zavrseno == "Da") ? "<td></td>" : $dugme;
                                                echo '<li>';
                                                     echo $rednibroj, ". ", $ulica['ulica'], ",", $info['brojZgrade'], ", ", $zavrseno ;
                                                     echo $button;
                                                echo '</li>';
												$rednibroj++;
                                             }
											}
											else {
												echo 'Nema adresa za flajerisanje za odabrani flajer.';
											}
                            }
                         ?>	
						</ul><br>
							<?php 
                               if(isset($_POST['flajerisano'])){
                                 $IDupita = $_POST['flajerisano'];
                                if( Funkcije::zahtevAdr($IDupita)){
									echo "Uspešno.";
									echo  "<script> location.href='unesiadreseaktivista.php'; </script>";
								}
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