<?php
class VehicleService {
    public function add(array $data) : bool {
        return Database::add('vehicles', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('vehicles', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('vehicles');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('vehicles', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('vehicles', $id);
    }

    public function genPlateNumber($n) : array {
        $plate_numbers = [];
        for ($i = 0; $i < $n; $i++) {
            $prefix = rand(29, 33) . chr(rand(65, 70));
            $plate_numbers[$i] = $prefix . '-' . rand(100, 999) . '.' . rand(10, 99);
        }

        return $plate_numbers;
    }
}