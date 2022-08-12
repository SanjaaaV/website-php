<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="unesiflajeradmin.css">
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
				include('unesinavadmin.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="unosflajera">
			<div class="column">
					<h1>Unesi flajer</h1>
					<div id="sadrzaj">
						<form name="dodaj-flajer.php" method="post" enctype="multipart/form-data">
						<label for="input-ime">Naziv flajera:</label>
						<input id="input-ime" type="text" name="Imeflajera" required><br>
						
						<label for="html-kod">Html kod:  </label><br>
						<textarea rows="6" name="htmlkod" id="html-kod" style="padding: 10px;" placeholder="HTML kod..." required></textarea><br>
						
						<label for="myfile">Dodaj pdf:</label>
						<input type="file" id="myfile" name="pdf"><br>
						
						<label for="broj-flajera">Broj flajera:</label>
						<input id="broj-flajera" type="number" min="0" step="1" name="broj-flajera" required><br>
						
						<label for ="kategorija">Flajer je:  </label>
							<input type="radio" class="injavni" name="kategorija" value="1"> Javni  
							<input type="radio" class="injavni" name="kategorija" value="2"> Tajni <br>
			
						<br>
						<button type="submit" name="dodajflajer">Dodaj flajer</button>

						<?php 
							include "../funkcije.php";
                                if(isset($_POST['dodajflajer'])){
                                     Funkcije::dodajFlajer($_POST['Imeflajera'], $_POST['htmlkod'],$_FILES['pdf']['tmp_name'], $_POST['broj-flajera'], $_POST['kategorija']);
									 echo "Flajer je dodat.";
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