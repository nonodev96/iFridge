<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Dashboard extends BaseController
{


    public function index()
    {
        $data['data'] = [];
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                      'email'    => 'required|min_length[6]|max_length[50]|valid_email',
                      'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
                     ];

            $errors = [
                       'password' => ['validateUser' => 'Email or Password don\'t match'],
                      ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();


                $this->_setUserSession($user);
                // $session->setFlashdata('success', 'Successful Registration');
                $redirect = redirect();
                $redirect->to('dashboard');
                return $redirect;
            }
        }

        echo view('template/html_init', $data);
        echo view('template/html_header');
        echo view('template/dashboard');
        echo view('auth/login');
        echo view('template/html_end');

        return '';

    }

    private function _setUserSession(array $user)
    {
        var_dump($user);
    }


}