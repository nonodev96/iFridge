<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Mqtt extends BaseController
{
    public function index()
    {
        view("mqtt/mqtt");
        return view("template/layout");
    }
}