<?php
require_once _DIR_ROOT.'/app/services/TripService.php';

class Trip extends Controller {
    private TripService $tripService;
    public function __construct() {
        $this->tripService = new TripService();
        $this->tripDao = new TripDao();
    }
    public function search() {
        $data = Request::getFields();
        $trips = $this->tripDao->search($data);

        $this->render('after_search');
    }
}