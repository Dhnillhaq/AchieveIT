<?php
class Umum extends Controller {
    public function index(){
        
        $this->view('templates/header');
        $this->view('Umum/index');
        $this->view('templates/footer');
        
        
    }
}

?>