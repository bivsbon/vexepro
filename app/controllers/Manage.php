<?php

class Manage extends Controller {
    public function customer() : void {
        $this->render('UserMana');
    }

    public function agency() : void {
        $this->render('AgencyMana');
    }

    public function vehicle() : void {
        
        $this->render('VehicleMana');
    }

    public function ticket() : void {
        $this->render('TicketMana');
    }

    public function trip() : void {
        $this->render('TripMana');
    }
}