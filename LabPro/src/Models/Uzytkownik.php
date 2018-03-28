<?php
	namespace Models;
	use \PDO;
	class Uzytkownik extends Model {
		public function add($login, $haslo, $IDKlient){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($login === null || $haslo === null || $IDKlient === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }              
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO '.\Config\Database\DBConfig::$tableUzytkownik.' ('.\Config\Database\DBConfig\Uzytkownik::$Login.','.\Config\Database\DBConfig\Uzytkownik::$Haslo.','.\Config\Database\DBConfig\Uzytkownik::$IDKlient.') VALUES (:login, :haslo, :IDKlient)');                   
                $stmt->bindValue(':login', $login, PDO::PARAM_STR);
				$stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
				$stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT);
                $result = $stmt->execute();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
                else
                    $data['message'] = \Config\Database\DBMessageName::$addok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
				echo $data;
            }	
            return $data;
		}     
		public function delete($id){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableKlient.'` WHERE  `'.\Config\Database\DBConfig\Klient::$IDKlient.'`=:id');   
                $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$deleteok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		}  
        
		public function update($IDKlient, $Imie, $Nazwisko, $NazwaFirmy, $Telefon, $Email){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDKlient === null || $Imie === null || $Nazwisko === null || $NazwaFirmy === null || $Telefon === null || $Email === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  '.\Config\Database\DBConfig::$tableKlient.' SET
				'.\Config\Database\DBConfig\Klient::$Imie.'=:Imie,
				'.\Config\Database\DBConfig\Klient::$Nazwisko.'=:Nazwisko,
				'.\Config\Database\DBConfig\Klient::$NazwaFirmy.'=:NazwaFirmy,
				'.\Config\Database\DBConfig\Klient::$Telefon.'=:Telefon,
				'.\Config\Database\DBConfig\Klient::$Email.'=:Email WHERE '
                .\Config\Database\DBConfig\Klient::$IDKlient.'=:IDKlient');   
                $stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT);
                $stmt->bindValue(':Imie', $Imie, PDO::PARAM_STR);
				$stmt->bindValue(':Nazwisko', $Nazwisko, PDO::PARAM_STR);
                $stmt->bindValue(':NazwaFirmy', $NazwaFirmy, PDO::PARAM_STR);
				$stmt->bindValue(':Telefon', $Telefon, PDO::PARAM_STR);
				$stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
                
                $result = $stmt->execute(); 
                $rows = $stmt->rowCount();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$updateok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		}
	}