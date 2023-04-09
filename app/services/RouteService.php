<?php
require_once _DIR_ROOT.'/app/dao/RouteDao.php';

class RouteService {
    public function addRoutes($data) {
        $routeDao = new RouteDao();
        $routeDao->addRoute(array_values($data));
    }
}