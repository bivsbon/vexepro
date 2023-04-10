<?php
require_once _DIR_ROOT.'/app/dao/RouteDao.php';

class RouteService {
    public function add(array $data) : bool {
        return Database::add('routes', $data);
    }

    public function get(string $col, string $comparison, string $value) : array {
        return Database::get('routes', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('routes');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('routes', $col, $value, $id);
    }

    public function delete(int $id) : bool {
        return Database::delete('routes', $id);
    }
}