<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarTamu extends CI_Controller

{
    public function index()
    {
        $data['title'] = 'Daftar Tamu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nama_tamu'] = $this->db->get('daftar_tamu')->result_array();

        $this->form_validation->set_rules('nama_tamu', 'Nama_tamu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftartamu/index', $data);
            // $this->load->view('daftartamu/index_c', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('daftar_tamu', ['nama_tamu' => $this->input->post('nama_tamu')]);
            if ($query = true) {
                $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                redirect('DaftarTamu');
            }
        }
    }

    public function editIndex($id)
    {
        $data['title'] = 'Edit Daftar Tamu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['nama_tamu'] = $this->db->get('daftar_tamu')->result_array();
        // $data['daftar_tamu'] = $this->M_tamu->get_data_by_id($id);


        $this->form_validation->set_rules('nama_tamu', 'Nama_tamu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftartamu/e_tamu', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('M_tamu');
            $tamu = $this->input->post('nama_tamu');
            $this->M_tamu->editIndex($tamu, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah!</div>');
            redirect('DaftarTamu');
        }
    }
    public function editIndexAction($id)
    {
        $this->load->model('M_tamu', 'nama_tamu');

        $tamu = $this->input->post('nama_tamu');

        $data = [
            'nama_tamu' => $tamu
        ];
        $this->nama_tamu->edit($data, $id);
        redirect('DaftarTamu');
    }
    public function deleteIndex($id)
    {
        $this->load->model('M_tamu', 'daftar_tamu');
        $this->daftar_tamu->deleteIndex($id);
        redirect('DaftarTamu');
    }
}
