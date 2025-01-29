<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kontrakan extends CI_Model
{
    public function get_tujuan()
    {
        return $this->db->get('daftar_kontrakan')->result();
    }
    public function get_data_by_id($id_kontrakan)
    {
        $this->db->where('id_kontrakan', $id_kontrakan);
        return $this->db->get('user_sub_menu')->row();
    }
    public function editSubMenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }
    public function get_menu()
    {
        return $this->db->get('daftar_kontrakan')->result();
    }
    public function editIndex($kontrakan, $id_kontrakan)
    {
        $this->db->set('nama_kontrakan', $kontrakan);
        $this->db->where('id_kontrakan', $id_kontrakan);
        $this->db->update('daftar_kontrakan');
    }
    public function deleteIndex($id_kontrakan)
    {
        $this->db->where('id_kontrakan', $id_kontrakan);
        return $this->db->delete('daftar_kontrakan');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_sub_menu');
    }
}
