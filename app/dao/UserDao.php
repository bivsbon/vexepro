<?php
class UserDao {
    public function getUser($username) {
        $conn = Connection::getInstance()->getConnection();
        $username_search = "'$username'";

        $builder = new MySqlBuilder($conn);
        $users = $builder->select('*')->from('users')->where('username', 'like', $username_search)->all();
        foreach ($users as $user) {
            echo $user->address;
        }
    }
}