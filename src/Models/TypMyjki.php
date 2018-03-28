<?php

    namespace Models;
    use \PDO;
    class TypMyjki extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['typymyjki'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableTypMyjki.'`');
            $typymyjki = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($typymyjki && !empty($typymyjki))
                $data['typymyjki'] = $typymyjki;
        }
        catch(\PDOException $e)	
        {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }   
         return $data;
        }
        
        public function getAllForSelect()
        {
            $data = $this->getAll();
                $typymyjki = array();
            if (!isset($data['error']))
            foreach($data['typymyjki'] as $przedmiot)
            $typymyjki[$przedmiot[\Config\Database\DBConfig\TypMyjki::$IDTypMyjki]] = $przedmiot[\Config\Database\DBConfig\TypMyjki::$NazwaTypMyjki];
            return $typymyjki;
        
        }
        
        public function getOne($IDTypMyjki)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDTypMyjki === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['typymyjki'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableTypMyjki.'` WHERE  `'.\Config\Database\DBConfig\TypMyjki::$IDTypMyjki.'`=:IDTypMyjki');
                $stmt->bindValue(':IDTypMyjki', $IDTypMyjki, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $typymyjki = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($typymyjki && !empty($typymyjki))
				{
                    $data['typymyjki'] = $typymyjki[0];
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
        
        public function add($NazwaTypMyjki)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($NazwaTypMyjki === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableTypMyjki.'` (`'
				.\Config\Database\DBConfig\TypMyjki::$NazwaTypMyjki.'`) VALUES (:NazwaTypMyjki)');                   

                $stmt->bindValue(':NazwaTypMyjki', $NazwaTypMyjki, PDO::PARAM_STR); 
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
        
		public function delete($IDTypMyjki)
        {
            $data = array();
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDTypMyjki === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            
            try	
            {
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableTypMyjki.'` WHERE  `'.\Config\Database\DBConfig\Category::$IDTypMyjki.'`=:IDTypMyjki');   
                $stmt->bindValue(':IDTypMyjki', $IDTypMyjki, PDO::PARAM_INT); 
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
        
        public function update($IDTypMyjki, $NazwaTypMyjki)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDTypMyjki === null || $NazwaTypMyjki === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableTypMyjki.'` SET
                `'.\Config\Database\DBConfig\TypMyjki::$NazwaTypMyjki.'`=:NazwaTypMyjki WHERE `'
                .\Config\Database\DBConfig\TypMyjki::$IDTypMyjki.'`=:IDTypMyjki');   
                $stmt->bindValue(':IDTypMyjki', $IDTypMyjki, PDO::PARAM_INT);
                $stmt->bindValue(':NazwaTypMyjki', $NazwaTypMyjki, PDO::PARAM_STR);
                
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
    
    
    
