<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';

class Ticket extends Controller {
    public function book($ticket) : void {
        $data = Request::getFields();

        $userService = new UserService();
        $userService->add($data);

        $this->render('home');
    }

    public function cancel() {
        $ticketID = Request::getFields()['ticket_id'];
    }
}