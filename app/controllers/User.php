<?php
require_once _DIR_ROOT.'/app/dao/UserDao.php';

class User extends Controller {
    public function login() {
        $req = new Request();
        $data = $req->getFields();

        $userDao = new Userdao();
        $user = $userDao->getUser($data['username']);
        echo $user['name'];
    }
}