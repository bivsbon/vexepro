<?php
require_once _DIR_ROOT.'/app/s/Home.php';

class Home extends Controller {

    public function index(): void {
        $provinces = StationService::getProvinces();
        $data['provinces'] = $provinces;

        $this->render('Home', $data);
    }

    public function me() {
        $uid = $_SESSION['userObj']->id;
        $tickets = TicketService::getByUserId($uid);
        $data['tickets'] = $tickets;

        $this->render('Me', $data);
    }

    public function add() : void {
        $data = Request::getFields();

        StationService::add($data['name']);
    }
}