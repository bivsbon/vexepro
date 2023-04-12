<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/services/StationService.php';

class Home extends Controller {

    public function index(): void {
        $ss = new StationService();
//        $ss->add();
        $provinces = $ss->getProvinces();
        $this->render('home', $provinces);
    }

    public function add() : void {
        $data = Request::getFields();
        $ss = new StationService();

        $ss->add($data['name']);
    }
}