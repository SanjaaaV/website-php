<?php
$veza=new mysqli("localhost", "root", "");
if($veza) {
    echo "uspeh <br>";
   }
   
$sql="DROP DATABASE IF EXISTS flajerisanje";
if(mysqli_query($veza,$sql)){
    echo "uspeh";
   }

$sql="CREATE DATABASE IF NOT EXISTS flajerisanje DEFAULT CHARACTER SET utf8mb4 COLLATE
utf8mb4_general_ci";
if(mysqli_query($veza,$sql)){
    echo "uspeh";
   }
$veza->set_charset("utf8mb4");

$sql ="CREATE TABLE aktivisti (
IDaktiviste INT AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(50),
prezime VARCHAR(50),
telefon  VARCHAR(45),
email  VARCHAR(200),
sifra VARCHAR(200),
listaIDFlajera VARCHAR(200),
listaBrojeva VARCHAR(200),
listaDatumaDodele DATE )";

$veza->select_db("flajerisanje");
mysqli_query($veza,$sql);


$sql ="CREATE TABLE administratori (
IDadministratora INT AUTO_INCREMENT PRIMARY KEY,
ime VARCHAR(50),
prezime VARCHAR(50),
email  VARCHAR(200),
sifra VARCHAR(200))";

$veza->select_db("flajerisanje");
mysqli_query($veza,$sql);

$sifra="internetprogramiranje";
$opcije = ['cost' => 10];
 $sifrovanaLozinka= password_hash($sifra, PASSWORD_DEFAULT,$opcije);
$sql="INSERT INTO flajerisanje.administratori SET email='sanja.vukelic1997@gmail.com', sifra='$sifrovanaLozinka', ime='Sanja', prezime='Vukelić'";
$veza->select_db("flajerisanje");
if(mysqli_query($veza,$sql)){
    echo "uspehposlednje";
   }
$veza->close();
?>