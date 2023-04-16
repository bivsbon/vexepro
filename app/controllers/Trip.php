<?php
require_once _DIR_ROOT.'/app/services/TripService.php';
require_once _DIR_ROOT.'/app/services/StationService.php';
require_once _DIR_ROOT.'/app/services/VehicleService.php';

class Trip extends Controller {

    public function search() : void {
        $filter = Request::getFields();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateNow = date('Y/m/d', time());

        // Default filter
        if (!array_key_exists('beginning', $filter)) $filter['beginning'] = 'Hà Nội';
        if (!array_key_exists('destination', $filter)) $filter['price_low'] = 'TP. Hồ Chí Minh';
        if (!array_key_exists('price_low', $filter) || $filter['price_low'] == '') $filter['price_low'] = 0;
        if (!array_key_exists('price_high', $filter) || $filter['price_high'] == '') $filter['price_high'] = 10000000;
        if (!array_key_exists('start_date', $filter) || $filter['start_date'] == '') $filter['start_date'] = $dateNow;

        $data['trips'] = TripService::search($filter);
        $data['provinces'] = StationService::getProvinces();

        $this->render('Search', $data);
    }

    public function seed(string $n) : void {
        echo 'Seeding...';
        TripService::seed(intval($n));
        echo '<br>Done!';
    }

    public function manage() : void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['trips'] = TripService::getAllWithDetailsById($fields['id']);
        else{$data['trips'] = TripService::getAllWithDetails();}
        $data['stations'] = StationService::getAll();
        $data['vehicles'] = VehicleService::getAllWithDetails();
        $this->render('TripMana', $data);
    }

    public function add() : void {
        $fields = Request::getFields();
        $fields['remaining_slots'] = VehicleService::getCapacity($fields['vehicle_id']);

        TripService::add($fields);
        $this->manage();
    }

    public function delete() : void {
        $req = Request::getFields();

        TripService::delete($req['id']);
        $this->manage();
    }

    public function update() : void {
        $req = Request::getFields();

        TripService::update('name', $req['name'], $req['id']);
        $this->manage();
    }
}