<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use PHPExcel;// ini adalah untuk proses ke excel
use PHPExcel_IOFactory; // ini adalah untuk proses ke excel
use Dompdf\Dompdf;// ini adalah untuk proses export pdf
use Dompdf\Options;
class Karyawan extends BaseController
{	
	public function __construct(){
		$this->karyawan = new KaryawanModel();
	}

	public function index()
	{
        // $builder = $this->db->table('karyawan');
        // $query   = $builder->get(); 
		// $query = $this->db->query("SELECT * FROM karyawan");
        // $data['karyawan'] = $query->getResult();
		// return view('karyawan/get', $data);

		$pager = \Config\Services::pager(); 
		$model = new KaryawanModel();
    	$kunci = $this->request->getVar('keyword');
        if ($kunci) {
            $query = $model->pencarian($kunci);
            $jumlah = "Pencarian dengan nama <B>$kunci</B> ditemukan "."Data";
			
        } else {
            $query = $model;
            $jumlah = "";
			$query = $model->pencarian("");
        }
		$data['karyawan'] = $query->paginate(10);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['jumlah'] = $jumlah;
		
        echo view('karyawan/get',$data);
        
	}
	// public function cari()
    // {
    //     $users = new UserModel();
    //     $cari = $this->request->getGet('cari');
    //     $data = $users->where('country', $cari)->findAll();
    //     return view('hasil_pencarian', compact('data'));
    // }
	public function show($id){
		$model = new KaryawanModel();
		$data['data'] = $model->where([
			'id_karyawan' => $id
		])->first();
		return view('karyawan/_detail', $data);
	}
	public function new()
	{
		$query = $this->db->query("delete from tmprfid");
		return view('karyawan/new');
	}
	public function create()
	{
		$data = $this->request->getPost();

		$this->db->table('karyawan')->insert($data);

		if($this->db->affectedRows() > 0){
			return redirect()->to(site_url('karyawan'))->with('success', 'Data berhasil disimpan');
		}
	}
	public function edit($id=null)
	{
		if($id !=null){
			$query = $this->db->table('karyawan')->getWhere(['id_karyawan' => $id]);
			if($query->resultID->num_rows > 0){
				$data['karyawan'] = $query->getRow();
				return view('karyawan/edit', $data);
			} else {
				throw \Codeigniter\Exception\PageNotFoundException::forPageNotFound();
			}
		} else {
			throw \Codeigniter\Exception\PageNotFoundException::forPageNotFound();
		}
	}

	public function update($id)
	{
		$data = $this->request->getPost();
		unset($data['_method']);
		print_r($data);
		$this->db->table('karyawan')->where(['id_karyawan'=> $id])->update($data);
		return redirect()->to(site_url('karyawan'))->with('success', 'Data berhasil diedit');
	}

	public function delete($id)
	{
		$this->db->table('karyawan')->where(['id_karyawan'=> $id])->delete();
		return redirect()->to(site_url('karyawan'))->with('success', 'Data berhasil dihapus');
	}

	public function prosesExcel()
	{
		$file = $this->request->getFile('fileexcel');
		if($file){
			$excelReader  = new PHPExcel();
			//mengambil lokasi temp file
			$fileLocation = $file->getTempName();
			//baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);
			//ambil sheet activel
			$sheet	= $objPHPExcel->getActiveSheet()->toArray(true,true,true,true,true,true,true,true,true,true,true);
			//looping untuk mengambil data
			foreach ($sheet as $idx => $data) {
				//skip index 1 karena title excel
				if($idx==1){
					continue;
				}
				$nokartu = $data['A'];
				$nik = $data['B'];
				$nama_karyawan = $data['C'];
				$tgl_lahir = $data['D'];
				$alamat = $data['E'];
				$jk = $data['F'];
				$tgl_masuk = $data['G'];
				$status = $data['H'];
				$bagian = $data['I'];
				$jabatan = $data['J'];
				$total_cuti = $data['J'];
				// insert data
				$this->karyawan->insert([
					'nokartu'=>$nokartu,
					'nik'=>$nik,
					'nama_karyawan'=>$nama_karyawan,
					'tgl_lahir'=>$tgl_lahir,
					'alamat'=>$alamat, 
					'jk'=>$jk,
					'tgl_masuk'=>$tgl_masuk,
					'status'=>$status,
					'bagian'=>$bagian,
					'jabatan'=>$jabatan,
					'total_cuti'=>$total_cuti,
				]);
			}
		}
		session()->setFlashdata('message','Berhasil import excel');
		return redirect()->to('/karyawan');
		//return redirect()->to(site_url('karyawan'))->with('success', 'Data berhasil diexport');
	}
 
	public function exportPDF()
	{	
		//cara pertama tapi viewnya belum bisa menangkap html
		// $data=[
		// 'karyawan'=>$this->KaryawanModel()->Alldatapdf(),
		// ]; 
		
				  
		// // $builder = $this->db->table('karyawan');
        // // $query   = $builder->get(); 
		$query = $this->db->query("SELECT * FROM karyawan");
        $data['karyawan'] = $query->getResultArray();
		// echo "<pre>";
		// print_r($data);
		$html= view('karyawan/laporanpdf', $data);
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
 