<?php
class Connection {
    private static ?PDO $conn = null;
    private static ?Connection $instance = null;

    private function __construct(){
        global $config;
        $db_config = array_filter($config['database']);
        //Kết nối database
        //Cấu hình dsn
        $dsn = 'mysql:dbname='.$db_config['db'].';host='.$db_config['host'];

        //Cấu hình $options
        /*
         * - Cấu hình utf8
         * - Cấu hình ngoại lệ khi truy vấn bị lỗi
         * */
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        //Câu lệnh kết nối
        self::$conn = new PDO($dsn, $db_config['user'], $db_config['password'], $options);
    }

    public static function getInstance(): ?Connection {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return self::$conn;
    }
}