<?php
    namespace Controllers;
    
    class Klient extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('Klient');
            
            $data = null;
            
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');    
		}
        
        public function addform()
        {     
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $view = $this->getView('Klient');
			$view->addform();
        }
        
        public function add(){     
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Klient');
            $data = $model->add($_POST['Imie'], $_POST['Nazwisko'], $_POST['NazwaFirmy'], $_POST['Telefon'], $_POST['Email'], $_POST['Nip']);
            
            $this->redirect('Klient/getAll');
        }
        
        public function delete($id){ 
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Klient'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Klient/getAll');
        }
        
        public function editform($id){
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model = $this->getModel('Klient');
            $data = $model->getOne($id);
			//echo $data['przedmioty'][1];
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
           $this->redirect('Klient/getAll');
            }
            $view = $this->getView('Klient');
			$view->editform($data['klienci']);  // nie wiem czy te [0] jest potrzebne?   
        }
        
        public function update(){
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Klient');
			//echo $_POST['imie'];
            $data = $model->update($_POST['IDKlient'],$_POST['Imie'], $_POST['Nazwisko'], $_POST['NazwaFirmy'], $_POST['Telefon'], $_POST['Email'], $_POST['Nip']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Klient/getAll');
        }
    }
    
    
    
    
