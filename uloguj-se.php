<?php
session_start();
$_SESSION['ulogovan']='ne';

if(isset($_POST['email'],$_POST['sifra'])) {
    $veza=mysqli_connect ("localhost", "root", "");
    $veza->select_db("flajerisanje");
    mysqli_set_charset($veza,"utf8");
    $email=$_POST['email'];
    $upitadmin="SELECT * FROM flajerisanje.administratori WHERE email='$email'";
    $rez=mysqli_query($veza,$upitadmin);
    $upitaktivista="SELECT * FROM flajerisanje.aktivisti WHERE email='$email'";
    $rez2=mysqli_query($veza,$upitaktivista);
    
    if($rez) {
        while ($red=mysqli_fetch_assoc($rez)){
        if(password_verify($_POST['sifra'],$red['sifra'])){
            $_SESSION['user']= $red;
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
            if(password_verify($_POST['sifra'],$red2['sifra']) && ($red2['odobren']=='1')){
                $_SESSION['user']=$red2;
                header("Location:aktivista/navigacijaaktivista.php");
            }
            /*else{
            echo "Pogrešna šifra! ";
            echo '<a href="ulogujse.php"><b>Nazad</b></a>';
            }*/
        }
    }
    echo '<p>Pogrešan Email, šifra ili registracija nije odobrena.   <a href="ulogujse.php"><b>Ulogujte se</b></a></p>';  
    echo '<p>Nemate nalog?  <a href="registrujse.php"><b>Registrujte se</b></a></p>'; 
    
}


?>