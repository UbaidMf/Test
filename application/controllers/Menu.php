<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru berhasil ditambahkan! </div>');
            redirect('menu');
        }
    }

    public function editIndex($id)
    {
        $data['title'] = 'Edit Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('Menu_model');
            $menu = $this->input->post('menu');
            $this->Menu_model->editIndex($menu, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil diubah!</div>');
            redirect('menu');
        }
    }
    public function editIndexAction($id)
    {
        $this->load->model('Menu_model', 'menu');

        $menu = $this->input->post('menu');

        $data = [
            'menu' => $menu
        ];
        $this->menu->edit($data, $id);
        redirect('menu');
    }
    public function deleteIndex($id)
    {
        $this->load->model('Menu_model', 'user_menu');
        $this->user_menu->deleteIndex($id);
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu baru ditambahkan! </div>');
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {

        $this->load->model('Menu_model');
        $data['title'] = 'Edit Submenu Management';
        $data['menu'] = $this->Menu_model->get_tujuan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user_sub_menu'] = $this->Menu_model->get_data_by_id($id);

        $this->form_validation->set_rules('title', 'Title');
        $this->form_validation->set_rules('menu_id', 'Menu');
        $this->form_validation->set_rules('url', 'Url');
        $this->form_validation->set_rules('icon', 'Icon');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $title = $this->input->post('title');
            $menu_id = $this->input->post('menu_id');
            $url = $this->input->post('url');
            $icon = $this->input->post('icon');

            $data = [
                'title' => $title,
                'menu_id' => $menu_id,
                'url' => $url,
                'icon' => $icon,
            ];

            $this->Menu_model->editSubMenu($data, $id);
            redirect('menu/submenu');
        }
    }
    public function editSubMenuAction($id)
    {
        $this->load->model('Menu_model', 'user_sub_menu');

        $title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');

        $data = [
            'title' => $title,
            'menu_id' => $menu_id,
            'url' => $url,
            'icon' => $icon,
        ];
        $this->user_sub_menu->editSubMenu($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Submenu berhasil diubah!</div>');
        redirect('menu/submenu');
    }
    public function delete($id)
    {
        $this->load->model('Menu_model', 'user_sub_menu');
        $this->user_sub_menu->delete($id);
        redirect('menu/submenu');
    }
}
