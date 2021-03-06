<?php
    class Route {

        /**
        * (string) Route path
        */
        private $path;

        /**
        * (closure) Callback function
        */
        private $callable;

        /**
        * (array) Regex array for matching with params
        */
        private $matches = array();

        /**
        * (array) Parameters passed in the url 
        */
        private $params = array();

        /**
        * (array) Middlewares to be executed before the route is called
        */
        private $middlewares = array();

        public function __construct($path, $callable){
            $this->path = trim($path, '/');
            $this->callable = $callable;
        }

        /**
        * Allow to apply a filter on a param
        * @param (string) param : Param to apply the filter
        * @param (string) regex : Regex the param have to match with
        * @return (Route) this For fluence purposes
        */
        public function with($param, $regex){
            $this->params[$param] = str_replace('(', '(?:', $regex);
            return $this;
        }

        /**
        * Add a middleware to be executed before the route is called
        * @param (string) middlewareName : Name of the middleware
        * @param (array) args : Associative array of arguments to be passed to the middleware
        * @return (Route) this For fluence purposes 
        */
        public function middleware($middlewareName, $args = null){
            $middlewareName .= 'Middleware';
            $this->middlewares[] = ['middlewareClass' => new $middlewareName(), 'args' => $args];
            return $this;
        }

        /**
        * Execute all middleware handle function
        * @return (bool) true if all middlewares execute successfully, false otherwise 
        */
        public function execMiddlewares(){
            foreach ($this->middlewares as $middleware){
                if($middleware['middlewareClass']->handle($middleware['args']) == false){
                    $middleware['middlewareClass']->onError($middleware['args']);
                    return false;
                }
                $middleware['middlewareClass']->onSuccess($middleware['args']);
            }

            return true;
        }

        /**
        * Tells if a url match the route specification
        * @param (string) url : Url to be tested
        * @return (bool) True if the url match the route specification, false otherwise
        */
        public function match($url){
            $url = trim($url, '/');
            $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
            $path = str_replace('/', '\/', $path);

            if(!preg_match('#^' . $path . '$#i', $url, $matches))
                return false;

            array_shift($matches);
            $this->matches = $matches;

            return true;
        }

        /**
        * Call and return the action mapped with this route
        * @return (closure) The action mapped with this route
        */
        public function call(){
            if(is_string($this->callable)){
                $params = explode('.', $this->callable);
                $function = (count($params) == 2) ? $params[1] : 'index';
                return call_user_func_array([new $params[0](), $function], $this->matches);
            }
            else
                return call_user_func_array($this->callable, $this->matches);
        }

        /**
        * Build and return the url coresponding to this route
        * @param (array) params : params send as an input for this url
        * @return (string) The url coresponding to this route with the params
        */
        public function getUrl($params){
            $path = $this->path;
            foreach ($params as $key => $value)
                $path = str_replace(':' . $key, $value, $path);
            return $path;
        }

        /**
        * Return a regex for capturing a param in an url
        * @param (string) match : name of the param to match
        * @return (string) Regex for capturing a param in an url
        */
        private function paramMatch($match){
            if(isset($this->params[$match[1]]))
                return '(' . $this->params[$match[1]] . ')';
            return '([^/]+)';
        }
    }
?>