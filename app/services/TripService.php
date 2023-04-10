<?php
class TripService {
    public function add(array $data) : bool {
        return Database::add('trips', $data);
    }

    public function get(string $col, string $comparison, string $value) : array {
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
}