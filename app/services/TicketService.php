<?php
require_once _DIR_ROOT.'/app/dao/TicketDao.php';

class TicketService {
    private TicketDao $ticketDao;

    public function __construct() {
        $this->ticketDao = new TicketDao();
    }
    public function add(array $data) : bool {
        return Database::add('tickets', $data);
    }

    public function get(string $col, string $comparison, mixed $value) : array {
        return Database::get('tickets', $col, $comparison, $value);
    }

    public function getAll() : array {
        return Database::getAll('tickets');
    }

    public function update(string $col, string $value, int $id) : bool {
        return Database::update('tickets', $col, $value, $id);
    }

    public function cancel(int $id) : bool {
        return Database::update('tickets', 'status', 'canceled', $id);
    }

    public function getByUserId(int $uid) : array {
        return $this->ticketDao->getByUserID($uid);
    }
}