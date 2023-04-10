<?php
class AgencyService {
    public function add(array $data) : bool {
        return Database::add('agencies', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('agencies', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('agencies');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('agencies', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('agencies', $id);
    }
}