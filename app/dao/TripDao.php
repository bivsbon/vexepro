<?php
class TripDao {
    public function search(array $filter) : array {
        $conn = Connection::getInstance()->getConnection();

        $sql = 'SELECT * FROM trips t'
            .' JOIN vehicles v ON t.vehicle_id = v.id'
            .' JOIN agencies a ON v.agency_id = a.id'
            .' JOIN vehicle_types vt ON v.type_id = vt.id'
            .' JOIN routes r ON t.route_id = r.id'
            .' JOIN stations s1 ON r.station_id_start = s1.id'
            .' JOIN stations s2 ON r.station_id_end = s2.id '
            .' WHERE s1.location = ? AND s2.location = ?'
            .' AND price >= ? AND price <= ? AND DATE(t.start_time) = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute($filter);

        return $stmt->fetchAll();

    }
}