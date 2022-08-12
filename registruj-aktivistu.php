<?php

session_start();

if(isset($_POST['sifra'])) {
 $veza=new mysqli("localhost", "root", "");
 $veza->set_charset("utf8");
 $ime=$_POST['ime'];
 $prezime=$_POST['prezime'];
 $telefon=$_POST['telefon'];
 $sifra=$_POST['sifra'];
 $email=$_POST['email'];

 $opcije = ['cost' => 10];
 $sifrovanaLozinka= password_hash($sifra, PASSWORD_DEFAULT,$opcije);

 $upit="INSERT INTO flajerisanje.aktivisti (email,sifra,ime,prezime,telefon, odobren) VALUES ('$email','$sifrovanaLozinka','$ime','$prezime','$telefon','1')";

 $rez=$veza->query($upit);
 $veza->close();
 
}
if($rez){
    echo  'Upešno ste registrovali aktivistu.  <a href="admin/navigacijaadmin.php"><b>Navigacija</b></a>';
}
?>