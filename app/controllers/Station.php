<?php
require_once _DIR_ROOT.'/app/services/StationService.php';

class Station extends Controller {
    public function add() : void {
        $fields = Request::getFields();

        StationService::add($fields);
        $this->manage();
    }

    public function manage() : void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['stations'] = StationService::get("id", "=", $fields['id']);
        else{$data['stations'] = StationService::getAll();}
        $this->render('StationMana', $data);
    }

    public function delete() : void {
        $req = Request::getFields();

        StationService::delete($req['id']);
        $this->manage();
    }

}