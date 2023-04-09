<?php

class Ticket {
    public function book($ticket) {

        $data = Request::getFields();

        $userService = new UserService();
        $userService->add($data);

        $this->render('home');
    }

    public function cancel() {
        $ticketID = Request::getFields()['ticket_id'];
    }
}