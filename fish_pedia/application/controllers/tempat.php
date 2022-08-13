<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tempat extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('admin');
    }

    public function read_data_tempat(){
        $tempat = $this->admin->getData("tempat");
        $data = array(
			'tempat' => $tempat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_data/data_tempat',$data);
        $this->load->view('templates/footer');
    }
    public function read_input_tempat(){
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_input/input_tempat');
        $this->load->view('templates/footer');
	}

    public function input_tempat(){
        $dataInput1 = array (
            'kode_tempat' => $this->input->post('kode_tempat'),
            'harga' => $this->input->post('harga'),
            'nama_tempat' => $this->input->post('nama_tempat')
        );
        $this->admin->inputData('tempat', $dataInput1);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url()."tempat/read_data_tempat/", 'refresh');
}
    
    public function delete_tempat($penunjuk){
        $datatunjuk = array(
            'kode_tempat' => $penunjuk
        );
        $this->admin->delete('tempat', $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiHapus !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url()."tempat/read_data_tempat/", 'refresh');
    }
    
	public function update_tempat($penunjuk){
        $datatunjuk = array(
            'kode_tempat' => $penunjuk
        );
        $datatempat = $this->admin->getData_khusus("tempat", $datatunjuk); 
        $data1 = array(
            'datatempat' => $datatempat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_update/update_tempat',$data1);
        $this->load->view('templates/footer');
	}
    public function update_data_tempat(){
        $dataInput = array (
            'kode_tempat' => $this->input->post('kode_tempat'),
            'harga' => $this->input->post('harga'),
            'nama_tempat' => $this->input->post('nama_tempat')
        );
        $datatunjuk = array(
            'kode_tempat' => $this->input->post('kode_tempat')
        );
        $dataproduk = $this->admin->update('tempat', $dataInput, $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiUpdate !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url()."tempat/read_data_tempat/", 'refresh');
    }
}
?>