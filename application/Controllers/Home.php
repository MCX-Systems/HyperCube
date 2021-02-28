<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
	public function index()
	{
		return view('home');
	}

	//--------------------------------------------------------------------
	
	public function dashboard()
	{
		return view('dashboard');
	}

	public function fax()
	{
		return view('fax');
	}
	
	//--------------------------------------------------------------------
}