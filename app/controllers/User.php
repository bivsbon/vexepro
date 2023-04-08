<?php
require_once _DIR_ROOT.'/app/dao/UserDao.php';

class User extends Controller {
    public function login() {
        $req = new Request();
        $data = $req->getFields();

        $userDao = new Userdao();
        $userDao->getUser($data['username']);
    }
}