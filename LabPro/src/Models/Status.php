<?php

    namespace Models;
    use \PDO;
    class Status extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['statusy'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableStatus.'`');
            $statusy = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($statusy && !empty($statusy))
                $data['statusy'] = $statusy;
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
                $statusy = array();
            if (!isset($data['error']))
            foreach($data['statusy'] as $przedmiot)
            $statusy[$przedmiot[\Config\Database\DBConfig\Status::$IDStatus]] = $przedmiot[\Config\Database\DBConfig\Status::$NazStatus];
            return $statusy;
        
        }
        
        public function getOne($IDStatus)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDStatus === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['statusy'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableStatus.'` WHERE  `'.\Config\Database\DBConfig\Status::$IDStatus.'`=:IDStatus');
                $stmt->bindValue(':IDStatus', $IDStatus, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $statusy = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($statusy && !empty($statusy))
				{
                    $data['statusy'] = $statusy[0];
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
        
        public function add($NazStatus)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($NazStatus === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableStatus.'` (`'
				.\Config\Database\DBConfig\Status::$NazStatus.'`) VALUES (:NazStatus)');                   

                $stmt->bindValue(':NazStatus', $NazStatus, PDO::PARAM_STR); 
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
        
		public function delete($IDStatus)
        {
            $data = array();
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDStatus === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            
            try	
            {
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableStatus.'` WHERE  `'.\Config\Database\DBConfig\Category::$IDStatus.'`=:IDStatus');   
                $stmt->bindValue(':IDStatus', $IDStatus, PDO::PARAM_INT); 
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
        
        public function update($IDStatus, $NazStatus)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDStatus === null || $NazStatus === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableStatus.'` SET
                `'.\Config\Database\DBConfig\Status::$NazStatus.'`=:NazStatus WHERE `'
                .\Config\Database\DBConfig\Status::$IDStatus.'`=:IDStatus');   
                $stmt->bindValue(':IDStatus', $IDStatus, PDO::PARAM_INT);
                $stmt->bindValue(':NazStatus', $NazStatus, PDO::PARAM_STR);
                
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
    
    
    
