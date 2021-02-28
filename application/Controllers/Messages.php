<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Messages extends Controller
{
	public function index()
	{
		return view('messages/index');
	}

	public function inbox()
	{
		return view('messages/inbox');
	}

	public function outbox()
	{
		return view('messages/outbox');
	}

	public function trash()
	{
		return view('messages/trash');
	}

	public function compose()
	{
		return view('messages/compose');
	}

	public function read()
	{
		return view('messages/read');
	}
}