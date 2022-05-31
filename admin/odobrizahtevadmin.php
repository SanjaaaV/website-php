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
				include('odobrinavadmin.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Odobri zahtev</h1>
					<div id="sadrzaj">
						<form action=“odobri-zahtev.php" method="post">
							<p><b>Spisak zahteva</b></p><br>
							<ul id="lista-aktivista">
								<li>zahtev1 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev2 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev3 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev4 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev5 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev6 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev7 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev8 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>zahtev9 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
									
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