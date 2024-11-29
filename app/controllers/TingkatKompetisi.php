<?php

class TingkatKompetisi extends Controller
{
    public function create(){
        $this->view("Admin/TingkatKompetisi/create");
    }
    public function edit(){
        $this->view("Admin/TingkatKompetisi/edit");
    }
}