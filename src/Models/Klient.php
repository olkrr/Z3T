<?php

    namespace Models;
    use \PDO;
    class Klient extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['klienci'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableKlient.'`');
            $klienci = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($klienci && !empty($klienci))
                $data['klienci'] = $klienci;
        }
        catch(\PDOException $e)	
        {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }   
         return $data;
        }
        
       /* public function getAllForSelect()
        {
            $data = $this->getAll();
                $klienci = array();
            if (!isset($data['error']))
            foreach($data['klienci'] as $klient)
            $klienci[$klient[\Config\Database\DBConfig\Klient::$IDKlient]] = $klient[\Config\Database\DBConfig\Klient::$Imie].' '.$klient[\Config\Database\DBConfig\Klient::$Nazwisko].' '.$klient[\Config\Database\DBConfig\Klient::$NazwaFirmy].' '.$klient[\Config\Database\DBConfig\Klient::$NumerTelefonu].' '.$klient[\Config\Database\DBConfig\Klient::$Email].' '.$klient[\Config\Database\DBConfig\Klient::$Miejscowosc];
            return $klienci;
        
        }*/
        
        public function getOne($IDKlient)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDKlient === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['klienci'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableKlient.'` WHERE  `'.\Config\Database\DBConfig\Klient::$IDKlient.'`=:IDKlient');
                $stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $klienci = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($klienci  && !empty($klienci))
				{
                    $data['klienci'] = $klienci[0];
				}
                else
				{
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
				}
            }
            catch(\PDOException $e)
            {
                var_dump($e);
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		} 
        
        public function add($Imie, $Nazwisko, $NazwaFirmy, $NumerTelefonu, $Email, $Ulica, $NumerDomu, $Miejscowosc, $KodPocztowy , $Uwagi, $Nip)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
		if($Imie === null || $Nazwisko === null || $NazwaFirmy === null || $NumerTelefonu === null || $Email === null || $Miejscowosc === null || $KodPocztowy === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableKlient.'` (`'
				.\Config\Database\DBConfig\Klient::$Imie.'`, `'
				.\Config\Database\DBConfig\Klient::$Nazwisko.'`, `'
                .\Config\Database\DBConfig\Klient::$NazwaFirmy.'`, `'
                .\Config\Database\DBConfig\Klient::$NumerTelefonu.'`, `'
                .\Config\Database\DBConfig\Klient::$Email.'`, `'
				.\Config\Database\DBConfig\Klient::$Ulica.'`, `'
				.\Config\Database\DBConfig\Klient::$NumerDomu.'`, `'
				.\Config\Database\DBConfig\Klient::$Miejscowosc'`, `'
				.\Config\Database\DBConfig\Klient::$KodPocztowy.'`, `'
				.\Config\Database\DBConfig\Klient::$Uwagi.'`, `'
				.\Config\Database\DBConfig\Klient::$Nip.'`) VALUES (:Imie, :Nazwisko, :NazwaFirmy, :NumerTelefonu, :Email, :Ulica, :NumerDomu, :Miejscowosc, :KodPocztowy, :Uwagi, :Nip)');                   

                $stmt->bindValue(':Imie', $Imie, PDO::PARAM_STR); 
                $stmt->bindValue(':Nazwisko', $Nazwisko, PDO::PARAM_STR); 
                $stmt->bindValue(':NazwaFirmy', $NazwaFirmy, PDO::PARAM_STR);
                $stmt->bindValue(':NumerTelefonu', $NumerTelefonu, PDO::PARAM_STR);  
                $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
				$stmt->bindValue(':Ulica', $Ulica, PDO::PARAM_STR);
				$stmt->bindValue(':NumerDomu', $NumerDomu, PDO::PARAM_STR);
                $stmt->bindValue(':Miejscowosc', $Miejscowosc, PDO::PARAM_STR); 
				$stmt->bindValue(':KodPocztowy', $KodPocztowy, PDO::PARAM_STR);
				$stmt->bindValue(':Uwagi', $Uwagi, PDO::PARAM_STR);
				$stmt->bindValue(':Nip', $Uwagi, PDO::PARAM_STR);
                $result = $stmt->execute(); 
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
                else
                    $data['message'] = \Config\Database\DBMessageName::$addok;
                $stmt->closeCursor();                 
            }
            
            catch(\PDOException $e)	
            {
                $data['error'] = \Config\Database\DBErrorName::$query;
            }	
            
            return $data;
		  }
        
        public function delete($IDKlient)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDKlient === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableKlient.'` WHERE  `'.\Config\Database\DBConfig\Klient::$IDKlient.'`=:IDKlient');   
             
                $stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT); 
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
        
        
        public function update($Imie, $Nazwisko, $NazwaFirmy, $NumerTelefonu, $Email, $Ulica, $NumerDomu, $Miejscowosc, $KodPocztowy , $Uwagi, $Nip)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($Imie === null || $Nazwisko === null || $NazwaFirmy === null || $NumerTelefonu === null || $Email === null || $Miejscowosc === null || $KodPocztowy === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableKlient.'` SET
                `'.\Config\Database\DBConfig\Klient::$Imie.'`=:Imie, `'.\Config\Database\DBConfig\Klient::$Nazwisko.'`=:Nazwisko, `'.\Config\Database\DBConfig\Klient::$NazwaFirmy.'`=:NazwaFirmy, `'.\Config\Database\DBConfig\Klient::$NumerTelefonu.'`=:NumerTelefonu, `'.\Config\Database\DBConfig\Klient::$Email.'`=:Email, `'.\Config\Database\DBConfig\Klient::$Ulica.'`=:Ulica, `'.\Config\Database\DBConfig\Klient::$NumerDomu.'`=:NumerDomu,`'.\Config\Database\DBConfig\Klient::$Miejscowosc.'`=:Miejscowosc,`'.\Config\Database\DBConfig\Klient::$KodPocztowy.'`=:KodPocztowy, `'.\Config\Database\DBConfig\Klient::$Uwagi.'`=:Uwagi,`'.\Config\Database\DBConfig\Klient::$Nip.'`=:Nip WHERE `'
                .\Config\Database\DBConfig\Klient::$IDKlient.'`=:IDKlient');   
                
                $stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT);
                $stmt->bindValue(':Imie', $Imie, PDO::PARAM_STR);
                $stmt->bindValue(':Nazwisko', $Nazwisko, PDO::PARAM_STR); 
                $stmt->bindValue(':NazwaFirmy', $NazwaFirmy, PDO::PARAM_STR);
                $stmt->bindValue(':NumerTelefonu', $NumerTelefonu, PDO::PARAM_STR);  
                $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
				$stmt->bindValue(':Ulica', $Ulica, PDO::PARAM_STR);
				$stmt->bindValue(':NumerDomu', $NumerDomu, PDO::PARAM_STR);
                $stmt->bindValue(':Miejscowosc', $Miejscowosc, PDO::PARAM_STR); 
				$stmt->bindValue(':KodPocztowy', $KodPocztowy, PDO::PARAM_STR);
				$stmt->bindValue(':Uwagi', $Uwagi, PDO::PARAM_STR);
				$stmt->bindValue(':Nip', $Uwagi, PDO::PARAM_STR);
                
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
    
    
    
