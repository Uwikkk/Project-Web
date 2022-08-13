<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Model {
    public function getData($tabel){
        $read = $this->db->get($tabel);
        return $read->result_array();
    }

    public function inputData($tabel, $data){
        $input = $this->db->insert($tabel, $data);
        return $input;
    }

    public function delete($tabel, $dataygdihapus){
        $delete = $this->db->delete($tabel,$dataygdihapus);
        return $delete;
    }

    public function update($tabel, $data, $where){
        $update = $this->db->update($tabel,$data,$where);
        return $update;
    }

    public function getData_khusus($tabel, $where){
        $data = $this->db->get_where($tabel, $where);
        return $data->result_array();
    }

}
