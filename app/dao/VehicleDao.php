<?php
class VehicleDao
{
    public static function getAllWithDetails(): array {
        $conn = Connection::get();

        $sql = 'SELECT v.id AS id, plate_num, a.name agency_name, type, row, level, line FROM vehicles v '
            . ' JOIN agencies a ON v.agency_id = a.id'
            . ' JOIN vehicle_types vt ON v.type_id = vt.id';

        $stmt = $conn->prepare($sql);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}