<?php

class TingkatPenyelenggara extends Controller
{
    public function create(){
        $this->view("Admin/TingkatPenyelenggara/create");
    }
    public function edit(){
        $this->view("Admin/TingkatPenyelenggara/edit");
    }
}