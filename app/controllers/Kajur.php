<?php 
class Kajur extends Controller{
    public function index($nama="Dhanil"){
        $this->view('Kajur/index', $nama);
    }
}
?>