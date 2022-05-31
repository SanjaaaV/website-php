<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="flajeriaktivista.css">
	<title>Aktivista</title>
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
				include('unesinavaktivista.php');
				?>
				
			</div>
	</div>
	
	
	<div class="page" id="kartica">
			<div class="column">
					<h1>Unesi adresu</h1>
					<div id="sadrzaj">
						<form action=“unesi-adreseaktivista.php" method="post">
							<label><b>Označite da li je adresa izflajerisana:</b></label><br>
							<ul id="lista-alocadresa">
								<li>Adresa 1    <input type="checkbox" name="alocirana" id="i-alocirana1" value="1"><br></li>
								<li>Adresa 2    <input type="checkbox" name="alocirana" id="i-alocirana2" value="2"><br></li>
								<li>Adresa 3    <input type="checkbox" name="alocirana" id="i-alocirana3" value="3"><br></li>
								<li>Adresa 4    <input type="checkbox" name="alocirana" id="i-alocirana4" value="4"><br></li>
								<li>Adresa 5    <input type="checkbox" name="alocirana" id="i-alocirana5" value="5"><br></li>	
							</ul><br>
		
							<button type="submit">Prosledi</button>
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