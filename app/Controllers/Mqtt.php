<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Mqtt extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): string
    {
        view("pages/mqtt");
        return view("template/layout");
    }
}