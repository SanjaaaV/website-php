<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="azurirajaktivistuadmin.css">
	<title>Administrator</title>
	<meta charset="utf-8">
</head>

<body>
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
					<h1>Ažuriraj flajer</h1>
					<div id="sadrzaj">
						<form action=“azuriraj-flajer.php" method="post">
							<p><b>Spisak flajera</b></p><br>
							<ul id="lista-flajera">
								<li>flajer1<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer2<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer3<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer4<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer5<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer1<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer2<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer3<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								<li>flajer4<button type="submit">Ažuriraj</button>  <button type="submit">Obriši</button></li>
								
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