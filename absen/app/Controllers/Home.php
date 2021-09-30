<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        // echo "home gaes";
		// print_r($_SESSION);
		echo view('home');
	}
}
