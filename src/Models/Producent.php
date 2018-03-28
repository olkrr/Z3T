<?php

    namespace Models;
    use \PDO;
    class Producent extends Model
    {
        public function getAll()
        {
        if ($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        
        $data = array();
        $data['producenci'] = array();
        try
        {
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableProducent.'`');
            $producenci = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($producenci && !empty($producenci))
                $data['producenci'] = $producenci;
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
                $producenci = array();
            if (!isset($data['error']))
            foreach($data['producenci'] as $przedmiot)
            $producenci[$przedmiot[\Config\Database\DBConfig\Producent::$IDProducent]] = $przedmiot[\Config\Database\DBConfig\Producent::$ProducentNazwa];
            return $producenci;
        
        }
        
        public function getOne($IDProducent)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDProducent === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            } 
        
            $data = array();
            $data['producenci'] = array();
            try
            {
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableProducent.'` WHERE  `'.\Config\Database\DBConfig\Producent::$IDProducent.'`=:IDProducent');
                $stmt->bindValue(':IDProducent', $IDProducent, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                $producenci = $stmt->fetchAll();
                $stmt->closeCursor();
                if ($producenci && !empty($producenci))
				{
                    $data['producenci'] = $producenci[0];
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
        
        public function add($ProducentNazwa)
        {
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;     
            }
            
            if($ProducentNazwa === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            } 
            
            $data = array();
            try
            {
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableProducent.'` (`'
				.\Config\Database\DBConfig\Producent::$ProducentNazwa.'`) VALUES (:ProducentNazwa)');                   

                $stmt->bindValue(':ProducentNazwa', $ProducentNazwa, PDO::PARAM_STR); 
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
        
		public function delete($IDProducent)
        {
            $data = array();
            if($this->pdo === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDProducent === null)
            {
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            
            try	
            {
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableProducent.'` WHERE  `'.\Config\Database\DBConfig\Category::$IDProducent.'`=:IDProducent');   
                $stmt->bindValue(':IDProducent', $IDProducent, PDO::PARAM_INT); 
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
        
        public function update($IDProducent, $ProducentNazwa)
        {
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($IDProducent === null || $ProducentNazwa === null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableProducent.'` SET
                `'.\Config\Database\DBConfig\Producent::$ProducentNazwa.'`=:ProducentNazwa WHERE `'
                .\Config\Database\DBConfig\Producent::$IDProducent.'`=:IDProducent');   
                $stmt->bindValue(':IDProducent', $IDProducent, PDO::PARAM_INT);
                $stmt->bindValue(':ProducentNazwa', $ProducentNazwa, PDO::PARAM_STR);
                
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
    
    
    
