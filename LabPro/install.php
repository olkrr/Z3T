<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Instalacja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	require 'vendor/autoload.php';
	
	$start = microtime(true);
    
    use Config\Database\DBConfig as DB;
	use Config\Database\DBConnection as DBConnection;
    
	Config\Database\DBConnection::setDBConnection(DB::$user,DB::$password, 
                DB::$hostname, DB::$databaseType, DB::$port);	
    try {
        $pdo =  DBConnection::getHandle();
    }catch(\PDOException $e){
        echo \Config\Database\DBErrorName::$connection;
        exit(1);
	}    
	
	

	$query = 'DROP TABLE IF EXISTS `'.DB::$tableNaprawa.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableNaprawa;
	}
	
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableTypMyjki.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableTypMyjki;
	}  
	
	$query = 'DROP TABLE IF EXISTS `'.DB::$tableKlient.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableKlient;
	}
	
   $query = 'DROP TABLE IF EXISTS `'.DB::$tableUzytkownik.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableUzytkownik;
	}
    
 $query = 'DROP TABLE IF EXISTS `'.DB::$tableStatus.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableStatus;
	}  
    
     $query = 'DROP TABLE IF EXISTS `'.DB::$tableProducent.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableProducent;
	}  
    
     $query = 'DROP TABLE IF EXISTS `'.DB::$tableOsprzet.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableOsprzet;
	}  
    
	



	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableTypMyjki.'` (
		`'.DB\TypMyjki::$IDTypMyjki.'` INT NOT NULL AUTO_INCREMENT,
		`'.DB\TypMyjki::$TypMyjkiNazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (IDTypMyjki)) ENGINE=InnoDB;';    
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableTypMyjki;
	}	
    
	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableOsprzet.'` (
		`'.DB\Osprzet::$NrOsprzet.'` INT NOT NULL AUTO_INCREMENT,
		`'.DB\Osprzet::$NazOsprzet.'` VARCHAR(20) NOT NULL,
		PRIMARY KEY (NrOsprzet)) ENGINE=InnoDB;';    
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableOsprzet;
	}	
    
	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableStatus.'` (
		`'.DB\Status::$IDStatus.'` INT NOT NULL AUTO_INCREMENT,
		`'.DB\Status::$NazStatus.'` VARCHAR(40) NOT NULL,
		PRIMARY KEY (IDStatus)) ENGINE=InnoDB;';    
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableStatus;
	}

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableProducent.'` (
		`'.DB\Producent::$IDProducent.'` INT NOT NULL AUTO_INCREMENT,
		`'.DB\Producent::$NazProducent.'` VARCHAR(20) NOT NULL,
		PRIMARY KEY (IDProducent)) ENGINE=InnoDB;';    
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo $e;
        echo \Config\Database\DBErrorName::$create_table.DB::$tableProducent;
        echo "<br>";
	}		

	
	
	
	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKlient.'` (
        `'.DB\Klient::$IDKlient.'` INT AUTO_INCREMENT, 
		`'.DB\Klient::$Imie.'` VARCHAR(30) NOT NULL,
		`'.DB\Klient::$Nazwisko.'` VARCHAR(30) NOT NULL,
		`'.DB\Klient::$NazwaFirmy.'` VARCHAR(50) NULL,
		`'.DB\Klient::$Telefon.'` VARCHAR(20) NOT NULL,
		`'.DB\Klient::$Email.'` VARCHAR(50) NULL,
        `'.DB\Klient::$Nip.'` VARCHAR(20) NULL,
		PRIMARY KEY (IDKlient)) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableKlient;
	}
	

	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableNaprawa.'` (
        `'.DB\Naprawa::$IDNaprawa.'` INT AUTO_INCREMENT, 
        `'.DB\Naprawa::$IDKlient.'` INT NOT NULL,
        `'.DB\Naprawa::$IDProducent.'` INT NOT NULL,
		`'.DB\Naprawa::$NazMyjki.'` VARCHAR(20) NOT NULL,
        `'.DB\Naprawa::$TypMyjki.'` INT NOT NULL,
        `'.DB\Naprawa::$NrOsprzet.'` INT NOT NULL,
        `'.DB\Naprawa::$Wycena.'` VARCHAR(3) NOT NULL,
		`'.DB\Naprawa::$DataDost.'` DATE NOT NULL,
        `'.DB\Naprawa::$DataOdbi.'` DATE NULL,
		`'.DB\Naprawa::$KwotaNap.'` FLOAT NOT NULL,
		`'.DB\Naprawa::$OpisNapr.'` VARCHAR(500) NULL,
        `'.DB\Naprawa::$IDStatus.'` INT NOT NULL,	
		PRIMARY KEY (IDNaprawa),
		FOREIGN KEY ('.DB\Naprawa::$TypMyjki.') REFERENCES '.DB::$tableTypMyjki.'('.DB\TypMyjki::$IDTypMyjki.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Klient::$IDKlient.') REFERENCES '.DB::$tableKlient.'('.DB\Klient::$IDKlient.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Naprawa::$NrOsprzet.') REFERENCES '.DB::$tableOsprzet.'('.DB\Osprzet::$NrOsprzet.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Naprawa::$IDProducent.') REFERENCES '.DB::$tableProducent.'('.DB\Producent::$IDProducent.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Naprawa::$IDStatus.') REFERENCES '.DB::$tableStatus.'('.DB\Status::$IDStatus.') ON DELETE CASCADE
		) ENGINE=InnoDB;';

    //echo $query;
    try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo $query;
            
        echo \Config\Database\DBErrorName::$create_table.DB::$tableNaprawa;
	echo '<br>';
        
    }
	
	
	
	$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUzytkownik.'` (
        `'.DB\Uzytkownik::$IDUzytkownik.'` INT AUTO_INCREMENT, 
		`'.DB\Uzytkownik::$Login.'` VARCHAR(20) NOT NULL,
		`'.DB\Uzytkownik::$Haslo.'` VARCHAR(50) NOT NULL,
		`'.DB\Uzytkownik::$IDKlient.'` INT NOT NULL,
		PRIMARY KEY (IDUzytkownik),
		FOREIGN KEY ('.DB\Uzytkownik::$IDKlient.') REFERENCES '.DB::$tableKlient.'('.DB\Klient::$IDKlient.')) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableUzytkownik;
	}
	
	
	
    
    /*
        wypełnienie tabel danymi
    */  
	
	$TypyMyjek = array();	
	$TypyMyjek[] = 'Ciepłowodna Spalinowa';
	$TypyMyjek[] = 'Ciepłowodna Elektryczna';
	$TypyMyjek[] = 'Zimnowodna Elektryczna';
	$TypyMyjek[] = 'Myjka 230V';
	$TypyMyjek[] = 'Myjka Stacjonarna Z/W';
    $TypyMyjek[] = 'Myjka Stacjonarna C/W';
    
	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableTypMyjki.'` (`'.DB\TypMyjki::$TypMyjkiNazwa.'`) VALUES(:TypMyjki)');	
		foreach($TypyMyjek as $TypMyjki)
		{
			$stmt -> bindValue(':TypMyjki', $TypMyjki, PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}	
	
$Klienci = array();
	$Klienci[] = array(
						'Imie' => 'Juliusz',
						'Nazwisko' => 'Woda',
						'NazwaFirmy' => 'Czyścimat',
						'Telefon' => '234234234',
						'Email' => 'umyjemycitesciowa@buziaczek.pl',
                        'Nip' => '123-422-33-44');
	$Klienci[] = array(
						'Imie' => 'Bernard',
						'Nazwisko' => 'Haul',
						'NazwaFirmy' => 'Hau-Hau',
						'Telefon' => '123456345',
						'Email' => '',
                        'Nip' => '235-434-34-55');
	$Klienci[] = array(
						'Imie' => 'Andrzej',
						'Nazwisko' => 'Wierci',
						'NazwaFirmy' => 'Wiertła At Midnight',
						'Telefon' => '123654789',
						'Email' => 'drill@wierci.my',
                        'Nip' => '234-643-12-34');
	
	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableKlient.'` (`'.DB\Klient::$Imie.'`, `'.DB\Klient::$Nazwisko.'`, `'.DB\Klient::$NazwaFirmy.'`, `'.DB\Klient::$Telefon.'`, `'.DB\Klient::$Email.'`, `'.DB\Klient::$Nip.'`) VALUES(:Imie, :Nazwisko, :NazwaFirmy, :Telefon, :Email, :Nip)');	
		foreach($Klienci as $Klient)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':Imie', $Klient['Imie'], PDO::PARAM_STR);
			$stmt -> bindValue(':Nazwisko', $Klient['Nazwisko'], PDO::PARAM_STR);
			$stmt -> bindValue(':NazwaFirmy', $Klient['NazwaFirmy'], PDO::PARAM_STR);
			$stmt -> bindValue(':Telefon', $Klient['Telefon'], PDO::PARAM_STR);
			$stmt -> bindValue(':Email', $Klient['Email'], PDO::PARAM_STR);
            $stmt -> bindValue(':Nip', $Klient['Nip'], PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}   

///////////////////////////////////////////////
	
	$Producenci = array();	
	$Producenci[] = 'Inny/Nieokreślony';
    $Producenci[] = 'Karcher';	
    $Producenci[] = 'Kranzle';
	$Producenci[] = 'Nilfisk/Gerni';
	$Producenci[] = 'Kew/Wap/Stihl/N-Alto';
	$Producenci[] = 'Falch';
    $Producenci[] = 'Oetzen';
    $Producenci[] = 'Erhle';    
    $Producenci[] = 'Rottest';
    $Producenci[] = 'Hako';
    $Producenci[] = 'Comac';
	$Producenci[] = 'Nilfisk Grey';
    $Producenci[] = 'Numatic';
try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableProducent.'` (`'.DB\Producent::$NazProducent.'`) VALUES(:IDProducent)');	
		foreach($Producenci as $Producent)
		{
			$stmt -> bindValue(':IDProducent', $Producent, PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}	
	
/////////////////////////////////////////////////////
	$Statusy = array();	
	$Statusy[] = 'Pozostawiona do wyceny/naprawy';
    $Statusy[] = 'Decyzja o Naprawie';    
    $Statusy[] = 'Zgoda Na naprawę';
    $Statusy[] = 'Odmowa Naprawy';        
    $Statusy[] = 'Naprawa w Trakcie';
    $Statusy[] = 'Naprawiona Do odbioru';
    $Statusy[] = 'Pozostawiona do odbioru';
    $Statusy[] = 'Złom';
    $Statusy[] = 'Puste';   
    $Statusy[] = 'Odebrane';
    $Statusy[] = 'Pozostawiona w Rozliczeniu';
    $Statusy[] = 'Zamieniono';

try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableStatus.'` (`'.DB\Status::$NazStatus.'`) VALUES(:Status)');	
		foreach($Statusy as $Status)
		{
			$stmt -> bindValue(':Status', $Status, PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}	
//////////////////////////////////////////////////
	$Osprzety = array();	
	$Osprzety[] = 'Bez Osprzętu';
    $Osprzety[] = 'Z Osprzętem';
    $Osprzety[] = 'Osprzęt Częściowy';
    $Osprzety[] = 'Nie dotyczy';
    

try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableOsprzet.'` (`'.DB\Osprzet::$NazOsprzet.'`) VALUES(:Osprzet)');	
		foreach($Osprzety as $Osprzet)
		{
			$stmt -> bindValue(':Osprzet', $Osprzet, PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}		
//////////////////////////////////////////////////
	$Naprawy = array();	
	$Naprawy[] = array(
						'IDKlient' => '1',
                        'IDProducent' => '2',						
                        'NazMyjki' => 'Karcher HDS1090',
                        'TypMyjki' => '3',
						'NrOsprzetu' => '2',
                        'Wycena' => 'tak',
                        'DataDost' => '20170305',
                        'DataOdbi' => '20170305',						
                        'KwotaNap' => '50.0',                        
                        'OpisNapr' => 'złom',
                        'IDStatus' => '8');
	
	
	
	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableNaprawa.'` (`'.DB\Naprawa::$IDKlient.'`,`'.DB\Naprawa::$IDProducent.'`,`'.DB\Naprawa::$NazMyjki.'`, `'.DB\Naprawa::$TypMyjki.'`,`'.DB\Naprawa::$NrOsprzet.'`, `'.DB\Naprawa::$Wycena.'`, `'.DB\Naprawa::$DataDost.'`, `'.DB\Naprawa::$DataOdbi.'`,`'.DB\Naprawa::$KwotaNap.'`, `'.DB\Naprawa::$OpisNapr.'`,`'.DB\Naprawa::$IDStatus.'`) VALUES(:IDKlient, :IDProducent, :NazMyjki, :TypMyjki, :NrOsprzet, :Wycena, :DataDost, :DataOdbi, :KwotaNap, :OpisNapr, :IDStatus)');	
        
		foreach($Naprawy as $Naprawa)
		{ 
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':IDKlient', $Naprawa['IDKlient'], PDO::PARAM_INT);
            $stmt -> bindValue(':IDProducent', $Naprawa['IDProducent'], PDO::PARAM_INT);
			$stmt -> bindValue(':NazMyjki', $Naprawa['NazMyjki'], PDO::PARAM_STR);
            $stmt -> bindValue(':TypMyjki', $Naprawa['TypMyjki'], PDO::PARAM_STR);
            $stmt -> bindValue(':NrOsprzet', $Naprawa['NrOsprzetu'], PDO::PARAM_INT);
            $stmt -> bindValue(':Wycena', $Naprawa['Wycena'], PDO::PARAM_INT);
            $stmt -> bindValue(':DataDost', $Naprawa['DataDost'], PDO::PARAM_STR);
            $stmt -> bindValue(':DataOdbi', $Naprawa['DataOdbi'], PDO::PARAM_STR);
			$stmt -> bindValue(':KwotaNap', $Naprawa['KwotaNap'], PDO::PARAM_STR);
			$stmt -> bindValue(':OpisNapr', $Naprawa['OpisNapr'], PDO::PARAM_STR);
            $stmt -> bindValue(':IDStatus', $Naprawa['IDStatus'], PDO::PARAM_INT);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
        echo $e;
	}   
	
	
	
	
	
	
	
	
	$Uzytkownicy = array();
	$Uzytkownicy[] = array(
							'Login' => 'admin',
							'Haslo' => 'admin',
							'IDKlient' => '1');
	$Uzytkownicy[] = array(
							'Login' => 'user',
							'Haslo' => 'user',
							'IDKlient' => '2');
								
	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableUzytkownik.'` (`'.DB\Uzytkownik::$Login.'`, `'.DB\Uzytkownik::$Haslo.'`, `'.DB\Uzytkownik::$IDKlient.'`) VALUES(:Login, :Haslo, :IDKlient)');	
		foreach($Uzytkownicy as $Uzytkownik)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':Login', $Uzytkownik['Login'], PDO::PARAM_STR);
			$stmt -> bindValue(':Haslo', md5($Uzytkownik['Haslo']), PDO::PARAM_STR);
			$stmt -> bindValue(':IDKlient', $Uzytkownik['IDKlient'], PDO::PARAM_INT);
			$stmt -> execute();
		}
		
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}

	echo "<p><b>Instalacja wykonana w: ".round($time_elapsed_secs = microtime(true) - $start,2)." sekund.</b></p>";
	    
    echo "<b>Instalacja aplikacji zakończona!</b>"
?>
</body>
</html>
