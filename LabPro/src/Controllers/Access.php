<?php
	namespace Controllers;
	//kontroler do obsługi logowania
	//każda metoda odpowiada jednej akcji możliwej 
	//do wykonania przez kontroler
	class Access extends Controller {
		//wyświetla formularz do logowania
		public function logform($data = null){
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error'); 
			$view=$this->getView('Access');
			$view->logform($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
		}
		//zalogowuje do systemu		
		public function login(){
			$model=$this->getModel('Access');
			$data = $model->login($_POST['login'],md5($_POST['password']));
			if(!isset($data['error']))
				$this->redirect('');
			else
				$this->logform($data);
		}		
		
		//wylogowuje z systemu
		public function logout(){			
			$model=$this->getModel('Access');
			$model->logout();
			$this->redirect('');
		}	
        
        public function islogin(){
            if(\Tools\Access::islogin() !== true){
                \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
                $this->redirect('access/logform');
            }            
        }
	}
