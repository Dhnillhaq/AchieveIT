<?php 
class Admin extends Controller{
    public function index(){
        $this->view('Admin/index');
        $this->model('Prestasi')->getAllPrestasi();
    }
}
?>