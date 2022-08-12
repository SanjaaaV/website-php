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
				include('azurirajnavadmin.php');
				?>
				
			</div>
	</div>
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Ažuriraj adresu</h1>
					<div id="sadrzaj">
						<form action=“azuriraj-adresu.php" method="post">
							<p><b>Spisak adresa</b></p><br>
							<ul id="lista-ulica">
								<li>ulica 3,24,58<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>ulica 3,24,58<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>ulica 3,24,58<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>ulica 3,24,58<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>ulica 3,24,58<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>	
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