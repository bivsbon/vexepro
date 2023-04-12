<?php
class UserService {
    public function add(array $data) : bool {
        return Database::add('users', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('users', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('users');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('users', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('users', $id);
    }
}