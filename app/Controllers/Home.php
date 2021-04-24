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
        view("pages/calendar");
        return view("template/layout");
    }


}
