<?php


namespace App\Controllers;


use App\Libraries\Ciqrcode;

class QR_Controller extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {

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