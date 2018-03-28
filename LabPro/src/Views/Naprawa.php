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
			 $mklient = $this->getModel('Klient');
			$dklient = $mklient->getAll();
			$mproducent = $this->getModel('Producent');
			$dproducent = $mproducent->getAll();
			$mtypmyjki = $this->getModel('TypMyjki');
			$dtypmyjki = $mtypmyjki->getAll();
			$mstatus = $this->getModel('Status');
			$dstatus = $mstatus->getAll();
			$mosprzet = $this->getModel('Osprzet');
			$dosprzet = $mosprzet->getAll();
			
            $this->set('customScript', array('jquery.validate.min', 'NaprawaAddForm'));
			$this->set('IDKlient', $naprawa);
			$this->render('NaprawaAddForm');
			
			
			
        }
        
        public function editform($naprawa){
			
			$mklient = $this->getModel('Klient');
			$dklient = $mklient->getAll();
			$mproducent = $this->getModel('Producent');
			$dproducent = $mproducent->getAll();
			$mtypmyjki = $this->getModel('TypMyjki');
			$dtypmyjki = $mtypmyjki->getAll();
			$mstatus = $this->getModel('Status');
			$dstatus = $mstatus->getAll();
			$mosprzet = $this->getModel('Osprzet');
			$dosprzet = $mosprzet->getAll();
			
            $this->set('IDNaprawa', $naprawa[\Config\Database\DBConfig\Naprawa::$IDNaprawa]);
            $this->set('IDKlient', $naprawa[\Config\Database\DBConfig\Naprawa::$IDKlient]);
            $this->set('IDProducent', $naprawa[\Config\Database\DBConfig\Naprawa::$IDProducent]);
            $this->set('NazMyjki', $naprawa[\Config\Database\DBConfig\Naprawa::$NazMyjki]);
            $this->set('TypMyjki', $naprawa[\Config\Database\DBConfig\Naprawa::$TypMyjki]);
            $this->set('NrOsprzet', $naprawa[\Config\Database\DBConfig\Naprawa::$NrOsprzet]);
            $this->set('Wycena', $naprawa[\Config\Database\DBConfig\Naprawa::$Wycena]);
            $this->set('DataDost', $naprawa[\Config\Database\DBConfig\Naprawa::$DataDost]);
            $this->set('DataOdbi', $naprawa[\Config\Database\DBConfig\Naprawa::$DataOdbi]);
            $this->set('KwotaNap', $naprawa[\Config\Database\DBConfig\Naprawa::$KwotaNap]);
            $this->set('OpisNapr', $naprawa[\Config\Database\DBConfig\Naprawa::$OpisNapr]);
            $this->set('IDStatus', $naprawa[\Config\Database\DBConfig\Naprawa::$IDStatus]);

            $this->set('customScript', array('jquery.validate.min', 'NaprawaAddForm'));
			$this->render('NaprawaEditForm');
        }   
    }
