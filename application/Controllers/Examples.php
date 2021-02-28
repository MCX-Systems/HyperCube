<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Examples extends Controller
{
	public function index()
	{
		return view('examples/dashboard');
	}

	//--------------------------------------------------------------------

	public function data()
	{
		return view('examples/widgets/data');
	}

	//--------------------------------------------------------------------

	public function jsTree()
	{
		return view('examples/plugins/jsTree');
	}

	public function barCodes()
	{
		return view('examples/plugins/barcode');
	}

	public function cycle()
	{
		return view('examples/plugins/cycle');
	}

	public function prism()
	{
		return view('examples/plugins/prism');
	}

	public function rangeSlider()
	{
		return view('examples/plugins/rangeSlider');
	}

	public function roundSlider()
	{
		return view('examples/plugins/roundSlider');
	}

	public function letterFX()
	{
		return view('examples/plugins/letterFX');
	}

	public function calendar()
	{
		return view('examples/plugins/calendar');
	}

	public function googleMaps()
	{
		return view('examples/plugins/googleMaps');
	}

	public function highSlide()
	{
		return view('examples/plugins/highSlide');
	}

	public function indicators()
	{
		return view('examples/plugins/indicators');
	}

	public function pickers()
	{
		return view('examples/plugins/pickers');
	}

	public function vectorMaps()
	{
		return view('examples/plugins/vectorMaps');
	}

	public function charts()
	{
		return view('examples/plugins/charts');
	}

	public function sparkLine()
	{
		return view('examples/plugins/sparkLine');
	}

	public function knob()
	{
		return view('examples/plugins/knob');
	}

	public function tinyMCE()
	{
		return view('examples/plugins/tinyMCE');
	}

	public function cropper()
	{
		return view('examples/plugins/cropper');
	}

	public function upLoaders()
	{
		return view('examples/plugins/upLoaders');
	}

	public function xEditable()
	{
		return view('examples/plugins/xEditable');
	}

	public function ticker()
	{
		return view('examples/plugins/ticker');
	}

	public function rating()
	{
		return view('examples/plugins/rating');
	}

	public function toolbar()
	{
		return view('examples/plugins/toolbar');
	}

	//--------------------------------------------------------------------

	public function core()
	{
		return view('examples/ui/core');
	}

	//--------------------------------------------------------------------

	public function animations()
	{
		return view('examples/ui/animations');
	}

	public function icons()
	{
		return view('examples/ui/icons');
	}

	public function fonts()
	{
		return view('examples/ui/fonts');
	}

	public function alerts()
	{
		return view('examples/ui/alerts');
	}

	public function avatars()
	{
		return view('examples/ui/avatars');
	}

    public function badges()
	{
		return view('examples/ui/badges');
	}

	public function blockQuote()
	{
		return view('examples/ui/blockQuote');
	}

	public function bootstrap()
	{
		return view('examples/ui/bootstrap');
	}

	public function button()
	{
		return view('examples/ui/button');
	}

	public function buttons()
	{
		return view('examples/ui/buttons');
	}

	public function cards()
	{
		return view('examples/ui/cards');
	}

	public function colors()
	{
		return view('examples/ui/colors');
	}

	public function counters()
	{
		return view('examples/ui/counters');
	}

	public function embed()
	{
		return view('examples/ui/embed');
	}

	public function dropdown()
	{
		return view('examples/ui/dropdown');
	}

	public function loaders()
	{
		return view('examples/ui/loaders');
	}

	public function grid()
	{
		return view('examples/ui/grid');
	}

	public function hoverer()
	{
		return view('examples/ui/hoverer');
	}

	public function lists()
	{
		return view('examples/ui/lists');
	}

	public function feeds()
	{
		return view('examples/ui/feeds');
	}

	public function forms()
	{
		return view('examples/ui/forms');
	}

	public function formsLayouts()
	{
		return view('examples/ui/formsLayouts');
	}

	public function formsWizards()
	{
		return view('examples/ui/formsWizards');
	}

	public function modals()
	{
		return view('examples/ui/modals');
	}

	public function progress()
	{
		return view('examples/ui/progress');
	}

	public function ribbons()
	{
		return view('examples/ui/ribbons');
	}

	public function scr()
	{
		return view('examples/ui/switches');
	}

	public function shadows()
	{
		return view('examples/ui/shadows');
	}

	public function tables()
	{
		return view('examples/ui/tables');
	}

	public function tabs()
	{
		return view('examples/ui/tabs');
	}

	public function testimonial()
	{
		return view('examples/ui/testimonial');
	}

	public function tooltips()
	{
		return view('examples/ui/tooltips');
	}

	public function typography()
	{
		return view('examples/ui/typography');
	}

	//--------------------------------------------------------------------
}