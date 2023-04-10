<?php
class Database {
    public static function add(string $table, array $data) : bool {
        $conn = Connection::getInstance()->getConnection();
        $columns = implode(', ', array_keys($data));
        $values = array_values($data);

        $s = sizeof($data);
        $blanks = implode(', ', array_fill(0, $s, '?'));

        $sql = "INSERT INTO ".$table."(".$columns.") values (".$blanks.")";

        $stmt = $conn->prepare($sql);

        return $stmt->execute($values);
    }

    public static function get(string $table, string $col, string $comparison, mixed $value) : array {
        $conn = Connection::getInstance()->getConnection();

        $builder = new MySqlBuilder($conn);

        $obj = $builder
            ->select('*')
            ->from($table)
            ->where($col, $comparison, $value)
            ->all();

        return $obj;
    }

    public static function getAll(string $table) : array {
        $conn = Connection::getInstance()->getConnection();

        $builder = new MySqlBuilder($conn);
        $data = $builder
            ->select()
            ->from('agencies')
            ->all();

        return $data;
    }

    public static function delete(string $table, int $id) : bool {
        $conn = Connection::getInstance()->getConnection();

        $sql = "DELETE FROM ".$table." WHERE id = ?";
        $stmt = $conn->prepare($sql);

        return $stmt->execute([$id]);
    }

    public static function update(string $table, string $col, string $value, int $id) : bool {
        $conn = Connection::getInstance()->getConnection();

        $sql = "UPDATE ".$table." SET ".$col." = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        return $stmt->execute([$value, $id]);
    }
}