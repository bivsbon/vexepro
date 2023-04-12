<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/services/StationService.php';

class Home extends Controller {
    private StationService $stationService;

    public function __construct() {
        $this->stationService = new StationService();
    }

    public function index(): void {
        $data = [];
        $data['provinces'] = $this->stationService->getProvinces();

        $this->render('Home', $data);
    }

    public function add() : void {
        $data = Request::getFields();
        $ss = new StationService();

        $ss->add($data['name']);
    }
}