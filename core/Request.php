<?php
class Request {
    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost() {
        return $this->getMethod() == 'post';
    }

    public function isGet() {
        return $this->getMethod() == 'get';
    }

    public function getFields() {
        $data = [];
        if ($this->isGet()) {
            $data = $this->getFields2($_GET);
        }
        if ($this->isPost()) {
            $data = $this->getFields2($_POST);
        }
        return $data;
    }

    private function getFields2($method) {
        $dataFields = [];

        if (!empty($method)) {
            foreach ($method as $key=>$value) {
                $dataFields[$key] = $value;
            }
        }
        return $dataFields;
    }
}