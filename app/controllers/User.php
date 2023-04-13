<?php
require_once _DIR_ROOT.'/app/services/UserService.php';
require_once _DIR_ROOT.'/app/services/TicketService.php';
require_once _DIR_ROOT.'/app/controllers/Home.php';

class User extends Controller {
    private UserService $userService;
    private TicketService $ticketService;
    private Home $home;
    public function __construct() {
        $this->userService = new UserService();
        $this->ticketService = new TicketService();
        $this->home = new Home();
    }

    public function login($i, $j) : void {
        $data = Request::getFields();
        $user = $this->userService->get('username', 'like', $data['username'])[0];

        if (password_verify($data['password'], $user->password)) {
            unset($_SESSION['userObj']);
            unset($_SESSION['adminObj']);
            if ($user->role == 'customer') {
                $_SESSION['userObj'] = $user;
                $this->render('Home');
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
        $user = $this->userService->get('username', 'like', $data['username']);
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
        $tickets = $this->ticketService->get('id', 'equal', $id);

        $this->render('userinfo');
    }
}