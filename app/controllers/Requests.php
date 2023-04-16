<?php
require_once _DIR_ROOT.'/app/services/RequestService.php';
require_once _DIR_ROOT.'/app/controllers/Home.php';

class Requests extends Controller {
    
    public function manage(): void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['requests'] = RequestService::get("id", "=", $fields['id']);
        else{$data['requests'] = RequestService::getAll();}
        $this->render('RequestMana', $data);
    }

    public function update() : void {
        $data = Request::getFields();

        RequestService::update("status", $data['status'], $data['id']);
    }

    public function add_c() : void {
        $data = Request::getFields();

        RequestService::add($data);
        $home = new Home();
        $home -> me();
    }

}