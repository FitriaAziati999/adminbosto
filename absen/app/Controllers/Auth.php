<?php

namespace App\Controllers;

class Auth extends BaseController
{
	
	public function index()
	{
		return redirect()->to(site_url('login'));
	}
	public function login()
	{
		if(session('id_user')){
			return redirect()->to(site_url('home'));
		}
		echo view ('layout/login');
	}
	public function loginproses()
	{
		$post = $this->request->getPost();
		$query =$this->db->table('user')->getWhere(['username'=> $post['username']]);
		$user=$query->getRow();
		if($user){
			if (password_verify($post['pwd'],$user->pwd)){
				$params=['id_user'=>$user->id_user];
				session()->set($params);
				return redirect()->to(site_url('home'));
			}else{
				return redirect()->back()->with('error','password salah');
			}
		}else{
			return redirect()->back()->with('error','username tidak ditemukan');
		} 
		
	}

	public function logout()
	{
		// session()->remove('id_user');
		// return redirect()->to(site_url('login'));
		session()->destroy();
        return redirect()->to('/login');
	}
}
   