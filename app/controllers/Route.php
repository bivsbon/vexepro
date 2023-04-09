<?php
class Route {
    public function add() {
        $data = Request::getFields();

        $routeService = new RouteService();
        $routeService->addRoute($data);

        $this->render('home');
    }
}