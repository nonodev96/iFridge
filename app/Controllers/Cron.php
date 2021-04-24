<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cron extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): string
    {
        $this->send_activation_email("nonodev96@gmail.com", "Send email");
        return "var_dump(true)";
    }

    private function send_activation_email($to, $htmlMessage)
    {

        $email = \Config\Services::email();
        //		$email->initialize([
        //			'mailType' => 'html'
        //		]);

        $email->setTo($to);
        $email->setSubject("Tests");
        $email->setMessage($htmlMessage);
        $email->setFrom("noreply@ifridge.com");

        return $email->send();
    }
}
