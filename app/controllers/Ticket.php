<?php
require_once _DIR_ROOT.'/app/controllers/Home.php';

class Ticket extends Controller {
    private Home $home;

    public function book() : void {
        $data = Request::getFields();

        $ticket['user_id'] = $_SESSION['userObj']->id;
        $ticket['trip_id'] = $data['trip_id'];
        $ticket['status'] = 'pending';
        $ticket['seat'] = $data['row'].$data['level'].$data['seat'];

        TicketService::add($ticket);
        TripService::decreaseRemainingSlots($data['trip_id'], 1);

        $this->home->index();
    }

    public function cancel() : void {
        $ticketID = Request::getFields()['ticket_id'];

        TicketService::cancel($ticketID);
    }
}