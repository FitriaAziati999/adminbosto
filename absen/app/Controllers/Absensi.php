<?php

namespace App\Controllers;
use App\Models\AbsensiModel;
class Absensi extends BaseController
{
	public function index()
	{
		// $q = $this->db->select('absensi.*');
        // $this->db->from('absensi');
		// $this->db->join('karyawan, karyawan.id_karyawan = absensi.id_absensi');
		// $id=null;
		// $query = $this->db->get();
		$model = new AbsensiModel();
		// $data = $model->getAbsensi($id);
		$data['absensi'] = $model->getAbsensi();
		// echo "<pre>";
		// print_r($data);
		return view('absensi/get', $data);
	}
}
