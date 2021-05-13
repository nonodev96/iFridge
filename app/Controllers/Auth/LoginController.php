<?php

namespace App\Controllers\Auth;

use App\Models\HouseModel;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models\UserModel;

class LoginController extends Controller
{
    /**
     * Access to current session.
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * Authentication settings.
     */
    protected $config;


    //--------------------------------------------------------------------

    public function __construct()
    {
        // start session
        $this->session = Services::session();

        // load auth settings
        $this->config = config('App');
    }

    //--------------------------------------------------------------------

    /**
     * Displays login form or redirects if user is already logged in.
     */
    public function login()
    {
        if ($this->session->isLoggedIn) {
            return redirect()->to('account');
        }

        return view($this->config->views['login'], ['config' => $this->config]);
    }

    //--------------------------------------------------------------------

    /**
     * Attempts to verify user's credentials through POST request.
     */
    public function attemptLogin()
    {
        // validate request
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('login')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // check credentials
        $users = new UserModel();
        $user = $users->where('email', $this->request->getPost('email'))->first();
        if (
            is_null($user) ||
            !password_verify($this->request->getPost('password'), $user['password_hash'])
        ) {
            return redirect()->to('login')->withInput()->with('error', lang('Auth.wrongCredentials'));
        }

        // check activation
        if (!$user['active']) {
            return redirect()->to('login')->withInput()->with('error', lang('Auth.notActivated'));
        }
        $house_model = new HouseModel();
        $house = $house_model->where('user_id', $user['user_id'])->first();

        // login OK, save user data to session
        $this->session->set('isLoggedIn', true);
        $this->session->set('userData', [
            'user_id'   => $user['user_id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'new_email' => $user['new_email'],
            'role'      => $user['role'],
        ]);
        $this->session->set('houseData', [
            'user_id' => $house['user_id'],
            'name'    => $house['name'],
            'broker'  => $house['broker'],
            'port'    => $house['port'],
            'city'    => $house['city'],
        ]);

        return redirect()->to('account');
    }

    //--------------------------------------------------------------------

    /**
     * Log the user out.
     */
    public function logout()
    {
        $this->session->remove([
            'isLoggedIn',
            'userData',
            'houseData'
        ]);

        return redirect()->to('login');
    }

}
