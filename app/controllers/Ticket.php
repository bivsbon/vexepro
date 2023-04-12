<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';

class Ticket extends Controller {
    private TicketService $ticketService;
    public function __construct() {
        $this->ticketService = new TicketService();
    }
    public function book() : void {
        $data = Request::getFields();

        $this->ticketService->add($data);

        $this->render('home');
    }

    public function cancel() : void {
        $ticketID = Request::getFields()['ticket_id'];

        $this->ticketService->cancel($ticketID);
    }
}