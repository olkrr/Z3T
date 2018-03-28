<?php
    namespace Views;
    
    class TypMyjki extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('TypMyjki');
            
            $data = $model->getAll();
			$this->set('typymyjki', $data['typymyjki']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('TypMyjkiGetAll');
		}
        
         public function addform()
         {
            $this->set('customScript', array('jquery.validate.min', 'TypMyjkiAddForm'));
			$this->render('TypMyjkiAddForm');
        }
        
        public function editform($typmyjki){
            $this->set('IDTypMyjki', $typmyjki[\Config\Database\DBConfig\TypMyjki::$IDTypMyjki]);
            $this->set('NazwaTypMyjki', $typmyjki[\Config\Database\DBConfig\TypMyjki::$NazwaTypMyjki]);
            $this->set('customScript', array('jquery.validate.min', 'TypMyjkiAddForm'));
			$this->render('TypMyjkiEditForm');
        }   
    }
