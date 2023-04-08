<?php
class Connection {
    private static $instance = null, $conn = null;

    private function __construct(){
        global $config;
        $db_config = array_filter($config['database']);
        //Kết nối database
        try{

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

        }catch (Exception $exception){
            $mess = $exception->getMessage();
            App::$app->loadError('database', ['message'=>$mess]);
            die();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return self::$conn;
    }
}