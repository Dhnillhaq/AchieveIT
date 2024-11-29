<?php

class Kategori extends Controller
{
    public function create(){
        $this->view("Admin/Kategori/create");
    }

    public function edit(){
        $this->view("Admin/Kategori/edit");
    }

}