<?php
class TripDao {
    public static function search(array $filter) : array {
        $conn = Connection::get();

        $sql = 'SELECT t.id id, start_time, HOUR(est_time) est_hour, MINUTE(est_time) est_minute,'
            .' time(start_time) start_time_specific, est_time, remaining_slots, price, plate_num, a.name agency_name,'
            .'vt.`type` vehicle_type, `row`, `level`, `line`, s1.`name` start_station, s1.province start_province,'
            .' s2.`name` end_station, s2.province end_province FROM trips t'
            .' JOIN vehicles v ON t.vehicle_id = v.id'
            .' JOIN agencies a ON v.agency_id = a.id'
            .' JOIN vehicle_types vt ON v.type_id = vt.id'
            .' JOIN stations s1 ON t.station_id_start = s1.id'
            .' JOIN stations s2 ON t.station_id_end = s2.id '
            .' WHERE s1.province = :beginning AND s2.province = :destination'
            .' AND price >= :price_low AND price <= :price_high AND DATE(start_time) = :start_date';
        $stmt = $conn->prepare($sql);
        $stmt->execute($filter);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getUnavailableSeats($tripID) : array {
        $conn = Connection::get();

        $sql = "SELECT seat FROM tickets ti"
            ." JOIN trips t ON ti.trip_id=t.id"
            ." WHERE t.id = ? AND status = 'active'";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$tripID]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAllWithDetail() : array {
        $conn = Connection::get();

        $sql = 'SELECT t.id id, start_time, '
            .' est_time, remaining_slots, price, plate_num, a.name agency_name,'
            .' vt.`type` vehicle_type, `row`, `level`, `line`, s1.`name` start_station, s1.province start_province,'
            .' s2.`name` end_station, s2.province end_province FROM trips t'
            .' JOIN vehicles v ON t.vehicle_id = v.id'
            .' JOIN agencies a ON v.agency_id = a.id'
            .' JOIN vehicle_types vt ON v.type_id = vt.id'
            .' JOIN stations s1 ON t.station_id_start = s1.id'
            .' JOIN stations s2 ON t.station_id_end = s2.id';
        $stmt = $conn->prepare($sql);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}