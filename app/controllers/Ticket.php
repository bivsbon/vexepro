<?php
require_once _DIR_ROOT.'/app/controllers/Home.php';
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/controllers/User.php';

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

        $home->me();
    }

    public function cancel() : void {
        $data = Request::getFields();
        $ticketID = Request::getFields()['ticket_id'];

        TicketService::cancel($ticketID);
        TripService::increaseRemainingSlots($data['trip_id'], 1);
        $home = new Home();
        $home->me();
    }

    public function manage() : void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['tickets'] = TicketService::get("id", "=", $fields['id']);
        else{$data['tickets'] = TicketService::getAll();}
        $this->render('TicketMana', $data);
    }

    public function update() : void {
        $req = Request::getFields();

        TicketService::update('status', $req['status'], $req['id']);
        $this->manage();
    }
}