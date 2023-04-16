<?php
require_once _DIR_ROOT.'/app/services/VehicleTypeService.php';
require_once _DIR_ROOT.'/app/controllers/Vehicle.php';

class VehicleType extends Controller {
    private Vehicle $vehicleController;
    public function __construct() {
        $this->vehicleController = new Vehicle();
    }
    public function add() : void {
        
        $data = Request::getFields();
        try {
            VehicleTypeService::add($data);
            $res = ['msg' => 'success'];
        } catch (\Throwable $th) {
            $res = ['msg' => 'failed', 'error' => $th];
        }
        $this->vehicleController->manage();
    }
}