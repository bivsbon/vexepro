<?php

class Vehicle extends Controller {

    public function add() : void {
        $data = Request::getFields();

        VehicleService::add($data);
    }

    public function genPlateNumbers($n) : void {
        foreach (VehicleService::genPlateNumber($n) as $number) {
            echo $number.'<br>';
        };
    }
}