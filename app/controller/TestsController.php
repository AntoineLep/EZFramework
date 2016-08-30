<?php
    class TestsController extends Controller {

        public function index(){
            $this->render(['content' => 'index']);
        }

        public function show($id){
            $this->loadModel('TestModel');
            $data = ['content' => $this->TestModel->getContent(), 
                     'id' => $id, 
                     'uri' => __CLASS__ . '.' . __FUNCTION__];

            $this->loadView('test/index', $data);
            $this->render(['content' => 'show']);
        }

        public function create(){
            echo 'azerty';
        }
    }
?>