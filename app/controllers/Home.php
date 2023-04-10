<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';

class Home extends Controller {

    public function index(): void {
        $this->render('home');
    }
}