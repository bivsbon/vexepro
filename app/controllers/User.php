<?php
require_once _DIR_ROOT.'/app/dao/UserDao.php';

class User extends Controller {
    public function login() {
        $req = new Request();
        $data = $req->getFields();
        $userDao = new UserDao();
        $user = $userDao->getUser($data['username']);

        if (password_verify($data['password'], $user->hashpwd)) {
            $_SESSION['login'] = true;
            $this->render('login-success');
        } else $this->render('login-fail');
    }

    public function signup() {
        $req = new Request();
        $data = $req->getFields();

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        echo $data['password'];
        $userDao = new UserDao();
        $userDao->addUser(array_values($data));
    }
}