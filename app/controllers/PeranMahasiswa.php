<?php

class PeranMahasiswa extends Controller
{
    public function create()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/create");
    }
    public function edit()
    {
        $this->checkRole("Admin", "Super Admin");
        $this->view("Admin/PeranMahasiswa/edit");
    }
}