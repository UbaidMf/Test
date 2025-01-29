<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tamu extends CI_Model
{
    public function get_tujuan()
    {
        return $this->db->get('daftar_tamu')->result();
    }
    public function get_data_by_id($id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        return $this->db->get('daftar_tamu')->row();
    }
    public function get_menu()
    {
        return $this->db->get('daftar_tamu')->result();
    }
    public function editIndex($tamu, $id_tamu)
    {
        $this->db->set('nama_tamu', $tamu);
        $this->db->where('id_tamu', $id_tamu);
        $this->db->update('daftar_tamu');
    }
    public function deleteIndex($id_tamu)
    {
        $this->db->where('id_tamu', $id_tamu);
        return $this->db->delete('daftar_tamu');
    }
}
