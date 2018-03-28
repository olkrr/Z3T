<?php

    namespace Models;
    use \PDO;
    class Naprawa extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['naprawy'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableNaprawa.'`');
            $naprawy = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($naprawy && !empty($naprawy))
                $data['naprawy'] = $naprawy;
        }
        catch(\PDOException $e)	
        {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }   
         return $data;
        }
        
        /*public function getAllForSelect($IDKlient)
        {
            $data = $this->getAll();
                $naprawy = array();
            if (!isset($data['error']))
            foreach($data['naprawy'] as $naprawa)
            $naprawy[$naprawa[\Config\Database\DBConfig\naprawa::$IDNaprawa]] = $naprawa[\Config\Database\DBConfig\Naprawa::$IDKlient]= $naprawa[\Config\Database\DBConfig\Naprawa::$IDProducent]= $naprawa[\Config\Database\DBConfig\Naprawa::$NazMyjki] =
            $naprawa[\Config\Database\DBConfig\Naprawa::$IDTypMyjki] = $naprawa[\Config\Database\DBConfig\Naprawa::$IDOsprzet] = $naprawa[\Config\Database\DBConfig\Naprawa::$CzyWycena] = $naprawa[\Config\Database\DBConfig\Naprawa::$DataDostarczenia] = $naprawa[\Config\Database\DBConfig\Naprawa::$DataOdbioru] = $naprawa[\Config\Database\DBConfig\Naprawa::$KwotaNaprawy] = $naprawa[\Config\Database\DBConfig\Naprawa::$OpisNaprawy] = $naprawa[\Config\Database\DBConfig\Naprawa::$IDStatus];
            return $naprawy;
        
        }*/
        
        public function getOne($IDNaprawa)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDNaprawa === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['naprawy'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableNaprawa.'`WHERE  `'.\Config\Database\DBConfig\Naprawa::$IDNaprawa.'`=:IDNaprawa');   
                $stmt->bindValue(':IDNaprawa', $IDNaprawa, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $naprawy = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($naprawy  && !empty($naprawy))
				{
                    $data['naprawy'] = $naprawy[0];
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
        
        public function add($IDKlient, $IDProducent, $NazMyjki, $IDTypMyjki, $IDOsprzet, $CzyWycena, $Symptomy, $Diagnoza, $OpisNaprawy, $Czesci, $DataDostarczenia, $DataOdbioru, $IDStatus, $KwotaNaprawy, $Kartka, $Kontakt)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($IDKlient === null || $IDProducent === null || $NazMyjki === null || $IDTypMyjki === null  || $IDOsprzet === null  || $CzyWycena === null || $Symptomy = null || $DataDostarczenia === null || $OpisNaprawy === null  || $IDStatus === null || $Kartka = null || $Kontakt = null )
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableNaprawa.'` (`'
				.\Config\Database\DBConfig\Naprawa::$IDKlient.'`, `'
				.\Config\Database\DBConfig\Naprawa::$IDProducent.'`, `'
				.\Config\Database\DBConfig\Naprawa::$NazMyjki.'`, `'
				.\Config\Database\DBConfig\Naprawa::$IDTypMyjki.'`, `'
				.\Config\Database\DBConfig\Naprawa::$IDOsprzet.'`, `'
				.\Config\Database\DBConfig\Naprawa::$CzyWycena.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Symptomy.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Diagnoza.'`, `'
				.\Config\Database\DBConfig\Naprawa::$OpisNaprawy.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Czesci.'`, `'
				.\Config\Database\DBConfig\Naprawa::$DataDostarczenia.'`, `'
				.\Config\Database\DBConfig\Naprawa::$DataOdbioru.'`, `'
				.\Config\Database\DBConfig\Naprawa::$IDStatus.'`, `'
				.\Config\Database\DBConfig\Naprawa::$KwotaNaprawy.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Kartka.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Kontakt.'`) VALUES (:IDKlient, :IDProducent, :NazMyjki, :IDTypMyjki, :IDOsprzet, :CzyWycena, :Symptomy, :Diagnoza, :OpisNaprawy, $Czesci :DataDostarczenia, :DataOdbioru, :IDStatus, :KwotaNaprawy, :Kartka, :Kontakt)');                   

                $stmt->bindValue(':IDKlient',       $IDKlient, PDO::PARAM_INT); 
                $stmt->bindValue(':IDProducent',    $IDProducent, PDO::PARAM_INT); 
                $stmt->bindValue(':NazMyjki',       $NazMyjki, PDO::PARAM_STR);  
                $stmt->bindValue(':IDTypMyjki',       $IDTypMyjki, PDO::PARAM_INT); 
                $stmt->bindValue(':IDOsprzet',      $IDOsprzet, PDO::PARAM_INT); 
                $stmt->bindValue(':CzyWycena',         $CzyWycena, PDO::PARAM_INT);
				$stmt->bindValue(':Symptomy',       $Symptomy, PDO::PARAM_STR);
				$stmt->bindValue(':Diagnoza',       $Diagnoza, PDO::PARAM_STR);
				$stmt->bindValue(':OpisNaprawy',       $OpisNaprawy, PDO::PARAM_STR);
				$stmt->bindValue(':Czesci',       $Czesci, PDO::PARAM_STR); 
                $stmt->bindValue(':DataDostarczenia',       $DataDostarczenia, PDO::PARAM_STR); 
                $stmt->bindValue(':DataOdbioru',       $DataOdbioru, PDO::PARAM_STR);
				$stmt->bindValue(':IDStatus',       $IDStatus, PDO::PARAM_INT); 
                $stmt->bindValue(':KwotaNaprawy',       $KwotaNaprawy, PDO::PARAM_STR);
				$stmt->bindValue(':Kartka',       $Kartka, PDO::PARAM_INT);
				$stmt->bindValue(':Kontakt',       $Kontakt, PDO::PARAM_INT); 				
                
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
        
        public function delete($IDNaprawa)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDNaprawa === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableNaprawa.'` WHERE  `'.\Config\Database\DBConfig\Naprawa::$IDNaprawa.'`=:IDNaprawa');   
             
                $stmt->bindValue(':IDNaprawa', $IDNaprawa, PDO::PARAM_INT); 
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
        
        
        public function update($IDKlient, $IDProducent, $NazMyjki, $IDTypMyjki, $IDOsprzet, $CzyWycena, $Symptomy, $Diagnoza, $OpisNaprawy, $Czesci, $DataDostarczenia, $DataOdbioru, $IDStatus, $KwotaNaprawy, $Kartka, $Kontakt)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDNaprawa === null || $IDKlient === null || $IDProducent === null || $NazMyjki === null || $IDTypMyjki === null  || $IDOsprzet === null  || $CzyWycena === null || $Symptomy = null || $DataDostarczenia === null || $OpisNaprawy === null  || $IDStatus === null || $Kartka = null || $Kontakt = null ){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableNaprawa.'` SET
                `'.\Config\Database\DBConfig\Naprawa::$IDKlient.'`=:IDKlient, `'.\Config\Database\DBConfig\Naprawa::$IDProducent.'`=:IDProducent, `'.\Config\Database\DBConfig\Naprawa::$NazMyjki.'`=:NazMyjki,  `'.\Config\Database\DBConfig\Naprawa::$IDTypMyjki.'`=:IDTypMyjki,  `'.\Config\Database\DBConfig\Naprawa::$IDOsprzet.'`=:IDOsprzet,  `'.\Config\Database\DBConfig\Naprawa::$CzyWycena.'`=:CzyWycena,  `'.\Config\Database\DBConfig\Naprawa::$Symptomy.'`=:Symptomy,  `'.\Config\Database\DBConfig\Naprawa::$Diagnoza.'`=:Diagnoza,  `'.\Config\Database\DBConfig\Naprawa::$OpisNaprawy.'`=:OpisNaprawy,  `'.\Config\Database\DBConfig\Naprawa::$Czesci.'`=:Czesci, `'.\Config\Database\DBConfig\Naprawa::$DataDostarczenia.'`=:DataDostarczenia,  `'.\Config\Database\DBConfig\Naprawa::$DataOdbioru.'`=:DataOdbioru, `'.\Config\Database\DBConfig\Naprawa::$IDStatus.'`=:IDStatus,  `'.\Config\Database\DBConfig\Naprawa::$KwotaNaprawy.'`=:KwotaNaprawy, `'.\Config\Database\DBConfig\Naprawa::$Kartka.'`=:Kartka,
                `'.\Config\Database\DBConfig\Naprawa::$Kontakt.'`=:Kontakt
                WHERE `'
                .\Config\Database\DBConfig\Naprawa::$IDNaprawa.'`=:IDNaprawa');   
                
                
                $stmt->bindValue(':IDKlient',       $IDKlient, PDO::PARAM_INT); 
                $stmt->bindValue(':IDProducent',    $IDProducent, PDO::PARAM_INT); 
                $stmt->bindValue(':NazMyjki',       $NazMyjki, PDO::PARAM_STR);  
                $stmt->bindValue(':IDTypMyjki',       $IDTypMyjki, PDO::PARAM_INT); 
                $stmt->bindValue(':IDOsprzet',      $IDOsprzet, PDO::PARAM_INT); 
                $stmt->bindValue(':CzyWycena',         $CzyWycena, PDO::PARAM_INT);
				$stmt->bindValue(':Symptomy',       $Symptomy, PDO::PARAM_STR);
				$stmt->bindValue(':Diagnoza',       $Diagnoza, PDO::PARAM_STR);
				$stmt->bindValue(':OpisNaprawy',       $OpisNaprawy, PDO::PARAM_STR);
				$stmt->bindValue(':Czesci',       $Czesci, PDO::PARAM_STR); 
                $stmt->bindValue(':DataDostarczenia',       $DataDostarczenia, PDO::PARAM_STR); 
                $stmt->bindValue(':DataOdbioru',       $DataOdbioru, PDO::PARAM_STR);
				$stmt->bindValue(':IDStatus',       $IDStatus, PDO::PARAM_INT); 
                $stmt->bindValue(':KwotaNaprawy',       $KwotaNaprawy, PDO::PARAM_STR);
				$stmt->bindValue(':Kartka',       $Kartka, PDO::PARAM_INT);
				$stmt->bindValue(':Kontakt',       $Kontakt, PDO::PARAM_INT); 
				$stmt->bindValue(':IDNaprawa', $IDNaprawa, PDO::PARAM_INT);
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
    
    
    
