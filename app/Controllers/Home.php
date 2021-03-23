<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//view('welcome_message');
		return view('welcome');
	}
}
