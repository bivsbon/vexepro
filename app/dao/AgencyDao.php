<?php
class AgencyDao{
    public function add($agency) {
//        $conn = Connection::getInstance()->getConnection();
//
//        $sql = "INSERT INTO agencies(name) values (?)";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute($agency);
    }

    public function getAll() {
        $conn = Connection::getInstance()->getConnection();

        $builder = new MySqlBuilder($conn);
        $agencies = $builder
            ->select()
            ->from('agencies')
            ->all();

        return $agencies;
    }
}