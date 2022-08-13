<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyewa extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('admin');
    }
    public function read_data_penyewa(){
        $penyewa = $this->admin->getData("penyewa");
        $data = array(
			'penyewa' => $penyewa
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_data/data_penyewa',$data);
        $this->load->view('templates/footer');
    }
    public function read_input_penyewa(){
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_input/input_penyewa');
        $this->load->view('templates/footer');
	}
    
    
    public function input_penyewa(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Gagal Ditambahkan !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('penyewa/read_data_penyewa'), 'refresh');
        }else{
        $dataInput = array (
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'agama' => $this->input->post('agama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
            );
            $this->admin->inputData('penyewa', $dataInput);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('penyewa/read_data_penyewa'), 'refresh');
        }
    }

    public function update_penyewa($penunjuk){
        $datatunjuk = array(
            'kode_pelanggan' => $penunjuk
        );
        $datapenyewa = $this->admin->getData_khusus("penyewa", $datatunjuk); 
        $data1 = array(
            'datapenyewa' => $datapenyewa
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_update/update_penyewa',$data1);
        $this->load->view('templates/footer');
    }

	public function update_data_penyewa(){
        $dataInput = array (
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'nik' => $this->input->post('nik')
        );
        $datatunjuk = array(
            'kode_pelanggan' => $this->input->post('kode_pelanggan')
        );
        $dataproduk = $this->admin->update('penyewa', $dataInput, $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil DiUpdate !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url()."penyewa/read_data_penyewa/", 'refresh');
    }
    
    public function delete_penyewa($penunjuk){
        $datatunjuk = array(
            'kode_pelanggan' => $penunjuk
        );
        $this->admin->delete('penyewa', $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiHapus !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url()."penyewa/read_data_penyewa/", 'refresh');
    }

    public function _rules(){
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('agama','agama','required');
        $this->form_validation->set_rules('no_hp','no_hp','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('nik','nik','required');
    }
}
?>