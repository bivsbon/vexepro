<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/services/StationService.php';

class Home extends Controller {
    private StationService $stationService;
    private TicketService $ticketService;

    public function __construct() {
        $this->stationService = new StationService();
        $this->ticketService = new TicketService();
    }

    public function index(): void {
        $provinces = $this->stationService->getProvinces();
        $data['provinces'] = $provinces;

        $this->render('Home', $data);
    }

    public function me() {
        $uid = $_SESSION['userObj']->id;
        $tickets = $this->ticketService->getByUserId($uid);
        $data['tickets'] = $tickets;

        $this->render('Me', $data);
    }

    public function add() : void {
        $data = Request::getFields();
        $ss = new StationService();

        $ss->add($data['name']);
    }
}