<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventoryModel;

class Cron extends BaseController
{
    protected $inventory_model;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->inventory_model = new InventoryModel();
        $emails = $this->inventory_model->prepareEmails();

        $user_ids = $this->groupBy('user_id', $emails);

        foreach ($user_ids as $key => $value) {
            $email = $value[0]['user_email'];
            $name = $value[0]['name'];
            $user_name = $value[0]['user_name'];
            $tag_url = $value[0]['tag_url'];
            $htmlMessage = "<p>Buenas ${user_name}</p>";
            $htmlMessage .= "<p>Los siguientes productos caducan hoy:.</p>";
            $htmlMessage .= "<ul>";
            foreach ($value as $item) {
                $htmlMessage .= "<li>";
                $htmlMessage .= "<p>${item['name']} - ${item['end_date']}</p>";
//                $htmlMessage .= "<img src='${tag_url}'>";
                $htmlMessage .= "</li>";
            }
            $htmlMessage .= "</ul>";

            $this->send_email($email, $htmlMessage);
        }
    }

    private function send_email($to, $htmlMessage)
    {
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setSubject("Cron");
        $email->setMessage($htmlMessage);
        $email->setFrom("noreply@ifridge.com");

        return $email->send();
    }

    private function groupBy($key, $data): array
    {
        $result = array();

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }
}
