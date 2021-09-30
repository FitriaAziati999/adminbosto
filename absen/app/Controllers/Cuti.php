<?php

namespace App\Controllers;
use App\Models\CutiModel;
use App\Models\KaryawanModel;
use Dompdf\Dompdf;// ini adalah untuk proses export pdf
use Dompdf\Options;
date_default_timezone_set('Asia/Jakarta');
class Cuti extends BaseController
{
	public function index()
	{// pencarian cara 1
		// $model = new CutiModel();
		// if($this->request->getGet('keyword')){
		// 	$keyword=$this->request->getGet('keyword'); 
		// 	$data['cuti'] = $model->like('nama_karyawan',$keyword)->getAll();
		// }else{
		// 	//$query = $this->db->query("SELECT * FROM karyawan  JOIN cuti USING (id_karyawan)");
		// 	$data['cuti'] = $model->getAll();
			
		// }
		// return view('cuti/get', $data);
		 //pencarian cara ke 2
		 // $query = $this->db->query("SELECT * FROM karyawan  JOIN
		// cuti USING (id_karyawan)");
      	// $data['cuti'] = $query->getResult();
		// return view('cuti/get', $data); // ini yang keliru belum dihapus

		// pencarian cara ke 3
		$pager = \Config\Services::pager();
		$model = new CutiModel();
    	$kunci = $this->request->getVar('keyword');
        if ($kunci) {
            $query = $model->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan "."Data";
			//$jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan ". $CutiModel . '::' . pencarian($kunci);
        } else {
            $query = $model;
            $jumlah = "";
			$query = $model->pencarian("");
        }
		// echo "<pre>";
		// print_r($query);
		 $data['cuti'] = $query->paginate(10);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['jumlah'] = $jumlah;
         echo view('cuti/get',$data);
    }

	
	
	 public function setengah_hari($id_karyawan)
	{
		$cek = $this->db->query("SELECT SUM(cuti) cuti FROM cuti where id_karyawan='$id_karyawan'");
		$cekkaryawan = $this->db->query("SELECT * FROM karyawan where id_karyawan='$id_karyawan'")->getRow();
		$sisa_cuti =$cekkaryawan->total_cuti - $cek->getRow()->cuti;
		if($sisa_cuti< 0.5){
			return redirect()->to(site_url('cuti'))->with('error', 'Cuti anda sudah habis. anda tidak diperbolehkan cuti. anda harus rajin masuk kerja');   
		}else{
			// $query = $this->db->query("UPDATE  cuti set sisa_cuti = sisa_cuti - 0.5  WHERE id_karyawan='$id_karyawan'");
			$query = $this->db->query("INSERT cuti (id_karyawan, cuti)VALUES('$id_karyawan', '0.5')");
			return redirect()->back();
		}
	}
	public function sehari($id_karyawan)
	{
        $cek = $this->db->query("SELECT * FROM cuti where id_karyawan='$id_karyawan'");
		$cekkaryawan = $this->db->query("SELECT * FROM karyawan where id_karyawan='$id_karyawan'")->getRow();
		$sisa_cuti =$cekkaryawan->total_cuti - $cek->getNumRows();
		if($sisa_cuti< 0.5){ 
			// echo "cuti anda sudah habis";
			return redirect()->to(site_url('cuti'))->with('error', 'Cuti anda sudah habis. anda tidak diperbolehkan cuti. anda harus rajin masuk kerja');
		}else{
			// $query = $this->db->query("UPDATE  cuti set sisa_cuti = sisa_cuti - 0.5  WHERE id_karyawan='$id_karyawan'");
			$query = $this->db->query("INSERT cuti (id_karyawan, cuti)VALUES('$id_karyawan', '1')");
			return redirect()->back();
		}
	}
	public function add()
	 {
	 	//membuat select
		$id_karyawan= karyawan::show();
		return view('cuti/tambah',compact('data'));
		return view('cuti/tambah');
	}
	 public function store()
	 {
		$data = $this->request->getPost();

		$this->db->table('cuti')->insert($data);

		if($this->db->affectedRows() > 0){
	 		return redirect()->to(site_url('cuti'))->with('success', 'Data berhasil disimpan');
	 	}
	}
	public function show($id){
		$model = new CutiModel();
		$modelk = new KaryawanModel();
		$data['data'] = $this->db->query("SELECT * FROM cuti where id_karyawan=$id")->getResultArray();
		$data['karyawan'] = $modelk->where([
			'id_karyawan' => $id
			])->first();
			return view('cuti/_detail', $data);
	}
	// public function deleteAlltable()
	// {
	// 	$this->db->table('cuti')->TRUNCATE();
	// 	return redirect()->to(site_url('cuti'))->with('success', 'Data berhasil dihapus');
	// }
	public function deleteAlltable()
	{	echo $tgl=date('d/m');
		if($tgl=="16/09"){ 
			$this->db->table('cuti')->TRUNCATE();
		    return redirect()->to(site_url('cuti'))->with('success', 'Data berhasil dihapus');
		} else{
			return redirect()->to(site_url('cuti'))->with('error', 'Button hanya dapat digunakan setiap tanggal 1 Januari');
		}
	}

	public function exportPDF()
	{	
		$query = $this->db->query("SELECT * FROM cuti");
		$query = $this->db->query("SELECT * FROM karyawan  JOIN cuti on karyawan.id_karyawan = cuti.id_karyawan");
		$model = new CutiModel();
		// 	$data['cuti'] = $model->getAll();
        $data['cuti'] = $model->Alldatapdf();
		
		$html= view('cuti/laporanpdf', $data);
		$options = new Options();
		$options->setDefaultFont('default font','Courier');
		$options->setIsHtml5ParserEnabled(true);
		
		// // instantiate and use the dompdf class
		$dompdf = new Dompdf($options);   
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream();
		
		
	}
		 
	 
}
