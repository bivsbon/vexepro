<?php
interface BaseDao {
    public function add($obj);
    public function get($id);
    public function getAll();
    public function update();
    public function delete($id);
}