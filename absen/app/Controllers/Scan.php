<?php

namespace App\Controllers;
use App\Models\ScanModel;
class Scan extends BaseController
{
	public function index()
	{
		return view('scan/scan');
	}
    public function bacakartu(){
		$query = $this->db->query("SELECT * FROM statuss");
        $d = $query->getRowArray();
        $mode_absen = $d['mode'];

        $data['mode'] = "";
        if($mode_absen==1)
        $data['mode'] = "Masuk";
        else if($mode_absen==2)
        $data['mode'] = "Istirahat";
        else if($mode_absen==3)
		$data['mode'] = "Kembali";
        else if($mode_absen==4)
		$data['mode'] = "Pulang";
        $baca_kartu = $this->db->query("SELECT * FROM tmprfid");
	$data_kartu = $baca_kartu->getRowArray();
    $data['nokartu']   = $data_kartu['nokartu'];
        // print_r($data);
        return view('scan/bacakartu', $data);
    }
  
    
}