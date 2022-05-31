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
					<h1>Odobri registraciju aktiviste</h1>
					<div id="sadrzaj">
						<form action=“odobri-registraciju.php" method="post">
							<p><b>Spisak aktivista</b></p><br>
							<ul id="lista-aktivista">
								<li>aktivista1 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista2 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista3 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista4 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista5 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista1 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista2 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista3 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
								<li>aktivista4 <button type="submit">Odobri</button>  <button type="submit">Odbij</button></li>
									
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