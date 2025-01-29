<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }
    public function ubahRole($role, $id)
    {
        $this->db->set('role', $role);
        $this->db->where('id', $id);
        $this->db->update('user_role');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }
    public function lapor()
    {
        return $this->db->get('lapor')->num_rows();
    }
}
