<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lapor extends CI_Model
{
    public function getlapor()
    {
        $query = "SELECT `lapor`.*, `daftar_tamu`.`nama_tamu`as `n_tamu`, `daftar_gender`.`nama_gender`as `n_gender`
        FROM `lapor` 
        JOIN `daftar_tamu`ON `lapor`.`id_tamu` = `daftar_tamu`.`id_tamu`
        JOIN `daftar_gender`ON `lapor`.`id_gender` = `daftar_gender`.`id_gender`
        ";
        return $this->db->query($query)->result_array();
    }
    public function get_tamu()
    {
        return $this->db->get('daftar_tamu')->result();
    }
    public function get_gender()
    {
        return $this->db->get('daftar_gender')->result();
    }
    public function insert($data)
    {
        return $this->db->insert('lapor', $data);
    }
    public function get_lapor()
    {
        return $this->db->get('lapor')->result();
    }
    public function get_list_data()
    {
        return $this->db->get('lapor')->result();
    }
    public function get_data_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('lapor')->row();
    }
    public function editIndex($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('lapor', $data);
        // $this->db->select('lapor.*, daftar_tamu.nama_tamu');
        // $this->db->from('lapor');
        // $this->db->join('daftar_tamu', 'lapor.id_tamu = daftar_tamu.id_tamu', 'left'); 

        // return $this->db->get('lapor')->row();
        // return $query->result_array();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('lapor');
    }
    public function get_tujuan()
    {
        return $this->db->get('daftar_tamu')->result();
    }

    // function edit_join($id) {
    //   $this->db->select(x,y,z);
    //   $this->db->from(tabel A);
    //   $this->db->join(tabel B, a.id_a=b.a_id, left)
    //   $this->db->where(id_a, $id);
    //   return $this->db->get()->row();
    //   }
}
