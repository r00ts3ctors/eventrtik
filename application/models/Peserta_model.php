<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
    public function select()
    {
        // menampilkan semua peserta
        // menggunakan fitur join seharunya.
        $this->db->select('nama, tlp, email, pekerjaan, pendidikan, jenis_kelamin, tanggal_daftar, status_daftar');
        return $this->db->get('tbl_peserta')->result_array();
    }

    // menampilkan detail peserta 
    public function detail($id)
    {
        // dapatkan listing peserta berdasarkan id
        $this->db->where('id', $id);
        $this->db->select('nama, tlp, email, pekerjaan, jenis_kelamin, tanggal_daftar, status_daftar');
        return   $this->db->get('tbl_peserta', 1)->row_array();
    }

    // tambah peserta 
    public function tambah($data)
    {
        $this->db->insert('tbl_peserta', $data);
    }


    // hapus peserta
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_peserta');

        # code...
    }

    // update
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_peserta', $data);

        # code...
    }

    // proses pengurangan kapasitas kegiatan
    public function kapasitas($idKegiatan)
    {
        // dapatkan data id kegiatan 
        $kegiatan = $this->db->get_where('tbl_kegiatan', ['id' => $idKegiatan], 1)->row_array();
        $kapasitas = $kegiatan['kapasistas'] - 1;

        if ($kapasitas >= 1) {
            // proses pengurangan data kapasitas
            $this->db->where('id', $idKegiatan);
            $this->db->update('tbl_kegiatan', ['kapasitas' => $kapasitas]);

            $this->session->set_flashdata('pesan', '<span class="">Kegiatan Telah berhasil di ambil oleh anda. </span>');

            redirect('#', 'refresh');
        } else {

            $this->db->where('id', $idKegiatan);
            $this->db->update('tbl_kegiatan', ['status_kegiatan' => 0]);
            $this->session->set_flashdata('pesan', '<span class="">Kegiatan Telah Gagal di ambil, anda masuk dalam list cadangan.</span>');

            redirect('#', 'refresh');
            // jika tidak ada, maka tidak ada pengrugan dan informasikan jika kondisi kegiatan telah full atau terisi 
            // data peserta akan masuk kedalam list cadagangan

        }
    }
}


/* End of file Peserta_model.php and path /application/models/Peserta_model.php */
