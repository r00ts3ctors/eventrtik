<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Peserta extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model', 'Mkegiatan');
        $this->load->model('Peserta_model', 'MPeserta');
    }

    // list peserta
    public function index()
    {
               $listPeserta = $this->MPeserta->select(); 
    }

    // tambah peserta
    public function tambah()
    {
        $inputPeserta = [
            ''
        ];
        $this->MPeserta->tambah($inputPeserta);

        # code...
    }

    // edit peserta
    public function edit($id)
    {
        # code...
    }
    // hapus peserta

    public function hapus($id)
    {
        # code...
    }
    // update peserta

    public function update()
    {
        # code...
    }
    
    // detail peserta
    public function detail($id)
    {
        # code...
    }

}

/* End of file Peserta.php and path /application/controllers/Peserta.php */
