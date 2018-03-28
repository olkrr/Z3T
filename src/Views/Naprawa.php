<?php
    namespace Views;
    
    class Naprawa extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Naprawa');
            
            $data = $model->getAll();
			$this->set('naprawy', $data['naprawy']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('NaprawaGetAll');
		}
        public function getAllForSelect()
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Naprawa');
            
            $data = $model->getAll();
			$this->set('naprawy', $data['naprawy']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('NaprawaGetAllForSelect');
		}
         public function addform($naprawa)
         {
            $this->set('customScript', array('jquery.validate.min', 'NaprawaAddForm'));
			$this->set('IDKlient', $naprawa);
			$this->render('NaprawaAddForm');
        }
        
        public function editform($naprawa){
            $this->set('IDNaprawa', $naprawa[\Config\Database\DBConfig\Naprawa::$IDNaprawa]);
            $this->set('IDKlient', $naprawa[\Config\Database\DBConfig\Naprawa::$IDKlient]);
            $this->set('IDProducent', $naprawa[\Config\Database\DBConfig\Naprawa::$IDProducent]);
            $this->set('NazMyjki', $naprawa[\Config\Database\DBConfig\Naprawa::$NazMyjki]);
            $this->set('IDTypMyjki', $naprawa[\Config\Database\DBConfig\Naprawa::$IDTypMyjki]);
            $this->set('IDOsprzet', $naprawa[\Config\Database\DBConfig\Naprawa::$IDOsprzet]);
            $this->set('CzyWycena', $naprawa[\Config\Database\DBConfig\Naprawa::$CzyWycena]);
            $this->set('Symptomy', $naprawa[\Config\Database\DBConfig\Naprawa::$Symptomy]);
            $this->set('Diagnoza', $naprawa[\Config\Database\DBConfig\Naprawa::$Diagnoza]);
            $this->set('OpisNaprawy', $naprawa[\Config\Database\DBConfig\Naprawa::$OpisNaprawy]);
            $this->set('Czesci', $naprawa[\Config\Database\DBConfig\Naprawa::$Czesci]);
            $this->set('DataDostarczenia', $naprawa[\Config\Database\DBConfig\Naprawa::$DataDostarczenia]);
			$this->set('DataOdbioru', $naprawa[\Config\Database\DBConfig\Naprawa::$DataOdbioru]);
			$this->set('IDStatus', $naprawa[\Config\Database\DBConfig\Naprawa::$IDStatus]);
			$this->set('KwotaNaprawy', $naprawa[\Config\Database\DBConfig\Naprawa::$KwotaNaprawy]);
			$this->set('Kartka', $naprawa[\Config\Database\DBConfig\Naprawa::$Kartka]);
			$this->set('Kontakt', $naprawa[\Config\Database\DBConfig\Naprawa::$Kontakt]);

            $this->set('customScript', array('jquery.validate.min', 'NaprawaAddForm'));
			$this->render('NaprawaEditForm');
        }   
    }
