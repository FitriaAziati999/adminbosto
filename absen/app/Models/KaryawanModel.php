<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'id_karyawan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nik', 'nama_karyawan', 'tgl_lahir', 'alamat', 'jk', 'tgl_masuk', 'status', 'bagian'];
}