<?php 
    class ExampleMiddleware implements IMiddleware {
        public function handle($args = null){
            return true;
        }

        public function onError($args = null){
        }

        public function onSuccess($args = null){

        }
    }
?>