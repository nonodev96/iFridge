<?php

namespace App\Controllers;


class Dashboard extends BaseController
{


    public function index()
    {
        $data['data'] = [];

        echo view('template/html_init', $data);
        echo view('template/html_header');
        echo view('template/dashboard');
        echo view('template/html_end');

        return '';
    }

}