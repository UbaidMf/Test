<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kost extends CI_Model
{
    public function get_tujuan()
    {
        return $this->db->get('daftar_kost')->result();
    }
    public function get_data_by_id($id_kost)
    {
        $this->db->where('id_kost', $id_kost);
        return $this->db->get('user_sub_menu')->row();
    }
    public function get_menu()
    {
        return $this->db->get('daftar_kost')->result();
    }
    public function editIndex($kost, $id_kost)
    {
        $this->db->set('nama_kost', $kost);
        $this->db->where('id_kost', $id_kost);
        $this->db->update('daftar_kost');
    }
    public function deleteIndex($id_kost)
    {
        $this->db->where('id_kost', $id_kost);
        return $this->db->delete('daftar_kost');
    }
}
