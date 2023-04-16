<?php
require_once _DIR_ROOT.'/app/controllers/Home.php';
require_once _DIR_ROOT.'/app/services/UserService.php';

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
                $this->manage();
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
        $id = $_SESSION['userObj']->id;
        $tickets = TicketService::get('id', 'equal', $id);

        $this->render('userinfo');
    }

    public function manage() : void {
        $data['users'] = UserService::getAll();
        header("Cache-Control: no-cache, must-revalidate");
        $this->render('UserMana', $data);
    }

    public function add() : void {
        $fields = Request::getFields();

        UserService::add($fields);
        $this->manage();
    }

    public function deactivate() : void {
        $req = Request::getFields();

        UserService::deactivate($req['id']);
        $this->manage();
    }

    public function activate() : void {
        $req = Request::getFields();

        UserService::activate($req['id']);
        $this->manage();
    }

    public function update() : void {
        $req = Request::getFields();

        UserService::update('name', $req['name'], $req['id']);
        $this->manage();
    }
}