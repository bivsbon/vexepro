<?php
class TicketService {
    public function add(array $data) : bool {
        return Database::add('tickets', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('tickets', $col, $comparison, $value);
    }

    public function getByUserID() : array {
        return Database::getAll('tickets');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('tickets', $col, $value, $id);
    }

    public function cancel(int $id) : bool {
        return Database::update('tickets', 'status', 'canceled', $id);
    }
}