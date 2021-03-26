<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        //view('welcome_message');

        $data = [
            'lastentities' => $userModel->findAll(),
            'variable' => 'Funciona',
        ];
        echo view('template/html_init');
        echo view('template/index', $data);
        echo view('template/html_end');
        /*
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'http://example.com', ['allow_redirects' => false]);
        var_dump($response);
        */
    }
}
