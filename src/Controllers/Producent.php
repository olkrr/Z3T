<?php
    namespace Controllers;
    
    class Producent extends Controller
    {
        public function getAll()
        {
            $view = $this->getView('Producent');
            
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
            $view = $this->getView('Producent');
			$view->addform();
        }
        
        public function add(){                        
            $model=$this->getModel('Producent');
            $data = $model->add($_POST['ProducentNazwa']);
            
            $this->redirect('?controller=Producent&action=getAll');
        }
        
        public function delete($id){                 
            $model=$this->getModel('Producent'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('?controller=Producent&action=getAll');
        }
        
        public function editform($id){
            $model = $this->getModel('Producent');
            $data = $model->getOne($id);
			//echo $data['typymyjki'][1];
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
            $this->redirect('?controller=Producent&action=getAll');
            }
            $view = $this->getView('Producent');
			$view->editform($data['producenci']);   
        }
        
        public function update(){
            $model=$this->getModel('Producent');
			//echo $_POST['NazProducent'];
            $data = $model->update($_POST['id'], $_POST['ProducentNazwa']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('?controller=Producent&action=getAll');
        }
    }
    
    
    
    
