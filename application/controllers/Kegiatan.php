<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'Mkegiatan');
        $this->load->model('Peserta_model', 'MPeserta');
        
    }
    // listing kegiatan
    public function index()
    {
        $listKegiatan = $this->Mkegiatan->select();
    }

    public function update($id)
    {
        $listKegiatan = $this->Mkegiatan->detail($id);
        # code...
    }

    public function hapus($id)
    {
        $this->Mkegiatan->hapus($id);
        # code...
    }

    public function tambahkegiatan()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'tanggal' => $this->input->post('tanggal', true),
            'jam' => $this->input->post('jam', true),
            'tempat' => $this->input->post('tempat', true),
            'alamat' => $this->input->post('alamat', true),
            'kapasitas' => $this->input->post('kapasitas', true),
            'poster' => $this->m_kegiatan->uploadFoto(),
            'keterangan' => $this->input->post('keterangan', true),
            'status_kegiatan' => $this->input->post('status_kegiatan', true),
        ];
        $this->m_kegiatan->tambah($data);
        // jika berhasil di proses akan di berikan notifikasi
        $this->session->set_flashdata('pesan', '<span class="">Kegiatan Berhasil di proses</span>');

        redirect('#', 'refresh');
    }
}

/* End of file Kegiatan.php and path /application/controllers/Kegiatan.php */
