<?php

class Kajur extends Controller
{
    public function index(){
        $this->view("Kajur/index");
    }

    public function profilKajur(){
        $this->view("Kajur/profilKajur");
    }
}