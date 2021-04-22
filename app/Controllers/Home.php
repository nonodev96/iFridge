<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\MyCustomClass;
use App\Libraries\CiQrCode;

class Home extends BaseController
{


    public function index()
    {
        view("calendar/calendar");
        return view("template/layout");
    }


}
