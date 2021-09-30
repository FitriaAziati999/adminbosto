<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'id_cuti';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nik', 'nama_karyawan', 'tgl_cuti'];

    // public function getAll() {
    //     return $this->db->table('cuti')
    //     ->join('karyawan','karyawan.id_karyawan=cuti.id_karyawan')
    //     ->get()->getResultArray();
    // }
    // public function getAll() {
    //     return $this->db->table('cuti')->join('karyawan','karyawan.id_karyawan=cuti.id_karyawan');
    // }
 
    public function pencarian($kunci) {
    // return $this->table('cuti')
    // ->join('karyawan','karyawan.id_karyawan=cuti.id_karyawan')
    // ->like('nama_karyawan', $kunci); 
    return $this->table('karyawan')
        ->select("karyawan.*, (total_cuti - c.jumlah_cuti) as sisa_cuti")
        ->join('(SELECT SUM(cuti) as jumlah_cuti, id_karyawan from cuti GROUP BY id_karyawan) as c','karyawan.id_karyawan=c.id_karyawan', 'LEFT')
        ->like('nama_karyawan', $kunci); 
     }
     public function Alldatapdf(){
        return $this->table('karyawan')
        ->select("karyawan.*, (total_cuti - c.jumlah_cuti) as sisa_cuti, c.tgl_cuti")
        ->join('(SELECT SUM(cuti) as jumlah_cuti, id_karyawan, tgl_cuti from cuti GROUP BY id_karyawan) as c','karyawan.id_karyawan=c.id_karyawan', 'LEFT')->get()->getResultArray();
      
    }
// public function get_keyword($keyword){
//     $this->db->query("SELECT * FROM karyawan INNER JOIN
// 		cuti USING (id_karyawan)");
//     // $this->db->select('*, tb_soal.id_soal as id_soal_view');
//     // $this->db->from('tb_soal');
//     // $this->db->join('tb_jawaban', 'tb_jawaban.id_jawaban = tb_soal.id_jawaban', 'LEFT');
//     // $this->db->join('tb_tingkatan', 'tb_tingkatan.id_tingkatan = tb_soal.id_tingkatan');
//     // $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_soal.id_kelas');
//     // $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_soal.id_mapel');
//     $this->db->like('tb_soal.soal', $keyword);
//     $this->db->or_like('tb_soal.id_jawaban', $keyword);
//     $this->db->or_like('tb_soal.id_tingkatan', $keyword);
//     $this->db->or_like('tb_soal.id_kelas', $keyword);
//     $this->db->or_like('tb_soal.id_mapel', $keyword);
//     $this->db->or_like('tb_soal.pembahasan', $keyword);
//     return $this->db->get()->result();
// }
}