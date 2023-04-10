<?php
class TripService {
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

    public function seed() : void {
        $data = [];
        $route_id_from = 1;
        $route_id_to = 3;
        echo 'Seeding.. ';
        $count = 35;

        for ($i = $route_id_from; $i <= $route_id_to; $i++) {
            $data['route_id'] = $i;
            $vehicle_loops = rand(3, 5);
            for ($j = 0; $j < $vehicle_loops; $j++) {
                $data['vehicle_id'] = $count;
                $data['start_time'] = rand(0, 23).':'.(rand(0, 1) * 30).':00';
                $data['est_time'] = rand(1, 5).':'.(rand(0, 1) * 30).':00';
                $data['price'] = rand(20, 50) * 10000;
                Database::add('trips', $data);
                $count++;
            }
        }
        echo 'Done!';
    }

    public function search(array $filter) : array {
        // Set default values
        if (!array_key_exists('price_low', $filter)) $filter['price_low'] = 0;
        if (!array_key_exists('price_high', $filter)) $filter['price_high'] = 10000000;
        if (!array_key_exists('price_low', $filter)) $filter['price_low'] = 0;
        if (!array_key_exists('price_low', $filter)) $filter['price_low'] = 0;
        if (!array_key_exists('price_low', $filter)) $filter['price_low'] = 0;
    }
}