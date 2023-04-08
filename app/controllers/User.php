<?php
class User extends Controller {
    public function login() {
        echo 'Logging in... ';
        $request = new Request();
        $data = $request->getFields();
        echo 'Username is: '.$data['username'];
    }
}