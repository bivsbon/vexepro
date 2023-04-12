<?php
require_once _DIR_ROOT.'/app/services/TripService.php';

class Trip extends Controller {
    private TripService $tripService;

    public function __construct() {
        $this->tripService = new TripService();
    }

    public function search() : void {
        $data = Request::getFields();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateNow = date('Y/m/d', time());

        // Default filter
        if (!array_key_exists('beginning', $data)) $data['beginning'] = 'Hà Nội';
        if (!array_key_exists('destination', $data)) $data['price_low'] = 'TP. Hồ Chí Minh';
        if (!array_key_exists('price_low', $data)) $data['price_low'] = 0;
        if (!array_key_exists('price_high', $data)) $data['price_high'] = 10000000;
        if (!array_key_exists('start_date', $data)) $data['start_date'] = $dateNow;

        $trips = $this->tripService->search($data);

        $this->render('after_search', $trips);
    }

    public function seed(string $n) : void {
        echo 'Seeding...';
        $this->tripService->seed(intval($n));
        echo '<br>Done!';
    }

    public function test() : void {
        $this->tripService->decreaseRemainingSlots(98, 1);
    }
}