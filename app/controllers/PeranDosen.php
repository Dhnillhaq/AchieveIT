<?php

class PeranDosen extends Controller
{
    public function create(){
        $this->view("Admin/PeranDosen/create");
    }
    public function edit(){
        $this->view("Admin/PeranDosen/edit");
    }
}