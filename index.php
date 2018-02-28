<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>C3</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	require 'vendor/autoload.php';
    
    use Config\Database\DBConfig as DB;
	use Config\Database\DBConnection as DBConnection;
    
	DBConnection::setDBConnection(DB::$user,DB::$password, 
                DB::$hostname, DB::$databaseType, DB::$port);	
    try {
        $pdo =  DBConnection::getHandle();
    }catch(\PDOException $e){
        echo \Config\Database\DBErrorName::$connection;
        exit(1);
	}    
	
	print("
			<table>
				<thead>
					<tr>
						<td><a href='index.php'>Imie</a></td>
						<td><a href='index.php'>Nazwisko</a></td>
						<td><a href='index.php'>Telefon</a></td>
                        <td><a href='index.php'>Nip</a><td>						
                        <td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr>");
				
				$sql = $pdo->prepare("SELECT Imie, Nazwisko, Telefon, Nip FROM ".DB::$tableKlient);
				$sql->execute();
				
				$data = $sql->fetchAll();
				foreach($data as $row)
				{
					print("<td>$row[Imie]</td>
							<td>$row[Nazwisko]</td>
							<td>$row[Telefon]</td>
                            <td>$row[Nip]</td>
							</tr>");
				}
				print("</tbody>
			</table>
	");
	print("
	<br><a> Lista Producentów</a></br>
	
			<table>
				<thead>
					<tr>
						<td><a href='index.php'>ID</a></td>
						<td><a href='index.php'>Producent</a></td>
                        <td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr>");
				
				$sql = $pdo->prepare("SELECT IDProducent, NazProducent FROM ".DB::$tableProducent);
				$sql->execute();
				
				$data = $sql->fetchAll();
				foreach($data as $row)
				{
					print("<
							<td>$row[IDProducent]</td>
                            <td>$row[NazProducent]</td>
							</tr>");
				}
				print("</tbody>
			</table>
	");
?>
</body>
</html>
