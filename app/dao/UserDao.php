<?php
class UserDao {
    public function getUser($username) {
        $conn = Connection::getInstance()->getConnection();

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function deleteUser()
}