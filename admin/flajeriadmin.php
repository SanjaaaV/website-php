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
			
				<nav id="navigacija">
					<div>
						<a href="navigacijaadmin.php"  >Početna</a>
					</div>
					<div>
						<a href="flajeriadmin.php" class="active" >Flajeri</a>
					</div>
					<div>
						<a href="aktivistiadmin.php" >Aktivisti</a>
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
					<h1>Flajeri</h1>
					<div id="sadrzaj">
						<form action=“spisak-flajera.php" method="post">
							<p><b>Spisak flajera</b></p><br>
							<ul id="lista-flajera">
								<li>flajer1  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer2  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer3  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer4  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer5  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer1  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer2  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer3  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer4  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>
								<li>flajer5  <label>Br.zgrada: 8 </label><label> Br.flajera: 54</label><button type="submit">Ažuriraj</button>  <button type="submit">Alociraj</button></li>		
							
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