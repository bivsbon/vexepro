<?php
require_once _DIR_ROOT.'/app/services/ComplainService.php';

class Complain extends Controller {
    
    public function index(): void {
        $this->render('Contact', ["message" => ""]);
    }

    public function update() : void {
        $data = Request::getFields();
        ComplainService::update("status", $data['status'], $data['id']);
    }

    public function manage(): void {
        $fields = Request::getFields();
        if(array_key_exists('id', $fields) && $fields['id'] != '') $data['complains'] = ComplainService::get("id", "=", $fields['id']);
        else{$data['complains'] = ComplainService::getAll();}
        $this->render('ComplainMana', $data);
    }
    public function add_c() : void {
        $data = Request::getFields();
        try {
            ComplainService::add($data);
            $this->render('Contact', ["message" => "Tạo thành công"]);
            $this->error = [];
        }catch(\Throwable $th){
            $this->error['complainAdd'] = $th;
            $this->render('Contact', ["message" => "Thất bại"]);
        }
      
    }

}