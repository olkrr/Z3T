<?php
    namespace Views;
    
    class Osprzet extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Osprzet');
            
            $data = $model->getAll();
			$this->set('osprzety', $data['osprzety']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('OsprzetGetAll');
		}
        
         public function addform()
         {
            $this->set('customScript', array('jquery.validate.min', 'OsprzetAddForm'));
			$this->render('OsprzetAddForm');
        }
        
        public function editform($osprzet){
            $this->set('NrOsprzet', $osprzet[\Config\Database\DBConfig\Osprzet::$NrOsprzet]);
            $this->set('NazOsprzet', $osprzet[\Config\Database\DBConfig\Osprzet::$NazOsprzet]);
            $this->set('customScript', array('jquery.validate.min', 'OsprzetAddForm'));
			$this->render('OsprzetEditForm');
        }   
    }
