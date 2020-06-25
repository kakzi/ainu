<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Satuan_model extends CI_Model
{
    // FUNCTION produk
    public function getAllSatuan()
    {
        return $this->db->get('tbl_satuan')->result_array();
    }

    public function tambahDataSatuan($nama_satuan, $created){
        $data = array(
            'nama_satuan' => $nama_satuan,
            'created' => $created
        );

        $this->db->insert('tbl_satuan', $data);
    }
}