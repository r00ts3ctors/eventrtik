<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // listing fitur        
    }

    public function backupDB()
    {
        # code...
    }

    public function cetakKegiatan()
    {
        # code...
    }

    public function cetakPeserta()
    {
        # code...
    }

    public function hapus($info, $item)
    {
        // hapus berdasarkan data
        $this->db->delete('tbl_kegiatan', [$item => $info]);
    }
}

/* End of file Config.php and path /application/controllers/Config.php */
