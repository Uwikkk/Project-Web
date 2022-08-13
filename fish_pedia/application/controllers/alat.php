<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alat extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('admin');
    }
    public function read_data_alat(){
        $alat = $this->admin->getData("alat");
        $data = array(
			'alat' => $alat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_data/data_alat',$data);
        $this->load->view('templates/footer');
    }
    public function read_input_alat(){
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_input/input_alat');
        $this->load->view('templates/footer');
	}

	public function input_alat(){
            $kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
            $merk = $this->input->post('merk');
            $status = $this->input->post('status');
            $harga = $this->input->post('harga');

            $data = array(
                'kode' => $kode,
                'nama_alat' => $nama,
                'merk' => $merk,
                'status' => $status,
                'harga_alat' => $harga
            );
            $this->admin->inputData('alat', $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('alat/read_data_alat'), 'refresh');
    }

    public function update_alat($penunjuk){
        $datatunjuk = array(
            'kode' => $penunjuk
        );
        $dataalat = $this->admin->getData_khusus("alat", $datatunjuk); 
        $data1 = array(
            'data_alat' => $dataalat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_update/update_alat',$data1);
        $this->load->view('templates/footer');
    }

	public function update_data_alat(){
        $dataInput = array (
                'nama_alat' => $this->input->post('nama'),
                'merk' => $this->input->post('merk'),
                'status' => $this->input->post('status'),
                'harga_alat' => $this->input->post('harga'),
            );
            $datatunjuk = array(
                'kode' => $this->input->post('kode')
            );
            $dataproduk = $this->admin->update('alat', $dataInput, $datatunjuk);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiUpdate !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url()."alat/read_data_alat/", 'refresh');
}
    
    public function delete_alat($penunjuk){
        $datatunjuk = array(
            'kode' => $penunjuk
        );
        $this->admin->delete('alat', $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiHapus !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url()."alat/read_data_alat/", 'refresh');
    }

}
?>