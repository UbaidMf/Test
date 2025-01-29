<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarGender extends CI_Controller

{
    public function index()
    {
        $data['title'] = 'Jenis Kelamin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nama_gender'] = $this->db->get('daftar_gender')->result_array();

        $this->form_validation->set_rules('nama_gender', 'Nama_gender', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftargender/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('daftar_gender', ['nama_gender' => $this->input->post('nama_gender')]);
            if ($query = true) {
                $this->session->set_flashdata('message', 'data berhasil ditambahkan');
                redirect('DaftarGender');
            }
        }
    }

    public function editIndex($id)
    {
        $data['title'] = 'Edit Daftar Kost';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['nama_kost'] = $this->db->get('daftar_kost')->result_array();

        $this->form_validation->set_rules('nama_kost', 'Nama_kost', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftarkost/e_kost', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('M_kost');
            $kost = $this->input->post('nama_kost');
            $this->M_kost->editIndex($kost, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah!</div>');
            redirect('DaftarKost');
        }
    }
    public function editIndexAction($id)
    {
        $this->load->model('M_kost', 'nama_kost');

        $kost = $this->input->post('nama_kost');

        $data = [
            'nama_kost' => $kost
        ];
        $this->nama_kost->edit($data, $id);
        redirect('DaftarKost');
    }
    public function deleteIndex($id)
    {
        $this->load->model('M_kost', 'daftar_kost');
        $this->daftar_kost->deleteIndex($id);
        redirect('DaftarKost');
    }
}
