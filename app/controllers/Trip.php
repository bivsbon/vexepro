<?php
require_once _DIR_ROOT.'/app/services/TripService.php';

class Trip extends Controller {
    private TripService $tripService;

    public function __construct() {
        $this->tripService = new TripService();
    }
    public function search() : void {
        $data = Request::getFields();
        $trips = $this->tripService->search($data);

        $this->render('after_search', $trips);
    }

    public function seed(string $n) : void {
        echo 'Seeding...';
        $this->tripService->seed(intval($n));
        echo '<br>Done!';
    }
}