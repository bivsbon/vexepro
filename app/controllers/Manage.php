<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/services/StationService.php';
require_once _DIR_ROOT.'/app/services/AgencyService.php';
require_once _DIR_ROOT.'/app/services/UserService.php';
require_once _DIR_ROOT.'/app/services/VehicleService.php';
require_once _DIR_ROOT.'/app/services/VehicleTypeService.php';
require_once _DIR_ROOT.'/app/services/TripService.php';

class Manage extends Controller {
    private StationService $stationService;
    private TicketService $ticketService;
    private AgencyService $agencyService;
    private UserService $userService;
    private VehicleService $vehicleService;
    private VehicleTypeService $vehicleTypeService;
    private TripService $tripService;

    public function __construct() {
        $this->stationService = new StationService();
        $this->ticketService = new TicketService();
        $this->agencyService = new AgencyService();
        $this->userService = new UserService();
        $this->vehicleService = new VehicleService();
        $this->vehicleTypeService = new VehicleTypeService();
    }
    public function customer() : void {
        $this->render('UserMana');
    }

    public function agency() : void {
        $agencies = $this->agencyService->getAll();
        $data['agencies'] = $agencies;

        $this->render('AgencyMana', $data);
    }

    public function vehicle() : void {
        $this->render('VehicleMana');
    }

    public function vehicleType() : void {
        $this->render('VehicleTypeMana');
    }

    public function ticket() : void {
        $this->render('TicketMana');
    }

    public function trip() : void {
        $this->render('TripMana');
    }
}