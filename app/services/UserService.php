<?php
require_once _DIR_ROOT.'/app/dao/UserDao.php';

class UserService {
    public function addUser(array $data): bool {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $userDao = new UserDao();
        return $userDao->add($data);
    }
}