<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\MyCustomClass;
use App\Libraries\CiQrCode;

class Home extends BaseController
{

    public $mqtt;

    public $m;


    public function mqtt()
    {
        echo view("template/header");
        echo view("mqtt/mqtt");
    }


    public function index()
    {
        echo view("calendar");
    }

    private function _generateQrcode($data = "titulo"): array
    {
        $ciqrcode = new CiQrCode();

        /* Data */
        $hexData = bin2hex($data);
        $saveName = $hexData . '.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, TRUE);
        }

        /* QR Configuration  */
        $config['cacheable'] = TRUE;
        $config['imagedir'] = $dir;
        $config['quality'] = TRUE;
        $config['size'] = '1024';
        $config['black'] = [
            255,
            255,
            255,
        ];
        $config['white'] = [
            255,
            255,
            255,
        ];
        $ciqrcode->initialize($config);

        /* QR Data  */
        $params['data'] = $data;
        $params['level'] = 'L';
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $saveName;

        $ciqrcode->generate($params);

        /* Return Data */
        return [
            'content' => $data,
            'file'    => $dir . $saveName,
        ];

    }


}
