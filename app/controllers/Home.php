<?php
require_once _DIR_ROOT.'/app/dao/RouteDao.php';

class Home extends Controller {
    public function index(): void
    {
        $routeDao = new RouteDao();
        $routeDao->getRouteEndPoints();

        $this->render('home');
    }
}