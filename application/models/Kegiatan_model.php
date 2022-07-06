<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public function select()
    {
        // listing semua kegiatan
        return $this->db->get('tbl_kegaitan')->result_array();
    }

    // detail kegiatan
    public function detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_kegiatan')->row_array();
    }

    // hapus kegiatan
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_kegiatan');
    }

    // tambah kegiatan
    public function tambah($data)
    {
        $this->db->insert('tbl_kegiatan', $data);
    }

    public function update($id, $data)
    {
        // proses update data kegiatan
        # code...
        $this->db->where('id', $id);
        $this->db->update('tbl_kegiatan', $data);
    }

    public function uploadFoto()
    {
        # code...
    }

    // tampilkan kegiatan yang masih tersedia
    public function listKegiatanTersedia()
    {
        $this->db->where('kapasitas >=', 0);
        return $this->db->get('tbl_kegiatan')->result_array();

        # code...
    }

    public function listKegiatanSelesai()
    {
        $this->db->where('kapasitas >=', 0);
        return $this->db->get('tbl_kegiatan')->result_array();
    }
}


/* End of file Kegiatan_model.php and path /application/models/Kegiatan_model.php */
