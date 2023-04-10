<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';

class Ticket extends Controller {
    public function book() : void {
        $data = Request::getFields();

        $userService = new UserService();
        $userService->add($data);

        $this->render('home');
    }

    public function cancel() {
        $ticketID = Request::getFields()['ticket_id'];
    }

    public function get() : void {

    }
}