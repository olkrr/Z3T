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
            $view = $this->getView('Naprawa');
			$view->addform($id);
        }
        
        public function add(){                        
            $model=$this->getModel('Naprawa');
            $data = $model->add($_POST['IDKlient'], $_POST['IDProducent'], $_POST['NazMyjki'], $_POST['IDTypMyjki'], $_POST['IDOsprzet'], $_POST['CzyWycena'], $_POST['Symptomy'], $_POST['Diagnoza'], $_POST['OpisNaprawy'], $_POST['Czesci'], $_POST['DataDostarczenia'], $_POST['DataOdbioru'], $_POST['IDStatus'], $_POST['KwotaNaprawy'], $_POST['Kartka'], $_POST['Kontakt']);
            
            
            $this->redirect('?controller=Naprawa&action=getAll');
        }
        
        public function delete($id){                 
            $model=$this->getModel('Naprawa'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
			$this->redirect('?controller=Naprawa&action=getAll');            
        }
        
        public function editform($id){
            $model = $this->getModel('Naprawa');
            $data = $model->getOne($id);

            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
			$this->redirect('?controller=Naprawa&action=getAll');            
            }
            $view = $this->getView('Naprawa');
			$view->editform($data['naprawy']);   
        }
        
        public function update(){
            $model=$this->getModel('Naprawa');
			
            $data = $model->update($_POST['IDKlient'], $_POST['IDProducent'], $_POST['NazMyjki'], $_POST['IDTypMyjki'], $_POST['IDOsprzet'], $_POST['CzyWycena'], $_POST['Symptomy'], $_POST['Diagnoza'], $_POST['OpisNaprawy'], $_POST['Czesci'], $_POST['DataDostarczenia'], $_POST['DataOdbioru'], $_POST['IDStatus'], $_POST['KwotaNaprawy'], $_POST['Kartka'], $_POST['Kontakt'];
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
			$this->redirect('?controller=Naprawa&action=getAll');            
        }
    }
    
    
    
    
