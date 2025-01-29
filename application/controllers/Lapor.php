<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;
// use Dompdf\Options;

class Lapor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lapor');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_lapor', 'lapor');
        // $data = $this->M_lapor->get_list_data();

        $data['list_lapor'] = $this->M_lapor->get_list_data();

        $data['nik'] = $this->db->get('lapor')->result_array();
        $data['nama'] = $this->db->get('lapor')->result_array();
        $data['alamat_k'] = $this->db->get('lapor')->result_array();
        $data['id_gender'] = $this->db->get('lapor')->result_array();
        $data['id_tamu'] = $this->db->get('lapor')->result_array();
        $data['no_rumah'] = $this->db->get('lapor')->result_array();
        $data['rumah_k'] = $this->db->get('lapor')->result_array();
        $data['a_kunjungan'] = $this->db->get('lapor')->result_array();
        $data['tanggal_masuk'] = $this->db->get('lapor')->result_array();
        $data['tanggal_keluar'] = $this->db->get('lapor')->result_array();
        $data['no_hp'] = $this->db->get('lapor')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_k', 'Alamat_k', 'required');
        $this->form_validation->set_rules('id_gender', 'Id_gender', 'required');
        $this->form_validation->set_rules('id_tamu', 'Id_tamu', 'required');
        $this->form_validation->set_rules('no_rumah', 'No_rumah', 'required');
        $this->form_validation->set_rules('rumah_k', 'Rumah_k', 'required');
        $this->form_validation->set_rules('a_kunjungan', 'A_kunjungan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal_keluar', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lapor/index_l', $data);
            // $this->load->view('lapor/index_c', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('lapor', ['nik' => $this->input->post('nik')]);
            $this->db->insert('lapor', ['nama' => $this->input->post('nama')]);
            $this->db->insert('lapor', ['alamat_k' => $this->input->post('alamat_k')]);
            $this->db->insert('lapor', ['id_gender' => $this->input->post('id_gender')]);
            $this->db->insert('lapor', ['id_tamu' => $this->input->post('id_tamu')]);
            $this->db->insert('lapor', ['no_rumah' => $this->input->post('no_rumah')]);
            $this->db->insert('lapor', ['rumah_k' => $this->input->post('rumah_k')]);
            $this->db->insert('lapor', ['a_kunjungan' => $this->input->post('a_kunjungan')]);
            $this->db->insert('lapor', ['tanggal_masuk' => $this->input->post('tanggal_masuk')]);
            $this->db->insert('lapor', ['tanggal_akhir' => $this->input->post('tanggal_akhir')]);
            $this->db->insert('lapor', ['no_hp' => $this->input->post('no_hp')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru berhasil ditambahkan! </div>');
            redirect('menu');
        }
    }
    public function index_c()
    {
        $data['title'] = 'Data Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_lapor', 'lapor');
        // $data = $this->M_lapor->get_list_data();

        $data['list_lapor'] = $this->M_lapor->get_list_data();

        $data['nik'] = $this->db->get('lapor')->result_array();
        $data['nama'] = $this->db->get('lapor')->result_array();
        $data['alamat_k'] = $this->db->get('lapor')->result_array();
        $data['id_gender'] = $this->db->get('lapor')->result_array();
        $data['id_tamu'] = $this->db->get('lapor')->result_array();
        $data['no_rumah'] = $this->db->get('lapor')->result_array();
        $data['rumah_k'] = $this->db->get('lapor')->result_array();
        $data['a_kunjungan'] = $this->db->get('lapor')->result_array();
        $data['tanggal_masuk'] = $this->db->get('lapor')->result_array();
        $data['tanggal_keluar'] = $this->db->get('lapor')->result_array();
        $data['no_hp'] = $this->db->get('lapor')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_k', 'Alamat_k', 'required');
        $this->form_validation->set_rules('id_gender', 'Id_Gender', 'required');
        $this->form_validation->set_rules('id_tamu', 'Id_tamu', 'required');
        $this->form_validation->set_rules('no_rumah', 'No_rumah', 'required');
        $this->form_validation->set_rules('rumah_k', 'Rumah_k', 'required');
        $this->form_validation->set_rules('a_kunjungan', 'A_kunjungan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal_keluar', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            // $this->load->view('lapor/index_l', $data);
            $this->load->view('lapor/index_c', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('lapor', ['nik' => $this->input->post('nik')]);
            $this->db->insert('lapor', ['nama' => $this->input->post('nama')]);
            $this->db->insert('lapor', ['alamat_k' => $this->input->post('alamat_k')]);
            $this->db->insert('lapor', ['id_gender' => $this->input->post('id_gender')]);
            $this->db->insert('lapor', ['id_tamu' => $this->input->post('id_tamu')]);
            $this->db->insert('lapor', ['no_rumah' => $this->input->post('no_rumah')]);
            $this->db->insert('lapor', ['rumah_k' => $this->input->post('rumah_k')]);
            $this->db->insert('lapor', ['a_kunjungan' => $this->input->post('a_kunjungan')]);
            $this->db->insert('lapor', ['tanggal_masuk' => $this->input->post('tanggal_masuk')]);
            $this->db->insert('lapor', ['tanggal_akhir' => $this->input->post('tanggal_akhir')]);
            $this->db->insert('lapor', ['no_hp' => $this->input->post('no_hp')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru berhasil ditambahkan! </div>');
            redirect('menu');
        }
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_lapor', 'lapor');

        // $data['list_tamu'] = $this->M_lapor->get_tamu();
        $data['list_lapor'] = $this->M_lapor->getlapor();
        $data['nama_tamu'] = $this->db->get('daftar_tamu')->result_array();
        $data['nama_gender'] = $this->db->get('daftar_gender')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lapor/t_lapor', $data);
        $this->load->view('templates/footer');
    }

    public function lapor_action()
    {
        $this->load->model('M_lapor');

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $alamat_k = $this->input->post('alamat_k');
        $id_gender = $this->input->post('id_gender');
        $id_tamu = $this->input->post('id_tamu');
        $no_rumah = $this->input->post('no_rumah');
        $rumah_k = $this->input->post('rumah_k');
        $a_kunjungan = $this->input->post('a_kunjungan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $no_hp = $this->input->post('no_hp');

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'alamat_k' => $alamat_k,
            'id_gender' => $id_gender,
            'id_tamu' => $id_tamu,
            'no_rumah' => $no_rumah,
            'rumah_k' => $rumah_k,
            'a_kunjungan' => $a_kunjungan,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
            'no_hp' => $no_hp,
        ];
        $this->M_lapor->insert($data);
        redirect('lapor');
    }
    public function editIndex($id)
    {
        $data['title'] = 'Edit Daftar Pengunjung';
        // $data['nama_tamu'] = $this->M_lapor->get_tujuan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['list_lapor'] = $this->M_lapor->getlapor();
        $data['lapor'] = $this->M_lapor->get_data_by_id($id);
        $data['nama_tamu'] = $this->db->get('daftar_tamu')->result_array();
        $data['nama_gender'] = $this->db->get('daftar_gender')->result_array();
        // var_dump($data['nama_tamu']);
        // exit();
        $data['nik'] = $this->db->get('lapor')->result_array();
        $data['nama'] = $this->db->get('lapor')->result_array();
        $data['alamat_k'] = $this->db->get('lapor')->result_array();
        $data['id_gender'] = $this->db->get('lapor')->result_array();
        $data['id_tamu'] = $this->db->get('lapor')->result_array();


        $data['no_rumah'] = $this->db->get('lapor')->result_array();
        $data['rumah_k'] = $this->db->get('lapor')->result_array();
        $data['a_kunjungan'] = $this->db->get('lapor')->result_array();
        $data['tanggal_masuk'] = $this->db->get('lapor')->result_array();
        $data['tanggal_keluar'] = $this->db->get('lapor')->result_array();
        $data['no_hp'] = $this->db->get('lapor')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_k', 'Alamat_k', 'required');
        $this->form_validation->set_rules('id_gender', 'Id_gender', 'required');
        $this->form_validation->set_rules('id_tamu', 'Id_tamu', 'required');
        $this->form_validation->set_rules('no_rumah', 'No_rumah', 'required');
        $this->form_validation->set_rules('rumah_k', 'Rumah_k', 'required');
        $this->form_validation->set_rules('a_kunjungan', 'A_kunjungan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal_keluar', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lapor/e_lapor', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('M_lapor');
            $data = $this->input->post('nik');
            $data = $this->input->post('nama');
            $data = $this->input->post('alamat_k');
            $data = $this->input->post('id_gender');
            $data = $this->input->post('id_tamu');
            $data = $this->input->post('no_rumah');
            $data = $this->input->post('rumah_k');
            $data = $this->input->post('a_kunjungan');
            $data = $this->input->post('tanggal_masuk');
            $data = $this->input->post('tanggal_keluar');
            $data = $this->input->post('no_hp');
            $this->M_lapor->editIndex($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah!</div>');
            redirect('lapor');
        }
    }
    public function editIndexAction($id)
    {
        $this->load->model('M_lapor', 'lapor');

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $alamat_k = $this->input->post('alamat_k');
        $id_gender = $this->input->post('id_gender');
        $id_tamu = $this->input->post('id_tamu');
        $no_rumah = $this->input->post('no_rumah');
        $rumah_k = $this->input->post('rumah_k');
        $a_kunjungan = $this->input->post('a_kunjungan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $no_hp = $this->input->post('no_hp');

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'alamat_k' => $alamat_k,
            'id_gender' => $id_gender,
            'id_tamu' => $id_tamu,
            'no_rumah' => $no_rumah,
            'rumah_k' => $rumah_k,
            'a_kunjungan' => $a_kunjungan,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
            'no_hp' => $no_hp,
        ];
        $this->lapor->editIndex($data, $id);
        redirect('lapor');

        // $this->load->model('M_kontrakan', 'nama_kontrakan');

        // $kontrakan = $this->input->post('nama_kontrakan');

        // $data = [
        //     'nama_kontrakan' => $kontrakan
        // ];
        // $this->nama_kontrakan->edit($data, $id);
        // redirect('DaftarKontrakan');
    }
    public function delete($id)
    {
        $this->load->model('M_lapor', 'lapor');
        $this->lapor->delete($id);
        redirect('lapor');
    }
    function pdf()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->Settitle('Data Pengunjung');
        $pdf->SetFont('helvetica', 'B', 15);
        // $pdf->Image($type = 'LOGO_KABUPATEN_KEBUMEN.jpg');
        $pdf->Cell(0, 5, 'PEMERINTAH KABUPATEN KEBUMEN', 0, 1, 'C');
        $pdf->Cell(0, 5, 'KECAMATAN KEBUMEN', 0, 1, 'C');
        $pdf->Cell(0, 5, 'KEPALA DESA KUTOSARI', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(0, 3, ' Jalan Raya No.1, Kutosari, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54317', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->Cell(0, 5, 'DESA KUTOSARI RT 003 RW 001', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 30);
        $pdf->Cell(0, 3, '________________________________', 0, 1, 'C');
        // $pdf->Cell(0, 0, '___________________________________________________________', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'B', 18);
        $pdf->Cell(0, 25, 'DATA PENGUNJUNG DESA KUTOSARI', 0, 1, 'C');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFont('Arial', '', 12);
        $lapor = $this->db->get('lapor')->result();
        $no = 0;
        foreach ($lapor as $id => $data) {
            $no++;
            $pdf->Cell(50, 8, 'NIK', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->nik, 0, 0);
            $pdf->Cell(50, 8, 'Nama Tamu', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->nama, 0, 0);
            $pdf->Cell(50, 8, 'Alamat KTP', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->alamat_k, 0, 0);
            $pdf->Cell(50, 8, 'Jenis Kelamin', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->id_gender, 0, 0);
            $pdf->Cell(50, 8, 'Tujuan Tamu', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->id_tamu, 0, 0);
            $pdf->Cell(50, 8, 'No Rumah', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->no_rumah, 0, 0);
            $pdf->Cell(50, 8, 'Rumah Kunjungan', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->rumah_k, 0, 0);
            $pdf->Cell(50, 8, 'Alamat Kunjungan', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->a_kunjungan, 0, 0);
            $pdf->Cell(50, 8, 'Tanggal Masuk', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->tanggal_masuk, 0, 0);
            $pdf->Cell(50, 8, 'Tanggal Keluar', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->tanggal_keluar, 0, 0);
            $pdf->Cell(50, 8, 'No Hp', 0, 0);
            $pdf->Cell(2, 8, ':', 0, 0);
            $pdf->MultiCell(100, 8, $data->no_hp, 0, 0);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(50, 8, '', 0, 0);
            $pdf->Cell(30, 8, 'Kebumen,', 0, 0);
            $pdf->Cell(50, 8, '', 0, 0);
            $pdf->MultiCell(30, 8, 'Kebumen, ', 0, 0);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(50, 8, '', 0, 2);
            $pdf->Cell(10, 10, '', 0, 2);
            $pdf->Cell(50, 8, '', 0, 0);
            $pdf->Cell(30, 8, '(Ketua RT)', 0, 0);
            $pdf->Cell(50, 8, '', 0, 0);
            $pdf->MultiCell(40, 8, '(Nama Pengunjung)', 0, 0);
            $pdf->Cell(10, 10, '', 0, 1);
            $pdf->Cell(10, 10, '', 0, 1);
            $pdf->Cell(10, 10, '', 0, 1);
        }
        $pdf->Output();
    }

    public function p()
    {
        $data['title'] = 'Detail Peraturan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_lapor', 'lapor');
        // $data = $this->M_lapor->get_list_data();

        $data['list_lapor'] = $this->M_lapor->get_list_data();

        $data['nik'] = $this->db->get('lapor')->result_array();
        $data['nama'] = $this->db->get('lapor')->result_array();
        $data['alamat_k'] = $this->db->get('lapor')->result_array();
        $data['id_gender'] = $this->db->get('lapor')->result_array();
        $data['id_tamu'] = $this->db->get('lapor')->result_array();
        $data['no_rumah'] = $this->db->get('lapor')->result_array();
        $data['rumah_k'] = $this->db->get('lapor')->result_array();
        $data['a_kunjungan'] = $this->db->get('lapor')->result_array();
        $data['tanggal_masuk'] = $this->db->get('lapor')->result_array();
        $data['tanggal_keluar'] = $this->db->get('lapor')->result_array();
        $data['no_hp'] = $this->db->get('lapor')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_k', 'Alamat_k', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('id_tamu', 'Id_tamu', 'required');
        $this->form_validation->set_rules('no_rumah', 'No_rumah', 'required');
        $this->form_validation->set_rules('rumah_k', 'Rumah_k', 'required');
        $this->form_validation->set_rules('a_kunjungan', 'A_kunjungan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal_keluar', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lapor/p', $data);
            // $this->load->view('lapor/index_c', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('lapor', ['nik' => $this->input->post('nik')]);
            $this->db->insert('lapor', ['nama' => $this->input->post('nama')]);
            $this->db->insert('lapor', ['alamat_k' => $this->input->post('alamat_k')]);
            $this->db->insert('lapor', ['gender' => $this->input->post('gender')]);
            $this->db->insert('lapor', ['id_tamu' => $this->input->post('id_tamu')]);
            $this->db->insert('lapor', ['no_rumah' => $this->input->post('no_rumah')]);
            $this->db->insert('lapor', ['rumah_k' => $this->input->post('rumah_k')]);
            $this->db->insert('lapor', ['a_kunjungan' => $this->input->post('a_kunjungan')]);
            $this->db->insert('lapor', ['tanggal_masuk' => $this->input->post('tanggal_masuk')]);
            $this->db->insert('lapor', ['tanggal_akhir' => $this->input->post('tanggal_akhir')]);
            $this->db->insert('lapor', ['no_hp' => $this->input->post('no_hp')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru berhasil ditambahkan! </div>');
            redirect('menu');
        }
    }
    public function editI($id)
    {
        $data['title'] = 'Edit Daftar Pengunjung';
        // $data['nama_tamu'] = $this->M_lapor->get_tujuan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['list_lapor'] = $this->M_lapor->getlapor();
        $data['lapor'] = $this->M_lapor->get_data_by_id($id);
        $data['nama_tamu'] = $this->db->get('daftar_tamu')->result_array();
        $data['nama_gender'] = $this->db->get('daftar_gender')->result_array();
        // var_dump($data['nama_tamu']);
        // exit();
        $data['nik'] = $this->db->get('lapor')->result_array();
        $data['nama'] = $this->db->get('lapor')->result_array();
        $data['alamat_k'] = $this->db->get('lapor')->result_array();
        $data['id_gender'] = $this->db->get('lapor')->result_array();
        $data['id_tamu'] = $this->db->get('lapor')->result_array();


        $data['no_rumah'] = $this->db->get('lapor')->result_array();
        $data['rumah_k'] = $this->db->get('lapor')->result_array();
        $data['a_kunjungan'] = $this->db->get('lapor')->result_array();
        $data['tanggal_masuk'] = $this->db->get('lapor')->result_array();
        $data['tanggal_keluar'] = $this->db->get('lapor')->result_array();
        $data['no_hp'] = $this->db->get('lapor')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_k', 'Alamat_k', 'required');
        $this->form_validation->set_rules('id_gender', 'Id_gender', 'required');
        $this->form_validation->set_rules('id_tamu', 'Id_tamu', 'required');
        $this->form_validation->set_rules('no_rumah', 'No_rumah', 'required');
        $this->form_validation->set_rules('rumah_k', 'Rumah_k', 'required');
        $this->form_validation->set_rules('a_kunjungan', 'A_kunjungan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal_keluar', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lapor/ec_lapor', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->model('M_lapor');
            $data = $this->input->post('nik');
            $data = $this->input->post('nama');
            $data = $this->input->post('alamat_k');
            $data = $this->input->post('id_gender');
            $data = $this->input->post('id_tamu');
            $data = $this->input->post('no_rumah');
            $data = $this->input->post('rumah_k');
            $data = $this->input->post('a_kunjungan');
            $data = $this->input->post('tanggal_masuk');
            $data = $this->input->post('tanggal_keluar');
            $data = $this->input->post('no_hp');
            $this->M_lapor->editIndex($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah!</div>');
            redirect('lapor/index_c');
        }
    }
    public function editIndexA($id)
    {
        $this->load->model('M_lapor', 'lapor');

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $alamat_k = $this->input->post('alamat_k');
        $id_gender = $this->input->post('id_gender');
        $id_tamu = $this->input->post('id_tamu');
        $no_rumah = $this->input->post('no_rumah');
        $rumah_k = $this->input->post('rumah_k');
        $a_kunjungan = $this->input->post('a_kunjungan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $no_hp = $this->input->post('no_hp');

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'alamat_k' => $alamat_k,
            'id_gender' => $id_gender,
            'id_tamu' => $id_tamu,
            'no_rumah' => $no_rumah,
            'rumah_k' => $rumah_k,
            'a_kunjungan' => $a_kunjungan,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_keluar' => $tanggal_keluar,
            'no_hp' => $no_hp,
        ];
        $this->lapor->editIndex($data, $id);
        redirect('lapor/index_c');
    }
    public function deleteI($id)
    {
        $this->load->model('M_lapor', 'lapor');
        $this->lapor->delete($id);
        redirect('lapor/index_c');
    }
}
