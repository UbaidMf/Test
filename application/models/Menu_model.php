<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function get_tujuan()
    {
        return $this->db->get('user_menu')->result();
    }
    public function get_data_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_sub_menu')->row();
    }
    public function editSubMenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }
    public function get_menu()
    {
        return $this->db->get('user_menu')->result();
    }
    public function editIndex($menu, $id)
    {
        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }
    public function deleteIndex($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_menu');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_sub_menu');
    }
}
