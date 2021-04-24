<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use Config\Email;
use Config\Services;
use App\Models\UserModel;

class RegistrationController extends Controller
{
    /**
     * Access to current session.
     *
     * @var Session
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
     * Displays register form.
     */
    public function register()
    {
        if ($this->session->isLoggedIn) {
            return redirect()->to('account');
        }

        return view($this->config->views['register'], ['config' => $this->config]);
    }

    //--------------------------------------------------------------------

    /**
     * Attempt to register a new user.
     */
    public function attemptRegister(): \CodeIgniter\HTTP\RedirectResponse
    {
        helper('text');

        // save new user, validation happens in the model
        $users = new UserModel();
        $getRule = $users->getRule('registration');
        $users->setValidationRules($getRule);
        $user = [
            'name'             => $this->request->getPost('name'),
            'email'            => $this->request->getPost('email'),
            'password'         => $this->request->getPost('password'),
            'password_confirm' => $this->request->getPost('password_confirm'),
            'activate_hash'    => random_string('alnum', 32)
        ];

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // send activation email
        helper('auth');
        $status = send_activation_email($user['email'], $user['activate_hash']);

        // success
        if ($status) {
            return redirect()->to('login')->with('success', lang('Auth.registrationSuccess'));
        } else {
            return redirect()->to('login')->with('success', lang('Auth.registrationFail'));
        }
    }

    //--------------------------------------------------------------------

    /**
     * Activate account.
     */
    public function activateAccount(): \CodeIgniter\HTTP\RedirectResponse
    {
        $users = new UserModel();

        // check token
        $user = $users->where('activate_hash', $this->request->getGet('token'))->where('active', 0)->first();

        if (is_null($user)) {
            return redirect()->to('login')->with('error', lang('Auth.activationNoUser'));
        }

        // update user account to active
        $updatedUser['user_id'] = $user['user_id'];
        $updatedUser['active'] = 1;
        $users->save($updatedUser);

        return redirect()->to('login')->with('success', lang('Auth.activationSuccess'));
    }

}
