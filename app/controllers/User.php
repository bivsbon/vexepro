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

    public function userLogin() : void {
        $this->login('customer');
    }

    public function adminLogin() : void {
        $this->login('admin');
    }

    public function signup() : void {
        $data = Request::getFields();
        $data['role'] = 'customer';
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
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
        $tickets = $this->ticketService->get('id', 'equal', $id);

        $this->render('userinfo');
    }

    /**
     * @return void
     */
    private function login(string $role): void
    {
        $data = Request::getFields();
        $user = $this->userService->get('username', 'like', $data['username'])[0];

        if (password_verify($data['password'], $user->password) && $user->role == $role) {
            $_SESSION['userObj'] = $user;
            $this->render('home');
        } else $this->render('login-fail');
    }
}