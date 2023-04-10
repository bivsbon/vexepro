<?php
class VehicleService {
    public function add(array $data) : bool {
        return Database::add('vehicles', $data);
    }

    public function get(string $col, string $comparison, string $value) : array {
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
}