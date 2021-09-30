<?php namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'id_karyawan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nokartu', 'nik','nama_karyawan', 'tgl_lahir', 'alamat', 'jk', 'tgl_masuk', 'status', 'bagian', 'jabatan', 'total_cui'];

    public function pencarian($kunci) {
       
        return $this->table('karyawan')
        ->like('nama_karyawan', $kunci); 
         }
    public function Alldatapdf(){
        return $this->db->table('karyawan')->get->getResultArray();
      
    }
}