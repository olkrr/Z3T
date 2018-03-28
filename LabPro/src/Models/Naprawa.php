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
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableNaprawa.'` INNER JOIN `'.\Config\Database\DBConfig::$tableKlient.'` ON Klient.IDKlient = Naprawa.IDKlient INNER JOIN `'.\Config\Database\DBConfig::$tableProducent.'` ON Producent.IDProducent = Naprawa.IDProducent INNER JOIN `'.\Config\Database\DBConfig::$tableTypMyjki.'` on TypMyjki.IDTypMyjki = Naprawa.TypMyjki INNER JOIN `'.\Config\Database\DBConfig::$tableStatus.'` ON Status.IDStatus = Naprawa.IDStatus INNER JOIN `'.\Config\Database\DBConfig::$tableOsprzet.'` ON Osprzet.NrOsprzet = Naprawa.NrOsprzet  ');
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
        
        public function getAllForSelect($IDKlient)
        {
            $data = $this->getAll();
                $naprawy = array();
            if (!isset($data['error']))
            foreach($data['naprawy'] as $naprawa)
            $naprawy[$naprawa[\Config\Database\DBConfig\naprawa::$IDNaprawa]] = $naprawa[\Config\Database\DBConfig\Naprawa::$IDKlient]= $naprawa[\Config\Database\DBConfig\Naprawa::$IDProducent]= $naprawa[\Config\Database\DBConfig\Naprawa::$NazMyjki] =
            $naprawa[\Config\Database\DBConfig\Naprawa::$TypMyjki] = $naprawa[\Config\Database\DBConfig\Naprawa::$NrOsprzet] = $naprawa[\Config\Database\DBConfig\Naprawa::$Wycena] = $naprawa[\Config\Database\DBConfig\Naprawa::$DataDost] = $naprawa[\Config\Database\DBConfig\Naprawa::$DataOdbi] = $naprawa[\Config\Database\DBConfig\Naprawa::$KwotaNap] = $naprawa[\Config\Database\DBConfig\Naprawa::$OpisNapr] = $naprawa[\Config\Database\DBConfig\Naprawa::$IDStatus];
            return $naprawy;
        
        }
        
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
        
        public function add($IDKlient, $IDProducent, $NazMyjki, $TypMyjki, $NrOsprzet, $Wycena, $DataDost, $DataOdbi, $KwotaNap, $OpisNapr, $IDStatus)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($IDKlient === null || $IDProducent === null || $NazMyjki === null || $TypMyjki === null  || $NrOsprzet === null  || $Wycena === null  || $DataDost === null  || $KwotaNap === null  || $OpisNapr === null  || $IDStatus === null )
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
				.\Config\Database\DBConfig\Naprawa::$TypMyjki.'`, `'
				.\Config\Database\DBConfig\Naprawa::$NrOsprzet.'`, `'
				.\Config\Database\DBConfig\Naprawa::$Wycena.'`, `'
				.\Config\Database\DBConfig\Naprawa::$DataDost.'`, `'
				.\Config\Database\DBConfig\Naprawa::$DataOdbi.'`, `'
				.\Config\Database\DBConfig\Naprawa::$KwotaNap.'`, `'
				.\Config\Database\DBConfig\Naprawa::$OpisNapr.'`, `'
				.\Config\Database\DBConfig\Naprawa::$IDStatus.'`) VALUES (:IDKlient, :IDProducent, :NazMyjki, :TypMyjki, :NrOsprzet, :Wycena, :DataDost, :DataOdbi, :KwotaNap, :OpisNapr, :IDStatus)');                   

                $stmt->bindValue(':IDKlient',       $IDKlient, PDO::PARAM_INT); 
                $stmt->bindValue(':IDProducent',    $IDProducent, PDO::PARAM_INT); 
                $stmt->bindValue(':NazMyjki',       $NazMyjki, PDO::PARAM_INT);  
                $stmt->bindValue(':TypMyjki',       $TypMyjki, PDO::PARAM_STR); 
                $stmt->bindValue(':NrOsprzet',      $NrOsprzet, PDO::PARAM_STR); 
                $stmt->bindValue(':Wycena',         $Wycena, PDO::PARAM_STR); 
                $stmt->bindValue(':DataDost',       $DataDost, PDO::PARAM_STR); 
                $stmt->bindValue(':DataOdbi',       $DataOdbi, PDO::PARAM_STR); 
                $stmt->bindValue(':KwotaNap',       $KwotaNap, PDO::PARAM_STR); 
                $stmt->bindValue(':OpisNapr',       $OpisNapr, PDO::PARAM_STR); 
                $stmt->bindValue(':IDStatus',       $IDStatus, PDO::PARAM_STR); 
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
        
        
        public function update($IDNaprawa, $IDKlient, $IDProducent, $NazMyjki, $TypMyjki, $NrOsprzet, $Wycena, $DataDost, $DataOdbi, $KwotaNap, $OpisNapr, $IDStatus)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDNaprawa === null || $IDKlient === null || $IDProducent === null || $NazMyjki === null || $TypMyjki === null  || $NrOsprzet === null  || $Wycena === null  || $DataDost === null  || $KwotaNap === null  || $OpisNapr === null  || $IDStatus === null ){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableNaprawa.'` SET
                `'.\Config\Database\DBConfig\Naprawa::$IDKlient.'`=:IDKlient, `'.\Config\Database\DBConfig\Naprawa::$IDProducent.'`=:IDProducent, `'.\Config\Database\DBConfig\Naprawa::$NazMyjki.'`=:NazMyjki,  `'.\Config\Database\DBConfig\Naprawa::$TypMyjki.'`=:TypMyjki,  `'.\Config\Database\DBConfig\Naprawa::$NrOsprzet.'`=:NrOsprzet,  `'.\Config\Database\DBConfig\Naprawa::$Wycena.'`=:Wycena, `'.\Config\Database\DBConfig\Naprawa::$DataDost.'`=:DataDost,  `'.\Config\Database\DBConfig\Naprawa::$DataOdbi.'`=:DataOdbi, `'.\Config\Database\DBConfig\Naprawa::$KwotaNap.'`=:KwotaNap, `'.\Config\Database\DBConfig\Naprawa::$OpisNapr.'`=:OpisNapr,
                `'.\Config\Database\DBConfig\Naprawa::$IDStatus.'`=:IDStatus
                WHERE `'
                .\Config\Database\DBConfig\Naprawa::$IDNaprawa.'`=:IDNaprawa');   
                
                
                $stmt->bindValue(':IDKlient', $IDKlient, PDO::PARAM_INT);
                $stmt->bindValue(':IDProducent', $IDProducent, PDO::PARAM_INT);
                $stmt->bindValue(':NazMyjki', $NazMyjki, PDO::PARAM_INT);
                $stmt->bindValue(':TypMyjki', $TypMyjki, PDO::PARAM_STR);
				$stmt->bindValue(':NrOsprzet', $NrOsprzet, PDO::PARAM_STR);
                $stmt->bindValue(':Wycena', $Wycena, PDO::PARAM_INT);
                $stmt->bindValue(':DataDost', $DataDost, PDO::PARAM_INT);
                $stmt->bindValue(':DataOdbi', $DataOdbi, PDO::PARAM_INT);
                $stmt->bindValue(':KwotaNap', $KwotaNap, PDO::PARAM_STR);
                $stmt->bindValue(':OpisNapr', $OpisNapr, PDO::PARAM_INT);
                $stmt->bindValue(':IDStatus', $IDStatus, PDO::PARAM_INT);
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
    
    
    
