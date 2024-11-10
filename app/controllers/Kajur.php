<?php
class Kajur extends Controller
{
    public function index($nama = "Dhanil")
    {
        $this->view('templates/header');
        $this->view('Kajur/index', $nama);
        $this->view('templates/footer');

    }
}
?>