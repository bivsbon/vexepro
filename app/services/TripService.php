<?php
require_once _DIR_ROOT.'/app/dao/TripDao.php';

class TripService {
    private TripDao $tripDao;

    public function __construct() {
        $this->tripDao = new TripDao();
    }

    public function add(array $data) : bool {
        return Database::add('trips', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('trips', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('trips');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('trips', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('trips', $id);
    }

    public function seed(int $n) : void {
    }

    public function search(array $filter) : array {
        return $this->tripDao->search($filter);
    }

    public function decreaseRemainingSlots(int $id, int $amount) : bool {
        $trip = Database::get('trips', 'id', '=', $id);

        if ($trip == null) return false;
        else $trip = $trip[0];

        if ($trip->remaining_slots >= $amount)
            Database::update('trips', 'remaining_slots', $trip->remaining_slots-$amount, $id);
        else
            return false;

        return true;
    }

    public function getUnavailableSeats(int $tripID) : array {
        $objArr = $this->tripDao->getUnavailableSeats($tripID);

        $seats = [];
        foreach ($objArr as $seat) {
            $seats[] = $seat->seat;
        }
        return $seats;
    }
 }