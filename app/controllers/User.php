<?php
require_once _DIR_ROOT.'/app/services/UserService.php';
require_once _DIR_ROOT.'/app/services/TicketService.php';

class User extends Controller {
    private UserService $userService;
    private TicketService $ticketService;
    public function __construct() {
        $this->userService = new UserService();
        $this->ticketService = new TicketService();
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

    public function info() : void {
        $id = $_SESSION['userOBj']->id;
        $tickets = $this->ticketService->get('id', 'equals', $id);

        $this->render('userinfo');
    }
}