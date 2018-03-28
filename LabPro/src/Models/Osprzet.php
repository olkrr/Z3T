<?php

    namespace Models;
    use \PDO;
    class Osprzet extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['osprzety'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableOsprzet.'`');
            $osprzety = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($osprzety && !empty($osprzety))
                $data['osprzety'] = $osprzety;
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
                $osprzety = array();
            if (!isset($data['error']))
            foreach($data['osprzety'] as $przedmiot)
            $osprzety[$przedmiot[\Config\Database\DBConfig\Osprzet::$NrOsprzet]] = $przedmiot[\Config\Database\DBConfig\Osprzet::$NazOsprzet];
            return $osprzety;
        
        }
        
        public function getOne($NrOsprzet)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($NrOsprzet === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['osprzety'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableOsprzet.'` WHERE  `'.\Config\Database\DBConfig\Osprzet::$NrOsprzet.'`=:NrOsprzet');
                $stmt->bindValue(':NrOsprzet', $NrOsprzet, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $osprzety = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($osprzety && !empty($osprzety))
				{
                    $data['osprzety'] = $osprzety[0];
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
        
        public function add($NazOsprzet)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($NazOsprzet === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableOsprzet.'` (`'
				.\Config\Database\DBConfig\Osprzet::$NazOsprzet.'`) VALUES (:NazOsprzet)');                   

                $stmt->bindValue(':NazOsprzet', $NazOsprzet, PDO::PARAM_STR); 
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
        
		public function delete($NrOsprzet)
        {
            $data = array();
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($NrOsprzet === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            
            try	
            {
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableOsprzet.'` WHERE  `'.\Config\Database\DBConfig\Category::$NrOsprzet.'`=:NrOsprzet');   
                $stmt->bindValue(':NrOsprzet', $NrOsprzet, PDO::PARAM_INT); 
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
        
        public function update($NrOsprzet, $NazOsprzet)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($NrOsprzet === null || $NazOsprzet === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableOsprzet.'` SET
                `'.\Config\Database\DBConfig\Osprzet::$NazOsprzet.'`=:NazOsprzet WHERE `'
                .\Config\Database\DBConfig\Osprzet::$NrOsprzet.'`=:NrOsprzet');   
                $stmt->bindValue(':NrOsprzet', $NrOsprzet, PDO::PARAM_INT);
                $stmt->bindValue(':NazOsprzet', $NazOsprzet, PDO::PARAM_STR);
                
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
    
    
    
