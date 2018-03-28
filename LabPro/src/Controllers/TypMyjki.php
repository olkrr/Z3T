<?php
    namespace Controllers;
    
    class TypMyjki extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('TypMyjki');
            
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
            $view = $this->getView('TypMyjki');
			$view->addform();
        }
        
        public function add(){                        
            $model=$this->getModel('TypMyjki');
            $data = $model->add($_POST['TypMyjkiNazwa']);
            
            $this->redirect(TypMyjki/getAll');
        }
        
        public function delete($id){                 
            $model=$this->getModel('TypMyjki'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect(TypMyjki/getAll');
        }
        
        public function editform($id){
            $model = $this->getModel('TypMyjki');
            $data = $model->getOne($id);
			//echo $data['typymyjki'][1];
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
            $this->redirect(TypMyjki/getAll');
            }
            $view = $this->getView('TypMyjki');
			$view->editform($data['typymyjki']);   
        }
        
        public function update(){
            $model=$this->getModel('TypMyjki');
			//echo $_POST['TypMyjkiNazwa'];
            $data = $model->update($_POST['id'], $_POST['TypMyjkiNazwa']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect(TypMyjki/getAll');
        }
    }
    
    
    
    
