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
odobren smallint(3),
listaIDFlajera VARCHAR(200),
listaBrojeva VARCHAR(200),
listaDatumaDodele VARCHAR(200) )";
$veza->select_db("flajerisanje");
mysqli_query($veza,$sql);

$sifra="vrata";
$opcije = ['cost' => 10];
 $sifrovanaLozinka= password_hash($sifra, PASSWORD_DEFAULT,$opcije);
$sql="INSERT INTO flajerisanje.aktivisti SET email='milicasavic@gmail.com', telefon='0645231985', sifra='$sifrovanaLozinka', odobren='1', listaIDFlajera='2,4', ime='Milica', prezime='Savić', listaBrojeva='30,20', listaDatumaDodele='2022-06-20,2022-06-25' ";
$veza->select_db("flajerisanje");
if(mysqli_query($veza,$sql)){
    echo "uspehposlednje";
   }

   $sifra="radijator";
   $opcije = ['cost' => 10];
    $sifrovanaLozinka= password_hash($sifra, PASSWORD_DEFAULT,$opcije);
   $sql="INSERT INTO flajerisanje.aktivisti SET email='sasajovanovic@gmail.com', telefon='06452312536', sifra='$sifrovanaLozinka', odobren='1', listaIDFlajera='2,4', ime='Sasa', prezime='Jovanović', listaBrojeva='30,20', listaDatumaDodele='2022-06-20,2022-06-25' ";
   $veza->select_db("flajerisanje");
   if(mysqli_query($veza,$sql)){
       echo "uspehposlednje";
      }


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


   $sql ="CREATE TABLE flajeri (
    IDflajera INT AUTO_INCREMENT PRIMARY KEY,
    naziv VARCHAR(50),
    HTMLfajl VARCHAR(50),
    PDFFajl  VARCHAR(50),
    brojFlajera  INT(200),
    brojPreostalihFlajera INT(200),
    brojZgrada INT(200),
    brojPreostalihZgrada INT(200),
    javan SMALLINT (3),
    odobren SMALLINT (3)
     )";
        $veza->select_db("flajerisanje");
        mysqli_query($veza,$sql);
    $sql= "INSERT INTO flajerisanje.flajeri (IDflajera, naziv, HTMLfajl, PDFFajl, brojFlajera, brojPreostalihFlajera, javan, odobren) VALUES
        (1, 'Masaže', './flajeri/MasažeFile.html', './flajeri/MasažeFile.pdf', 400, 150, 1, 0),
        (2, 'Afrička kultura', './flajeri/AfrickakulturaFile.html', './AfrickakulturaFile.pdf', 350, 350, 1, 0),
        (3, 'FastFood', './flajeri/FastFoodFile.html', './flajeri/FastFoodFile.pdf', 200, 200, 1, 0),
        (4, 'Teretana', './flajeri/TeretanaFile.html', './flajeri/TeretanaFile.pdf', 300, 0, 0, 0),
        (5, 'ZUMBA', './flajeri/ZUMBAFile.html', './flajeri/ZUMBAFile.pdf', 150, 150, 1, 0)";
        $veza->select_db("flajerisanje");
        mysqli_query($veza,$sql);



    $sql ="CREATE TABLE adrese (
        IDadrese INT AUTO_INCREMENT PRIMARY KEY,
        IDulice INT(32),
        ulica VARCHAR(200),
        brojZgrade varchar(200),
        IDflajera  INT(32),
        brojFlajera INT(32),
        IDaktiviste INT(32),
        odobren smallint(3),
        flajerisano SMALLINT (3),
        datumDodele date,
        datumKraj DATE
         )";
        $veza->select_db("flajerisanje");
        mysqli_query($veza,$sql);
        $sql= "INSERT INTO flajerisanje.adrese (IDadrese, IDulice, ulica, brojZgrade, IDflajera, brojFlajera, IDaktiviste, odobren, flajerisano, datumDodele, datumKraj) VALUES
            (1, '1', 'Bulevar Kralja Aleksandra', '3', '2', '30', '1','1','0', '2022-06-20', null),
            (2, '3', 'Ruzveltova', '3', '4', '25', '1','1','0', '2022-06-25' , null)";
             $veza->select_db("flajerisanje");
             mysqli_query($veza,$sql);



        $sql ="CREATE TABLE ulica (
            IDulice INT AUTO_INCREMENT PRIMARY KEY,
            ulica VARCHAR(200),
            IDflajera   INT(32),
            brojevi VARCHAR(200),
            nedodeljeniBrojevi VARCHAR(200)
             )";
            $veza->select_db("flajerisanje");
            mysqli_query($veza,$sql);
        $sql= "INSERT INTO flajerisanje.ulica (`IDulice`, `ulica`, `brojevi`, `nedodeljeniBrojevi`, `IDflajera`) VALUES
            (1, 'Bulevar Kralja Aleksandra', '2,3,4', '', 1),
            (2, 'Kraljice Marije', '1,2,3,4,5', '1,2,3,4,5', 1),
            (3, 'Ruzveltova', '2,3,4', '2,3,4', 2),
            (4, 'Sinđelićeva', '11,13,15', '11,13,15', 3),
            (5, 'Gospodava Vučica', '7,8,9', '7,8,9', 3),
            (6, 'Višnjička', '20,21', '20', 4),
            (7, 'Patrisa Lumube', '5,6,7,8,9,10', '5,6,9', 5)
            ";
             $veza->select_db("flajerisanje");
             mysqli_query($veza,$sql);


             


$veza->close();
?>