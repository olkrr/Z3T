<?php
	namespace Controllers;
	
    class Uzytkownik extends Controller {
	
        public function addform(){
            $view = $this->getView('Uzytkownik');
			$view->addform();
        }
        public function add(){
			//$model=$this->getModel('Klient');
            //$data = $model->add($_POST['Imie'], $_POST['Nazwisko'], $_POST['NazwaFirmy'], $_POST['Telefon'], $_POST['Email'], $_POST['Nip']);
			
            $model=$this->getModel('Uzytkownik');
			$model->add($_POST['login'], md5($_POST['haslo']), $_POST['IDKlient']);

            
        }
		
	}
