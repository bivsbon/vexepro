<?php
require_once _DIR_ROOT.'/app/services/AgencyService.php';

class Agency extends Controller {
    public function add() : void {
        $fields = Request::getFields();

        AgencyService::add($fields);
        $this->manage();
    }

    public function manage() : void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['agencies'] = AgencyService::get("id", "=", $fields['id']);
        else{$data['agencies'] = AgencyService::getAll();}
        $this->render('AgencyMana', $data);
    }

    public function delete() : void {
        $req = Request::getFields();

        AgencyService::delete($req['id']);
        $this->manage();
    }

    public function update() : void {
        $req = Request::getFields();

        AgencyService::update('name', $req['name'], $req['id']);
        $this->manage();
    }
}