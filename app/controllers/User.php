<?php
require_once _DIR_ROOT.'/app/services/UserService.php';

class User extends Controller {
    public function login() {
        $data = Request::getFields();
        $userDao = new UserDao();
        $user = $userDao->getUser($data['username']);

        if (password_verify($data['password'], $user->hashpwd)) {
            $_SESSION['name'] = $user->name;
            $this->render('home');
        } else $this->render('login-fail');
    }

    public function signup() {
        $data = Request::getFields();
        $data['role'] = 'Customer';

        $userService = new UserService();
        $userService->addUser($data);

        $this->render('home');
    }

    public function logout() {
        unset($_SESSION['name']);
        $this->render('home');
    }
}