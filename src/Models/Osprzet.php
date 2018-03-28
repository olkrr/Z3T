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
            $osprzety[$przedmiot[\Config\Database\DBConfig\Osprzet::$IDOsprzet]] = $przedmiot[\Config\Database\DBConfig\Osprzet::$OsprzetNazwa];
            return $osprzety;
        
        }
        
        public function getOne($IDOsprzet)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDOsprzet === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['osprzety'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableOsprzet.'` WHERE  `'.\Config\Database\DBConfig\Osprzet::$IDOsprzet.'`=:IDOsprzet');
                $stmt->bindValue(':IDOsprzet', $IDOsprzet, PDO::PARAM_INT); 
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
        
        public function add($OsprzetNazwa)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($OsprzetNazwa === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableOsprzet.'` (`'
				.\Config\Database\DBConfig\Osprzet::$OsprzetNazwa.'`) VALUES (:OsprzetNazwa)');                   

                $stmt->bindValue(':OsprzetNazwa', $OsprzetNazwa, PDO::PARAM_STR); 
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
        
		public function delete($IDOsprzet)
        {
            $data = array();
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDOsprzet === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            
            try	
            {
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableOsprzet.'` WHERE  `'.\Config\Database\DBConfig\Category::$IDOsprzet.'`=:IDOsprzet');   
                $stmt->bindValue(':IDOsprzet', $IDOsprzet, PDO::PARAM_INT); 
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
        
        public function update($IDOsprzet, $OsprzetNazwa)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDOsprzet === null || $OsprzetNazwa === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableOsprzet.'` SET
                `'.\Config\Database\DBConfig\Osprzet::$OsprzetNazwa.'`=:OsprzetNazwa WHERE `'
                .\Config\Database\DBConfig\Osprzet::$IDOsprzet.'`=:IDOsprzet');   
                $stmt->bindValue(':IDOsprzet', $IDOsprzet, PDO::PARAM_INT);
                $stmt->bindValue(':OsprzetNazwa', $OsprzetNazwa, PDO::PARAM_STR);
                
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
    
    
    
