<?php
class VehicleTypeService {
    public function add(array $data) : bool {
        return Database::add('vehicle_types', $data);
    }

    public function get(string $col, string $comparison, string $value) : array {
        return Database::get('vehicle_types', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('vehicle_types');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('vehicle_types', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('vehicle_types', $id);
    }
}