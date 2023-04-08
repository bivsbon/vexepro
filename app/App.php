<?php
class App {
    private $__controller, $__action, $__params, $__routes;
    public static $app;
    function __construct() {
        global $routes;
        self::$app = $this;

        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__params = [];

        $this->handleUrl();
    }

    function getUrl() {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else $url = '/';

        return $url;
    }

    public function handleUrl() {
        $url = $this->getUrl();
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);

        // Controller process
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            // Use default controller
            $this->__controller = ucfirst($this->__controller);
        }

        // Load controller class
        if (file_exists('app/controllers/'.($this->__controller).'.php')) {
            require_once 'controllers/'.($this->__controller).'.php';
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            }
        } else {
            $this->loadError();
        }

        // Action process
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        $this->__params = array_values($urlArr);

        if (method_exists($this->__controller, $this->__action)) {
            // Call the method to execute the action
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        }
    }

    public function loadError($name='404') {
        require_once 'errors/'.$name.'.php';
    }
}