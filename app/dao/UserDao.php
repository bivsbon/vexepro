<?php
class UserDao {
    public function get($username) {
        $conn = Connection::getInstance()->getConnection();
        $username_search = "'$username'";

        $builder = new MySqlBuilder($conn);
        $user = $builder
            ->select('*')
            ->from('users')
            ->where('username', 'like', $username_search)
            ->first();
        return $user;
    }

    public function add(array $user) : bool {
//        $conn = Connection::getInstance()->getConnection();
//
//        $sql = "INSERT INTO users(username, hashpwd, name, age, tel, email, address, role) values (?, ?, ?, ?, ?, ?, ?, 'customer')";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute($user);

        $user = Database::get('users', 'username', 'like', 'bivsbon');
        return Database::add('users', $user);
    }
}