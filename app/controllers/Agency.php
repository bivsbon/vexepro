<?php
require_once _DIR_ROOT.'/app/services/AgencyService.php';

class Agency extends Controller {
    public function add() : void {
        $fields = Request::getFields();

        foreach ($fields as $key=>$value) {
            echo $key.' '.$value."<br>";
        }

        AgencyService::add($fields);
        $this->render('AgencyMana');
    }
}