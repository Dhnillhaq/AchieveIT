<?php

class Prodi extends Controller
{
    public function create(){
        $this->view("Admin/Prodi/create");
    }
    public function edit(){
        $this->view("Admin/Prodi/edit");
    }
}