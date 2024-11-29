<?php

class Kajur extends Controller
{
    public function index(){
        $this->view("Admin/Kajur/index");
    }

    public function profilKajur(){
        $this->view("Admin/Kajur/profilKajur");
    }
}