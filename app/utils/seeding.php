<?php
require_once '../../configs/database.php';
require_once '../../core/Database.php';
require_once '../../core/Connection.php';
require_once '../../core/SqlClauses.php';
require_once '../../core/BaseSqlBuilder.php';
require_once '../../core/MySqlBuilder.php';

$n = 20;
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
    $data['start_time'] = rand(0, 23).':'.(rand(0, 1) * 30).':00';
    $data['est_time'] = rand(1, 5).':'.(rand(0, 1) * 30).':00';
    $data['price'] = rand(20, 50) * 10000;
    Database::add('trips', $data);
}