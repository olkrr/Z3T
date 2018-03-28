<?php
    namespace Views;
    
    class Status extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Status');
            
            $data = $model->getAll();
			$this->set('statusy', $data['statusy']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('StatusGetAll');
		}
        
         public function addform()
         {
            $this->set('customScript', array('jquery.validate.min', 'StatusAddForm'));
			$this->render('StatusAddForm');
        }
        
        public function editform($osprzet){
            $this->set('IDStatus', $osprzet[\Config\Database\DBConfig\Status::$IDStatus]);
            $this->set('StatusNazwa', $osprzet[\Config\Database\DBConfig\Status::$StatusNazwa]);
            $this->set('customScript', array('jquery.validate.min', 'StatusAddForm'));
			$this->render('StatusEditForm');
        }   
    }
