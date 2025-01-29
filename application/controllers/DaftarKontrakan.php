<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarKontrakan extends CI_Controller

{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }

    public function index()
    {
        $data['title'] = 'Daftar Kontrakan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nama_kontrakan'] = $this->db->get('daftar_kontrakan')->result_array();

        $this->form_validation->set_rules('nama_kontrakan', 'Nama_kontrakan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftarkontrakan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('daftar_kontrakan', ['nama_kontrakan' => $this->input->post('nama_kontrakan')]);
            if ($query = true) {
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                redirect('DaftarKontrakan');
            }
        }
    }

    public function editIndex($id)
    {
        $data['title'] = 'Edit Daftar Kontrakan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['nama_kontrakan'] = $this->db->get('daftar_kontrakan')->result_array();


        $this->form_validation->set_rules('nama_kontrakan', 'Nama_kontrakan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftarkontrakan/e_kontrakan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('M_kontrakan');
            $kontrakan = $this->input->post('nama_kontrakan');
            $this->M_kontrakan->editIndex($kontrakan, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah!</div>');
            redirect('DaftarKontrakan');
        }
    }
    public function editIndexAction($id)
    {
        $this->load->model('M_kontrakan', 'nama_kontrakan');

        $kontrakan = $this->input->post('nama_kontrakan');

        $data = [
            'nama_kontrakan' => $kontrakan
        ];
        $this->nama_kontrakan->edit($data, $id);
        redirect('DaftarKontrakan');
    }
    public function deleteIndex($id)
    {
        $this->load->model('M_kontrakan', 'daftar_kontrakan');
        $this->daftar_kontrakan->deleteIndex($id);
        redirect('DaftarKontrakan');
    }
}
