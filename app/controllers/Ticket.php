<?php
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/services/TripService.php';
require_once _DIR_ROOT.'/app/controllers/Home.php';

class Ticket extends Controller {
    private TicketService $ticketService;
    private TripService $tripService;
    private Home $home;
    public function __construct() {
        $this->ticketService = new TicketService();
        $this->tripService = new TripService();
        $this->home = new Home();
    }

    public function book() : void {
        $data = Request::getFields();

        $ticket['user_id'] = $_SESSION['userObj']->id;
        $ticket['trip_id'] = $data['trip_id'];
        $ticket['status'] = 'pending';
        $ticket['seat'] = $data['row'].$data['level'].$data['seat'];

        $this->ticketService->add($ticket);
        $this->tripService->decreaseRemainingSlots($data['trip_id'], 1);

        $this->home->index();
    }

    public function cancel() : void {
        $ticketID = Request::getFields()['ticket_id'];

        $this->ticketService->cancel($ticketID);
    }
}