<?php

class Juara extends Controller
{

    public function index(){
        $this->view("Admin/Juara/create");
    }
    
    public function profilAdmin(){
        $this->view("Admin/Juara/edit");
    }

}