<?php
    namespace Views;
    
    class Producent extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Producent');
            
            $data = $model->getAll();
			$this->set('producenci', $data['producenci']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('ProducentGetAll');
		}
        
         public function addform()
         {
            $this->set('customScript', array('jquery.validate.min', 'ProducentAddForm'));
			$this->render('ProducentAddForm');
        }
        
        public function editform($producent){
            $this->set('IDProducent', $producent[\Config\Database\DBConfig\Producent::$IDProducent]);
            $this->set('ProducentNazwa', $producent[\Config\Database\DBConfig\Producent::$ProducentNazwa]);
            $this->set('customScript', array('jquery.validate.min', 'ProducentAddForm'));
			$this->render('ProducentEditForm');
        }   
    }
