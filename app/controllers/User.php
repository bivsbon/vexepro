<?php
require_once _DIR_ROOT.'/app/services/UserService.php';

class User extends Controller {
    private UserService $userService;
    public function __construct() {
        $this->userService = new UserService();
    }

    public function login() : void {
        $data = Request::getFields();
        $user = $this->userService->get('username', 'like', $data['username'])[0];

        if (password_verify($data['password'], $user->password)) {
            $_SESSION['userObj'] = $user;
            $this->render('home');
        } else $this->render('login-fail');
    }

    public function signup() : void {
        $data = Request::getFields();
        $user = $this->userService->get('username', 'like', $data['username']);

        if (!$user) {
            $userService = new UserService();
            $userService->add($data);

            $this->render('home');
        } else $this->render('signup'); // username exists
    }

    public function logout() : void {
        unset($_SESSION['name']);
        $this->render('home');
    }
}