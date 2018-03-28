<?php
    namespace Views;
    
    class Klient extends View
    {
        public function getAll($data = null)
        {
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
            $model = $this->getModel('Klient');
            
            $data = $model->getAll();
			$this->set('klienci', $data['klienci']);
    
            if(isset($data['error']))
                $this->set('error', $data['error']);
            $this->set('customScript', array('datatables.min', 'table.min'));
			$this->render('KlientGetAll');
		}
        
         public function addform()
         {
            $this->set('customScript', array('jquery.validate.min', 'KlientAddForm'));
			$this->render('KlientAddForm');
        }
        
        public function editform($klient){
			//d($klient);
            $this->set('IDKlient', $klient[\Config\Database\DBConfig\Klient::$IDKlient]);
            $this->set('Imie', $klient[\Config\Database\DBConfig\Klient::$Imie]);
            $this->set('Nazwisko', $klient[\Config\Database\DBConfig\Klient::$Nazwisko]);
            $this->set('NazwaFirmy', $klient[\Config\Database\DBConfig\Klient::$NazwaFirmy]);
            $this->set('NumerTelefonu', $klient[\Config\Database\DBConfig\Klient::$NumerTelefonu]);
            $this->set('Email', $klient[\Config\Database\DBConfig\Klient::$Email]);
            $this->set('Ulica', $klient[\Config\Database\DBConfig\Klient::$Ulica]);
			$this->set('NumerDomu', $klient[\Config\Database\DBConfig\Klient::$NumerDomu]);
			$this->set('Miejscowosc', $klient[\Config\Database\DBConfig\Klient::$Miejscowosc]);
			$this->set('KodPocztowy', $klient[\Config\Database\DBConfig\Klient::$KodPocztowy);
			$this->set('Uwagi', $klient[\Config\Database\DBConfig\Klient::$Uwagi]);
            $this->set('customScript', array('jquery.validate.min', 'KlientAddForm'));
			$this->render('KlientEditForm');
        }   
    }
