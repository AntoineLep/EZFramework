<?php 
    if(isset($_GET['url'])){

        Router::init($_GET['url']);

        Router::get('/', function(){ echo 'home'; });
        Router::get('/callable', function(){ echo 'callable function'; });
        Router::get('/callable/:id', function($id){ echo 'callable function with id ' . $id; })->with('id', '[0-9]+');
        Router::get('/controller', 'TestsController');
        Router::get('/controller/:id', 'TestsController.show')->with(':id', '[0-9]+');

        Router::run();
    }
?>