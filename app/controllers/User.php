<?php
require_once _DIR_ROOT.'/app/controllers/Home.php';

class User extends Controller {
    private Home $home;
    public function __construct() {
        $this->home = new Home();
    }

    public function login() : void {
        $data = Request::getFields();
        $user = UserService::get('username', 'like', $data['username'])[0];

        if (password_verify($data['password'], $user->password)) {
            unset($_SESSION['userObj']);
            unset($_SESSION['adminObj']);
            if ($user->role == 'customer') {
                $_SESSION['userObj'] = $user;
                $this->home->index();
            }
            if ($user->role == 'admin') {
                $_SESSION['adminObj'] = $user;
                $this->render('UserMana');
            }

        } else $this->render('Login');
    }

    public function signup() : void {
        $data = Request::getFields();
        $data['role'] = 'customer';
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $user = UserService::get('username', 'like', $data['username']);
        if (!$user) {
            $userService = new UserService();
            $userService->add($data);

            $this->home->index();
        } else $this->render('signup'); // username exists
    }

    public function logout() : void {
        unset($_SESSION['userObj']);
        unset($_SESSION['adminObj']);
        $this->home->index();
    }

    public function info() : void {
        $id = $_SESSION['userOBj']->id;
        $this->render('userinfo');
    }
}