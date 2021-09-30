<?php

namespace App\Controllers;
use App\Models\NokartuModel;
class Nokartu extends BaseController
{
	public function index()
	{
		$query = $this->db->query("SELECT * FROM tmprfid");
        $data = $query->getRowArray();
        $d['nokartu'] = $data['nokartu'];
        
		return view('karyawan/nokartu', $d);
	}
}