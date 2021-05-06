<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\MyCustomClass;
use App\Libraries\CiQrCode;

class Home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): string
    {
        view("pages/house");
        return view("template/layout");
    }

    public function debug(): string
    {
        return view("template/debug");;
    }


}
