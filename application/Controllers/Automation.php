<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Automation extends Controller
{
	public function index()
	{
		return view('automation/home');
	}

	public function components()
	{
		return view('automation/components');
	}

	public function sockets()
	{
		return view('automation/sockets');
	}

	public function webSockets()
	{
		return view('automation/webSockets');
	}
}