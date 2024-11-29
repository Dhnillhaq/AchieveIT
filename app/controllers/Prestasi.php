<?php

class Prestasi extends Controller
{
    public function index(){
        $this->view("Prestasi/index");
    }
    public function create(){
        $this->view("Prestasi/create");
    }
    public function edit(){
        $this->view("Prestasi/edit");
    }
    public function show(){
        $this->view("Prestasi/show");
    }
}