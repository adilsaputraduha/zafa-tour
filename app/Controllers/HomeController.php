<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		$data = [
			'user' => 5,
			'peserta' => 5,
		];
		return view('view_home', $data);
	}
}
