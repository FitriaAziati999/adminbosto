<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
class Karyawan extends BaseController
{
	public function index()
	{
        
        // $builder = $this->db->table('karyawan');
        // $query   = $builder->get(); 
		$query = $this->db->query("SELECT * FROM karyawan");
        $data['karyawan'] = $query->getResult();
		return view('karyawan/get', $data);
        
	}
	public function show($id){
		$model = new KaryawanModel();
		$data['data'] = $model->where([
			'id_karyawan' => $id
		])->first();
		return view('karyawan/_detail', $data);
	}
	public function new()
	{
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
			$query = $this->db->table('karyawan')->getWhere(['$id_karyawan' => $id]);
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

		$this->db->table('karyawan')->where(['id_karyawan'=> $id])->update($data);
		return redirect()->to(site_url('karyawan'))->with('success', 'Data berhasil diedit');
	}
}
