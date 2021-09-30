<?php namespace App\Models;
use CodeIgniter\Model;
 
class AbsensiModel extends Model
{
     
    public function getAbsensi($id = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
         $query = $this->db->table('absensi');
         $query->join('karyawan', 'karyawan.nokartu = absensi.nokartu', 'left' ); 
        //  ->get()->getResultArray(); 
         if( $id !=null) {
			$query->where('id_absensi' , $id);
		} 
        $query->where('tanggal' , $tanggal);
        return $query->get()->getResult();
    }
 }