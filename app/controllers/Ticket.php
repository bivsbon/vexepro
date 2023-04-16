<?php
require_once _DIR_ROOT.'/app/controllers/Home.php';
require_once _DIR_ROOT.'/app/services/TripService.php';
require_once _DIR_ROOT.'/app/services/TicketService.php';

class Ticket extends Controller {

    public function book() : void {
        $home = new Home();
        $data = Request::getFields();

        $ticket['user_id'] = $_SESSION['userObj']->id;
        $ticket['trip_id'] = $data['trip_id'];
        $ticket['status'] = 'pending';
        $ticket['seat'] = $data['row'].$data['level'].$data['seat'];

        TicketService::add($ticket);
        TripService::decreaseRemainingSlots($data['trip_id'], 1);

        $home->index();
    }

    public function cancel() : void {
        $ticketID = Request::getFields()['ticket_id'];

        TicketService::cancel($ticketID);
    }
}