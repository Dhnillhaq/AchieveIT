<?php 

class Dosen extends Controller {
    public function index(){
        $this->view("Admin/Dosen/index");
    }

    public function create(){
        $this->view("Admin/Dosen/create");
    }

    public function edit(){
        $this->view("Admin/Dosen/edit");
    }
}