<?php

class PeranMahasiswa extends Controller
{
    public function create(){
        $this->view("Admin/PeranMahasiswa/create");
    }
    public function edit(){
        $this->view("Admin/PeranMahasiswa/edit");
    }   
}