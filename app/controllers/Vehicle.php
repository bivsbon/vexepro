<?php
require_once _DIR_ROOT.'/app/services/VehicleService.php';

class Vehicle extends Controller {
    private VehicleService $vehicleService;
    public function __construct() {
        $this->vehicleService = new VehicleService();
    }

    public function add() : void {
        $data = Request::getFields();

        $this->vehicleService->add($data);
    }

    public function genPlateNumbers($n) : void {
        foreach ($this->vehicleService->genPlateNumber($n) as $number) {
            echo $number.'<br>';
        };
    }
}