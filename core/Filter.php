<?php
abstract class Filter {
    private object $controller;
    private string $action;
    private array $params;

    public function __construct(object $controller, string $action, array $params)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    public function run() : void {
        $this->doFilter();

        // Call the method to execute the action
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    abstract protected function doFilter();

    protected function redirect($url, $statusCode = 303) : void {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
}