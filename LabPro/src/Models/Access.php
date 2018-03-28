<?php
	namespace Models;
	use \PDO;
	class Access extends Model {
		public function login($login, $password){
			//tutaj powinno nastąpić weryfikacja podanych danych
			//z tymi zapisanymi w bazie
			
			if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['Uzytkownik'] = array();
            try	{
                $stmt = $this->pdo->prepare('SELECT * FROM '.\Config\Database\DBConfig::$tableUzytkownik.' WHERE '
				.\Config\Database\DBConfig\Uzytkownik::$Login.' =:login');
				$stmt->bindValue(':login', $login, PDO::PARAM_STR);
                $stmt->execute();
				$Uzytkownik = $stmt->fetch();
                $stmt->closeCursor();
                if($Uzytkownik && !empty($Uzytkownik))
                    $data['Uzytkownik'] = $Uzytkownik;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
			if($Uzytkownik['Haslo'] == $password)
			{
				//zainicjalizowanie sesji
				\Tools\Access::login($login);
                return $data;
			}
            $data['error'] = \Config\Website\ErrorName::$wrongdata;
			return $data;
		}	
		public function logout(){
			\Tools\Access::logout();
		}
	}
