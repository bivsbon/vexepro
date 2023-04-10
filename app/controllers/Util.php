<?php
require_once _DIR_ROOT.'/app/services/TripService.php';

class Util extends Controller {
    private TripService $tripService;

    public function __construct() {
        $this->tripService = new TripService();
    }

    public function tripSeeding() : void {
        $this->tripService->seed();
    }
}