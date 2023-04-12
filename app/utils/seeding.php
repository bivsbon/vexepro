<?php
require_once '../../configs/database.php';
require_once '../../core/Database.php';
require_once '../../core/Connection.php';
require_once '../../core/SqlClauses.php';
require_once '../../core/BaseSqlBuilder.php';
require_once '../../core/MySqlBuilder.php';
require_once 'helper.php';

function trip_seed(int $n) : void
{
    $n = 30;
    $station_ids = [];
    $station_id_low = 1;
    $station_id_high = 6;
    $vehicle_id_low = 1;
    $vehicle_id_high = 17;
    $slots = [1, 30, 30, 22];

    for ($i = $station_id_low; $i <= $station_id_high; $i++) {
        $station_ids[] = $i;
    }

    for ($i = 0; $i < $n; $i++) {
        shuffle($station_ids);
        $station_id_start = $station_ids[0];
        $station_id_end = $station_ids[1];
        $vehicleID = rand($vehicle_id_low, $vehicle_id_high);

        $vehicle = Database::get('vehicles', 'id', '=', $vehicleID)[0];

        $data['remaining_slots'] = $slots[$vehicle->type_id];
        $data['station_id_start'] = $station_id_start;
        $data['station_id_end'] = $station_id_end;
        $data['vehicle_id'] = $vehicleID;
        $data['start_time'] = '2023:04:' . rand(15, 30) . ' ' . rand(0, 23) . ':' . (rand(0, 1) * 30) . ':00';
        $data['est_time'] = rand(1, 5) . ':' . (rand(0, 1) * 30) . ':00';
        $data['price'] = rand(20, 50) * 10000;
        Database::add('trips', $data);
    }
}

function user_seed(array $names, array $addresses) : void {
    foreach ($names as $name) {
        $data = [];
        $data['username'] = $name;
        $data['password'] = password_hash('123', PASSWORD_BCRYPT);
        $data['name'] = ucfirst($name);
        $data['age'] = rand(20, 35);
        $data['tel'] = '09';
        for ($i = 0; $i < 8; $i++) {
            $data['tel'] .= rand(0, 9);
        }
        $data['email'] = $name . '@email.com';
        shuffle($addresses);
        $data['address'] = $addresses[0];
        $data['role'] = 'customer';

        Database::add('users', $data);
    }
}

function ticket_seed($nTrips) : void {
    $conn = Connection::getInstance()->getConnection();
    $trips = Database::getAll('trips');
    shuffle($trips);
    $userArr = genArr(10);

    for ($i = 0; $i < $nTrips; $i++) {
        $nTickets = rand(2, 5);
        shuffle($userArr);

        $sql = 'SELECT vt.`row` as `row`, vt.`level` as `level`, vt.`line` as line FROM trips t'
            .' JOIN vehicles v ON t.vehicle_id = v.id'
            .' JOIN vehicle_types vt ON v.type_id = vt.id'
            .' WHERE t.id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->execute([$trips[$i]->id]);

        $vData = $stmt->fetchAll()[0];
        $nSeats = $vData['row'] * $vData['level'] * $vData['line'];
        $seatsInt = genArr($nSeats);
        shuffle($seatsInt);

        for ($j = 0; $j < $nTickets; $j++) {
            $data = [];
            $data['user_id'] = $userArr[rand(0, 9)];
            $data['trip_id'] = $trips[$i]->id;
            $data['status'] = 'active';
            $data['seat'] = intToSeat($seatsInt[$j], $vData['row'], $vData['level'], $vData['line']);
            Database::add('tickets', $data);
        }
    }
}

function genArr(int $n) : array {
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[] = $i+1;
    }
    return $arr;
}

$names = ['loc', 'duc', 'anh', 'an', 'long', 'hung', 'phuong', 'nhi', 'huyen', 'trang'];
$addresses = ['Quảng Bình', 'Hà Tĩnh', 'Thanh Hóa', 'Nam Đinh', 'Đà Nẵng', 'Hà Nội', 'Huế', 'Nha Trang', 'Hải Phòng'];

echo 'Seeding...    ';
ticket_seed(10);
echo 'Done!';