<?php
    namespace Controllers;
    
    class Osprzet extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('Osprzet');
            
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
            $view = $this->getView('Osprzet');
			$view->addform();
        }
        
        public function add(){                        
            $model=$this->getModel('Osprzet');
            $data = $model->add($_POST['NazOsprzet']);
            
            $this->redirect('Osprzet/getAll');
        }
        
        public function delete($id){                 
            $model=$this->getModel('Osprzet'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Osprzet/getAll');
        }
        
        public function editform($id){
            $model = $this->getModel('Osprzet');
            $data = $model->getOne($id);
			//echo $data['typymyjki'][1];
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
            $this->redirect('Osprzet/getAll');
            }
            $view = $this->getView('Osprzet');
			$view->editform($data['osprzety']);   
        }
        
        public function update(){
            $model=$this->getModel('Osprzet');
			//echo $_POST['NazOsprzet'];
            $data = $model->update($_POST['id'], $_POST['NazOsprzet']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Osprzet/getAll');
        }
    }
    
    
    
    
