<?php
    namespace Controllers;
    
    class Naprawa extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('Naprawa');
            
            $data = null;
            
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');    
		}
        
		public function getAllForSelect()
        {
            $view = $this->getView('Naprawa');
            
            $data = null;
            
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');    
		}
        
		
        public function addform($id)
        {             
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $view = $this->getView('Naprawa');
			$view->addform($id);
        }
        
        public function add(){  
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Naprawa');
            $data = $model->add($_POST['idKlienta'], $_POST['IDProducent'], $_POST['NazMyjki'], $_POST['TypMyjki'], $_POST['NrOsprzet'], $_POST['Wycena'], $_POST['DataDost'], $_POST['DataOdbi'], $_POST['KwotaNap'], $_POST['OpisNapr'], $_POST['IDStatus']);
            
            
             $this->redirect('Naprawa/getAll');
        }
        
        public function delete($id){ 
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Naprawa'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
			 $this->redirect('Naprawa/getAll');            
        }
        
        public function editform($id){
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model = $this->getModel('Naprawa');
            $data = $model->getOne($id);

            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
			 $this->redirect('Naprawa/getAll');            
            }
            $view = $this->getView('Naprawa');
			$view->editform($data['naprawy']);   
        }
        
        public function update(){
			$accessController = new \Controllers\Access();
            $accessController->islogin();
            $model=$this->getModel('Naprawa');
			
            $data = $model->update($_POST['IDNaprawa'], $_POST['IDKlient'], $_POST['IDProducent'], $_POST['NazMyjki'], $_POST['TypMyjki'], $_POST['NrOsprzet'], $_POST['Wycena'], $_POST['DataDost'], $_POST['DataOdbi'], $_POST['KwotaNap'], $_POST['OpisNapr'], $_POST['IDStatus']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
			 $this->redirect('Naprawa/getAll');            
        }
    }
    
    
    
    
