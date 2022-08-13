<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class utama extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('admin');
    }
    
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
    
    public function detail(){
        $data;
        $this->admin->detail_data('');
    }

}
