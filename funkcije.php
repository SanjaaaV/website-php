<?php
    class Funkcije{
        public static function getSveFlajere($parametar) {
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");

            if ($parametar == 2){
                $upit= "SELECT * FROM flajerisanje.flajeri";
            } 
            else {
                $upit= "SELECT * FROM flajerisanje.flajeri WHERE javan=\"".$parametar."\"";
            }
            $res = $veza->query($upit);
            $flyers = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($flyers, $row);
                }
            }
            
            $veza->close();
            return $flyers;
        }


        public static function getTrenutnogKorisnika($name){
            if(isset($_SESSION[$name])){
                return $_SESSION[$name];
            } 
            return "";
        }

        public static function getSveFlajereKorisnika($IDaktv, $odobreno){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.adrese WHERE IDaktiviste = \"".$IDaktv.
            "\" AND odobren =\"".$odobreno."\" GROUP BY IDflajera";
             $res = $veza->query($upit);
             $flajeri = array();
             if($res->num_rows > 0){
             while($row = $res->fetch_assoc()) {
                array_push($flajeri, $row);
             }
            }
            $veza->close();
            return $flajeri; 
        }

        public static function getinfoKorSpecFlajer($IDaktv,$IDflaj, $odobreno){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.adrese WHERE IDaktiviste = \"".$IDaktv.
                    "\" AND odobren =\"".$odobreno."\" AND IDflajera = \"".$IDflaj.
                    "\" ";
            $res = $veza->query($upit);
            $infos = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($infos, $row);
                }
            }
            $veza->close();
            return $infos;
        }

        public static function getinfoSpecFlajer($IDflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.ulica WHERE IDflajera = \"".$IDflaj."\" ";
            $res = $veza->query($upit);
            $infos = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($infos, $row);
                }
            }
            $veza->close();
            return $infos;
        }

        public static function zahtevAdr($idzah){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "UPDATE flajerisanje.adrese SET flajerisano=1 WHERE IDadrese=\"".$idzah."\"";
            $res = false;
            if($veza->query($upit)) {
                $res = true;   
            }
            $veza->close();    
            return $res;
        } 

        public static function getMoguciFlajeriZaZahtev(){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.flajeri WHERE brojPreostalihFlajera > 0";
            $res = $veza->query($upit);
            $flajeri = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($flajeri, $row);
                }
            }
            $veza->close();
            return $flajeri;
        }

        public static function getMoguceUliceZaZahtev(){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.ulica WHERE nedodeljeniBrojevi!=''";
            $res = $veza->query($upit);
            $ulice = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($ulice, $row);
                }
            }
            $veza->close();
            return $ulice;
        }

        public static function proveraIspravnostiZahteva() {
            $ispravanZahtev = true;
            $msg = "";
            $izabraniFlajerID = $_POST['trenutniflajer'];
            $izabraniFlajer=Funkcije::getFlajer($izabraniFlajerID);
            $brojFlajera = $_POST['brojflajera'];
            $ulicaID= $_POST['ulica'];
            $ulica=Funkcije::getUlicu($ulicaID);
            $brojeviZgrada= $_POST['brojevizgrada'];
            $ispis='';
            if ($brojFlajera > $izabraniFlajer['brojPreostalihFlajera']){
                 $ispravanZahtev = false;
                 $ispis= "Unesite broj flajera do ". $izabraniFlajer["brojPreostalihFlajera"]. ".</br>";
            }
            else{
                if ($izabraniFlajerID!=$ulica['IDflajera']){
                    $ispravanZahtev = false;
                    $ispis= "Unesite ulicu za odgovarajući flajer koji ste odabrali.</br>"; 
                }
            }
            $ispravan = [
                "ispravanZahtev" => $ispravanZahtev,
                "ispis" => $ispis,
            ];
            return $ispravan;
        }

        public static function dodajAdresuZahtev( $flajerID, $ulicaID, $brZ, $aktvID, $brojflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $ulica=Funkcije::getUlicu($ulicaID);
            $upit="INSERT INTO flajerisanje.adrese SET IDulice='$ulicaID', ulica='$ulica[ulica]', brojZgrade='$brZ', IDflajera='$flajerID',
            IDaktiviste= '$aktvID', odobren='0', flajerisano='0', datumDodele=null, datumKraj=null, brojFlajera='$brojflaj'";
            $rez=$veza->query($upit);
             $veza->close();
        }
        public static function dodajAdresuZahtevAdmin( $flajerID, $ulicaID, $brZ, $aktvID, $brojflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $ulica=Funkcije::getUlicu($ulicaID);
            $upit="INSERT INTO flajerisanje.adrese SET IDulice='$ulicaID', ulica='$ulica[ulica]', brojZgrade='$brZ', IDflajera='$flajerID',
            IDaktiviste= '$aktvID', odobren='1', flajerisano='0', datumDodele=null, datumKraj=null, brojFlajera='$brojflaj'";
            $rez=$veza->query($upit);
            $flajer = Funkcije::getFlajer($flajerID);
            $novibroj=$flajer['brojPreostalihFlajera']-$brojflaj;
            $upit2="UPDATE flajerisanje.flajeri SET brojPreostalihFlajera='$novibroj'  WHERE IDflajera='$flajerID'";
            $rez2=$veza->query($upit2);
             $veza->close();
        }

        public static function getFlajer($IDflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.flajeri WHERE IDflajera = \"".$IDflaj."\" ";
            $res = $veza->query($upit);
            $ispis='';
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                return $row;
            }
            else {
                $ispis= "Nema flajera.";
            }
            $veza->close();    
            return $ispis;
        }

        public static function getFlajerPoImenu($imeflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "SELECT * FROM Flajeri WHERE Naziv=\"".$imeflaj. "\"";
            $res = $veza->query($upit);
            $ispis='';
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                return $row;
            }
            else {
                $ispis= "Nema flajera.";
            }
            $veza->close();    
            return $ispis;
        }

        public static function getUlicu($IDul){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.ulica WHERE IDulice = \"".$IDul."\" ";
            $res = $veza->query($upit);
            $ispis='';
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                return $row;
            }
            else {
                $ispis= "Nema ulica.";
            }
            $veza->close();    
            return $ispis;
        }

        public static function getAktv($IDaktiv){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.aktivisti WHERE IDaktiviste = \"".$IDaktiv."\" ";
            $res = $veza->query($upit);
            $ispis='';
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                return $row;
            }
            else {
                $ispis= "Nema aktiviste.";
            }
            $veza->close();    
            return $ispis;
        }
        


        public static function dodajPreostaleFlajere($izabranif){
                $veza=new mysqli("localhost", "root", "");
                $veza->set_charset("utf8");
                $broj=$_POST['brojflajera'];
                if (empty($broj)){
                    echo 'Popunite polje.';
                }
                else{
                    $novibroj = $izabranif['brojPreostalihFlajera'] + $_POST['brojflajera'] ;
                    $upit = "UPDATE flajerisanje.flajeri SET brojPreostalihFlajera=\"".$novibroj."\" WHERE IDflajera=\"".$izabranif['IDflajera']. "\"";
                     $rez=$veza->query($upit);
                     $veza->close();
                }
                
            



        }

//funkcije admin deo
        public static function getSveAktiviste(){
            $veza=new mysqli("localhost", "root", "");
             $veza->set_charset("utf8");
             $upit= "SELECT * FROM flajerisanje.aktivisti WHERE odobren ='1' ";
             $res = $veza->query($upit);
             $aktivisti = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($aktivisti, $row);
                }
            }
            $veza->close();
            return $aktivisti;
        }
        public static function getSveNeodobreneAktiviste(){
            $veza=new mysqli("localhost", "root", "");
             $veza->set_charset("utf8");
             $upit= "SELECT * FROM flajerisanje.aktivisti WHERE odobren ='0' ";
             $res = $veza->query($upit);
             $aktivisti = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($aktivisti, $row);
                }
            }
            $veza->close();
            return $aktivisti;
        }

        public static function getSveFlajereAdmin(){
            $veza=new mysqli("localhost", "root", "");
             $veza->set_charset("utf8");
             $upit= "SELECT * FROM flajerisanje.flajeri ";
             $res = $veza->query($upit);
             $flajeri = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($flajeri, $row);
                }
            }
            $veza->close();
            return $flajeri;
        }

        public static function dodajFlajer($nazivF, $htmlKod,$imeTrenutneLokacije, $brojFlaj, $indikatorjavni){
            if (empty($nazivF) || empty($htmlKod) || empty($indikatorjavni) || empty($brojFlaj)){
                 return "Sva polja moraju biti popunjena";
            }
            $public = ($indikatorjavni == "1") ? 1 : 0;
            $fileNameHTML = "./flajeri/".$nazivF."File.html";
            $fileNameHTML1 = "C:/xampp/htdocs/Grupa4/flajeri/".$nazivF."File.html";
            $fileNameHTML2 = "C:/xampp/htdocs/Grupa4/aktivista/flajeri/".$nazivF."File.html";
            $fileNamePDF = "./flajeri/".$nazivF."File.pdf";
            $fileNamePDF1 = "C:/xampp/htdocs/Grupa4/flajeri/".$nazivF."File.pdf"; 
            $fileNamePDF2 = "C:/xampp/htdocs/Grupa4/aktivista/flajeri/".$nazivF."File.pdf";  

            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "INSERT INTO flajerisanje.flajeri SET naziv='$nazivF', HTMLfajl='$fileNameHTML', PDFFajl='$fileNamePDF', brojFlajera='$brojFlaj', brojPreostalihFlajera='$brojFlaj', javan='$public'";
               
            $uspesno = true;
            $rez=$veza->query($upit);
            if(!$rez) {
                $uspesno = false;  
            }
            $veza->close(); 

            if ($uspesno){            
                //kreiranje html fajla
                $file = fopen($fileNameHTML, 'w');
                $file1 = fopen($fileNameHTML1, 'w');
                $file2 = fopen($fileNameHTML2, 'w');
                fwrite($file, $htmlKod);
                fclose($file);
                fwrite($file1, $htmlKod);
                fclose($file1);
                fwrite($file2, $htmlKod);
                fclose($file2);  
                move_uploaded_file($imeTrenutneLokacije, $fileNamePDF);
                move_uploaded_file($imeTrenutneLokacije, $fileNamePDF1);
                move_uploaded_file($imeTrenutneLokacije, $fileNamePDF2);
                echo "<script> location.href='unesiflajeradmin.php'; </script>";
           }
        }
        public static function unesiUlicu($nazivUlice){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "INSERT INTO flajerisanje.ulica SET ulica='$nazivUlice'";
            $rez=$veza->query($upit);
            $veza->close();
        }

        public static function getMoguceUliceZaAdresu(){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.ulica";
            $res = $veza->query($upit);
            $ulice = array();
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                        array_push($ulice, $row);
                }
            }
            $veza->close();
            return $ulice;
        }

        public static function unesiAdresu($IDul, $brz, $IDflaj){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "UPDATE flajerisanje.ulica SET brojevi='$brz',nedodeljeniBrojevi='$brz', IDflajera='$IDflaj' WHERE IDulice='$IDul'";
            $rez=$veza->query($upit);
            $veza->close();
        }

        public static function odobriAktivistiReg($IDaktiv){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "UPDATE flajerisanje.aktivisti SET odobren='1' WHERE IDaktiviste='$IDaktiv'";
            $rez=$veza->query($upit);
            $veza->close();
        }

        public static function obrisiAktivistiReg($IDaktiv){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "DELETE FROM flajerisanje.aktivisti WHERE IDaktiviste='$IDaktiv' ";
            $res = true;
            if(!$veza->query($upit)) {
                $res = false;  
            }
            $veza->close();    
            return $res;
        }

        public static function getZahteveZaOdobrenje(){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.adrese WHERE odobren ='0' ";
            $res = $veza->query($upit);
            $zahtevi = array();
           if($res->num_rows > 0){
               while($row = $res->fetch_assoc()) {
                       array_push($zahtevi, $row);
               }
           }
           $veza->close();
           return $zahtevi;
        }
        public static function getZahtev($IDzah){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit= "SELECT * FROM flajerisanje.adrese WHERE IDadrese ='$IDzah' ";
            $res = $veza->query($upit);
            $ispis='';
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                return $row;
            }
            else {
                $ispis= "Nema ulica.";
            }
            $veza->close();    
            return $ispis;
        }

        public static function odobriZahtev($IDzah){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "UPDATE flajerisanje.adrese SET odobren='1' WHERE IDadrese='$IDzah'";
            $rez=$veza->query($upit);
            $zahtev= Funkcije::getZahtev($IDzah);
            $flajer = Funkcije::getFlajer($zahtev['IDflajera']);
            $novibroj=$flajer['brojPreostalihFlajera']-$zahtev['brojFlajera'];
            $upit2="UPDATE flajerisanje.flajeri SET brojPreostalihFlajera='$novibroj' WHERE IDflajera='$flajer[IDflajera]'";
            $rez2=$veza->query($upit2);
            $veza->close();
        }

        public static function obrisiAktivistiZahtev($IDzah){
            $veza=new mysqli("localhost", "root", "");
            $veza->set_charset("utf8");
            $upit = "DELETE FROM flajerisanje.adrese WHERE IDadrese='$IDzah' ";
            $res = true;
            if(!$veza->query($upit)) {
                $res = false;  
            }
            $veza->close();    
            return $res;
        }
    }

?>