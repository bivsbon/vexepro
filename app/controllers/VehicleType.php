
<?php
require_once _DIR_ROOT.'/app/services/VehicleTypeService.php';
class VehicleType extends Controller {
    private VehicleTypeService $vehicleTypeService;
    public function __construct() {
        $this->vehicleTypeService = new VehicleTypeService();
    }

    public function add() : void {
        $data = Request::getFields();
        try {
            $this->vehicleTypeService->add($data);
            $res = ['res' => 'success'];
        } catch (\Throwable $th) {
            $res = ['res' => $th];
        }
        $this->render('VehicleMana', $res);
        
    }
}