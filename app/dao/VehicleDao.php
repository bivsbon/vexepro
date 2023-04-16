<?php
class VehicleDao
{
    public static function getAllWithDetails(): array {
        $conn = Connection::get();

        $sql = 'SELECT v.id AS id, plate_num, a.name agency_name, `type`, `row`, `level`, `line` FROM vehicles v '
            . ' JOIN agencies a ON v.agency_id = a.id'
            . ' JOIN vehicle_types vt ON v.type_id = vt.id'
            . ' ORDER BY v.id';

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getShape(int $id) : object {
        $conn = Connection::get();

        $sql = 'SELECT `row`, `level`, `line` FROM vehicles v '
            . ' JOIN vehicle_types vt ON v.type_id = vt.id WHERE v.id=?';

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}