<?php
class RouteDao {
    public function add($route) {
        $conn = Connection::getInstance()->getConnection();

        $sql = "INSERT INTO routes(start, end, start_time, est_time) values (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($route);
    }

    public function delete($routeID) {
        $conn = Connection::getInstance()->getConnection();

        $sql = "DELETE FROM routes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$routeID]);
    }

    public function getRouteEndPoints() {
        $conn = Connection::getInstance()->getConnection();
        $builder = new MySqlBuilder($conn);

        $route_endpoints = $builder
            ->select('start', 'end')
            ->from('routes')
            ->all();

        foreach ($route_endpoints as $endpoint) {
            echo $endpoint['start'].' '.$endpoint['end'].' ';
        }
        return $route_endpoints;
    }

    public function getAll() {
        $conn = Connection::getInstance()->getConnection();

        $builder = new MySqlBuilder($conn);
        $routes = $builder
            ->select()
            ->from('routes')
            ->all();

        return $routes;
    }
}