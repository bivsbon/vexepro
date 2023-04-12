<?php
class StationService {
    public function add(array $data) : bool {
        return Database::add('stations', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('stations', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('stations');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('stations', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('stations', $id);
    }

    public function getProvinces() : array {
        $objArr = Database::getDistinct('stations', 'province');

        $provinces = [];
        foreach ($objArr as $province) {
            $provinces[] = $province->province;
        }
        return $provinces;
    }
}