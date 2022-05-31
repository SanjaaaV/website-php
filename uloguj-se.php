<?php
session_start();
$_SESSION['ulogovan']='ne';

if(isset($_POST['email'],$_POST['sifra'])) {
    $veza=mysqli_connect ("localhost", "root", "");
    $veza->select_db("flajerisanje");
    mysqli_set_charset($veza,"utf8");
    $email=$_POST['email'];
    $upitadmin="SELECT sifra FROM flajerisanje.administratori WHERE email='$email'";
    $rez=mysqli_query($veza,$upitadmin);
    $upitaktivista="SELECT sifra FROM flajerisanje.aktivisti WHERE email='$email'";
    $rez2=mysqli_query($veza,$upitaktivista);
    
    if($rez) {
        while ($red=mysqli_fetch_assoc($rez)){
        if(password_verify($_POST['sifra'],$red['sifra'])){
            $_SESSION['ulogovan']='da';
            header("Location:admin/navigacijaadmin.php");
           
        }
        /*else{
        echo "Pogrešna šifra!";
        echo'<a href="ulogujse.php"><b>Nazad</b></a>';
        }*/
       }
    }
    if($rez2){
        while ($red2=mysqli_fetch_assoc($rez2)) {
            if(password_verify($_POST['sifra'],$red2['sifra'])){
                $_SESSION['ulogovan']='da';
                header("Location:aktivista/navigacijaaktivista.php");
            }
            /*else{
            echo "Pogrešna šifra! ";
            echo '<a href="ulogujse.php"><b>Nazad</b></a>';
            }*/
        }
    }
    echo '<p>Pogrešan Email ili šifra.   <a href="ulogujse.php"><b>Ulogujte se</b></a></p>';  
    echo '<p>Nemate nalog?  <a href="registrujse.php"><b>Registrujte se</b></a></p>'; 
    
}


?>