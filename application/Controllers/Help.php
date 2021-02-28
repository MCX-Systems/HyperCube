<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Help extends Controller
{
	public function index()
	{
		return view('help');
	}
}