<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Akuntansi_model extends CI_Model
{


    public function getAllHeader()
    {
        return $this->db->get('tbl_header_akun')->result_array();
    }

    public function getPaginationHeader($limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('nama_header', $keyword);
            $this->db->or_like('no_reff', $keyword);
        }

        return $this->db->get('tbl_header_akun', $limit, $start)->result_array();
    }

    public function countofHeader()
    {
        return $this->db->get('tbl_header_akun')->num_rows();
    }


    public function tambahHeader($no_reff, $nama_header,  $created)
    {
        $data = array(
            'no_reff' => $no_reff,
            'nama_header' => $nama_header,
            // 'date_header' => $date,
            'created_by_header' => $created
        );

        $this->db->insert('tbl_header_akun', $data);
    }

    //FUNCTION akun
    public function getAllakun()
    {
        return $this->db->get('tbl_akun')->result_array();
    }


    public function getPaginationakun($limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('no_acc', $keyword);
        }

        return $this->db->get('tbl_akun', $limit, $start)->result_array();
    }

    public function countOfakun()
    {
        return $this->db->get('tbl_akun')->num_rows();
    }

    public function tambahDataakun($id_header, $nomor_akun, $nama_akun, $status, $created)
    {

        $data = array(
            'id_header' => $id_header,
            'no_acc' => $nomor_akun,
            'nama_akun' => $nama_akun,
            'status_akun' => $status,
            'created' => $created
        );

        $this->db->insert('tbl_akun', $data);
    }

    //FUNCTION Stock
    public function getAllAkunBaru()
    {

        $this->db->select('*');
        $this->db->from('tbl_akun');
        $this->db->join('tbl_header_akun', 'tbl_akun.id_header = tbl_header_akun.id_header');
        $this->db->order_by('id_akun', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
