<?php
class transaksi extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('admin');
    }
    public function read_data_transaksi(){
        $data1['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, alat al, penyewa pn, tempat tp WHERE tr.kode_alat=al.kode AND tr.kode_pelanggan=pn.kode_pelanggan AND tr.kode_tempat=tp.kode_tempat")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_data/data_transaksi',$data1);
        $this->load->view('templates/footer');
    }
    public function read_input_transaksi(){
        $alat = $this->admin->getData("alat");
        $transaksi = $this->admin->getData("transaksi");
        $penyewa = $this->admin->getData("penyewa");
        $tempat = $this->admin->getData("tempat");
        $data = array(
            'alat' => $alat,
            'transaksi' => $transaksi,
            'penyewa' => $penyewa,
            'tempat' => $tempat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_input/input_transaksi',$data);
        $this->load->view('templates/footer');
    }
    public function aksi_tambah_transaksi(){
        $data = array(
            'kode_alat' => $this->input->post('kode_alat'),
            'kode_pelanggan' => $this->input->post('kode_pelanggan'),
            'kode_tempat' => $this->input->post('kode_tempat'),
            'jam_pinjam' => $this->input->post('jam_pinjam'),
            'jam_kembali' => $this->input->post('jam_kembali'),
            'jam_pengembalian' => '0',
            'jam_sewa' => $this->input->post('jam_sewa'),
            'jam_sampai' => $this->input->post('jam_kembali_tempat'),
            'jam_cek' => '0',
            'status_pengembalian' => "Belum Kembali"
        );
        $this->admin->inputData('transaksi', $data);
        $status = array(
            'status' => '0'
        );
        $kode_alat = array(
            'kode' => $this->input->post('kode_alat')
        );
        $this->admin->update('alat',$status,$kode_alat);

        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('transaksi/read_data_transaksi'), 'refresh');
    }

    public function update_transaksi($penunjuk){
        $data1['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, alat al, penyewa pn, tempat tp WHERE tr.kode_alat=al.kode AND tr.kode_pelanggan=pn.kode_pelanggan AND tr.kode_tempat=tp.kode_tempat")->result();
        $datatunjuk = array(
            'kode_pemancingan' => $penunjuk
        );
        $dataalat = $this->admin->getData_khusus("transaksi", $datatunjuk); 
        $data = array(
            'transaksi' => $dataalat
        );
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('form_update/update_transaksi',$data);
        $this->load->view('templates/footer');
    }

	public function update_data_transaksi(){
        $dataInput = array (
            'jam_pengembalian' => $this->input->post('jam_pengembalian'),
            'jam_cek' => $this->input->post('jam_cek')
            );
            $datatunjuk = array(
                'kode_pemancingan' => $this->input->post('kode_pemancingan')
            );
            $dataproduk = $this->admin->update('transaksi', $dataInput, $datatunjuk);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiUpdate !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url()."transaksi/read_data_transaksi/", 'refresh');
}
    
    public function delete_transaksi($penunjuk){
        $datatunjuk = array(
            'kode_pemancingan' => $penunjuk
        );
        $this->admin->delete('transaksi', $datatunjuk);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiHapus !!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url()."transaksi/read_data_transaksi/", 'refresh');
    }
    public function detail($id){
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, alat al, penyewa pn, tempat tp WHERE tr.kode_alat=al.kode AND tr.kode_pelanggan=pn.kode_pelanggan AND tr.kode_tempat=tp.kode_tempat AND tr.kode_pemancingan=$id")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/body');
        $this->load->view('transaksi_view',$data);
        $this->load->view('templates/footer');
    }

    public function bayar(){
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'no_tempat' => $this->input->post('no_tempat'),
            'nama_alat_pinjam' => $this->input->post('nama_alat'),
            'total_bayar' => $this->input->post('total_bayar')
            
        );
        $this->admin->inputData('pembayaran', $data);
        $status_1 = array(
            'status_pengembalian' => 'Selesai',
        );
        $kode_pancing = array(
            'kode_pemancingan' => $this->input->post('kode_pemancingan')
        );
        $this->admin->update('transaksi',$status_1,$kode_pancing);     
        $status = array(
            'status' => '1',
        );
        $kode_alat = array(
            'kode' => $this->input->post('kode_alat')
        );
        $this->admin->update('alat',$status,$kode_alat); 
        redirect(base_url()."transaksi/read_data_transaksi/", 'refresh');          
    }
}

?>