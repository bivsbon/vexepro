<?php
class UserDao {
    public function getUser($username) {
        $conn = Connection::getInstance()->getConnection();
        $username_search = "'$username'";

        $builder = new MySqlBuilder($conn);
        $user = $builder->select('*')->from('users')->where('username', 'like', $username_search)->first();
        return $user;
    }

    public function addUser($data) {
        $conn = Connection::getInstance()->getConnection();

        $sql = "INSERT INTO users values(username, hashpwd, name, age, tel, email, address, role) values (?, ?, ?, ?, ?, ?, ?, 'customer')";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }
}