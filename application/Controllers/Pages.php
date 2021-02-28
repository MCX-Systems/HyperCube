<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
	public function index()
	{
		return view('examples/pages/blank');
	}

	public function blank()
	{
		return view('examples/pages/blank');
	}

	public function profile()
	{
		return view('examples/pages/profile');
	}

	public function chat()
	{
		return view('examples/pages/chat');
	}

	public function ipCam()
	{
		return view('examples/pages/ipCam');
	}

	public function posts()
	{
		return view('examples/pages/post');
	}

	public function postsDetails()
	{
		return view('examples/pages/postDetail');
	}

	public function gallery()
	{
		return view('examples/pages/gallery');
	}

	public function product()
	{
		return view('examples/pages/product');
	}

	public function searchResults()
	{
		return view('examples/pages/searchResults');
	}

	public function fileManager()
	{
		return view('examples/pages/fileManager');
	}

	public function addressBook()
	{
		return view('examples/pages/addressBook');
	}

	public function call()
	{
		return view('examples/pages/call');
	}

	public function callVideo()
	{
		return view('examples/pages/callVideo');
	}

	public function priceBox()
	{
		return view('examples/pages/priceBox');
	}

	public function todo()
	{
		return view('examples/pages/todo');
	}

	public function property()
	{
		return view('examples/pages/property');
	}

	public function propertyList()
	{
		return view('examples/pages/propertyList');
	}

	public function innerLeft()
	{
		return view('examples/pages/innerLeft');
	}

	public function innerRight()
	{
		return view('examples/pages/innerRight');
	}

	public function settings()
	{
		return view('examples/pages/settings');
	}

	public function video()
	{
		return view('examples/pages/video');
	}

	public function videoDetail()
	{
		return view('examples/pages/videoDetail');
	}

	public function audio()
	{
		return view('examples/pages/audio');
	}

	public function audioDetail()
	{
		return view('examples/pages/audioDetail');
	}

	public function games()
	{
		return view('examples/pages/games');
	}

	public function gamePlay()
	{
		return view('examples/pages/gamePlay');
	}

	public function radio()
	{
		return view('examples/pages/radio');
	}
}