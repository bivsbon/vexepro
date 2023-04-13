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

    public function userLogin() : void {
        if ($this->login('customer')) {
            $this->home->index();
        }
        else $this->render('Login');
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

            $this->home->index();
        } else $this->render('signup'); // username exists
    }

    public function logout() : void {
        unset($_SESSION['userObj']);
        $this->home->index();
    }

    public function info() : void {
        $id = $_SESSION['userOBj']->id;
        $tickets = $this->ticketService->get('id', 'equal', $id);

        $this->render('userinfo');
    }

    /**
     * @return void
     */
    private function login(string $role): bool
    {
        $data = Request::getFields();
        $user = $this->userService->get('username', 'like', $data['username'])[0];

        if (password_verify($data['password'], $user->password) && $user->role == $role) {
            $_SESSION['userObj'] = $user;
            return true;
        } else return false;
    }
}