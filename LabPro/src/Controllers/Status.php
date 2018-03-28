<?php
    namespace Controllers;
    
    class Status extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('Status');
            
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
            $view = $this->getView('Status');
			$view->addform();
        }
        
        public function add(){                        
            $model=$this->getModel('Status');
            $data = $model->add($_POST['NazStatus']);
            
            $this->redirect(Status/getAll');
        }
        
        public function delete($id){                 
            $model=$this->getModel('Status'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect(Status/getAll');
        }
        
        public function editform($id){
            $model = $this->getModel('Status');
            $data = $model->getOne($id);
			//echo $data['typymyjki'][1];
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
            $this->redirect(Status/getAll');
            }
            $view = $this->getView('Status');
			$view->editform($data['statusy']);   
        }
        
        public function update(){
            $model=$this->getModel('Status');
			//echo $_POST['NazStatus'];
            $data = $model->update($_POST['id'], $_POST['NazStatus']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect(Status/getAll');
        }
    }
    
    
    
    
