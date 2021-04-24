<?php


namespace App\Controllers;


use App\Libraries\CiQrCode;
use App\Models\TagModel;

class QR_Controller extends BaseController
{
    protected $tag_model;

    public function __construct()
    {
        parent::__construct();
        $this->tag_model = new TagModel();
    }

    public function index(): string
    {
        $this->tag_model = new TagModel();
        $data = [
            'qr_list' => $this->tag_model->fetch_all_tags()
        ];
        view('pages/qr', $data);
        return view('template/layout');
    }

    public function insert(): \CodeIgniter\HTTP\RedirectResponse
    {
        $to_return = [];
        if ($this->request->getPost('label')) {
            $qr_object = $this->_generateQrcode($this->request->getPost('label'));
            $data = array(
                'label' => $this->request->getPost('label'),
                'url'   => $qr_object['file']
            );

            $status = $this->tag_model->insert_tag($data);
            $to_return = [
                'status' => $status,
                'url'    => $qr_object['file']
            ];
        }
        return redirect()->back();
    }

    public function delete(): \CodeIgniter\HTTP\RedirectResponse
    {
        $to_return = [];
        if ($this->request->getPost('tag_id') != null) {
            $this->tag_model->delete_event($this->request->getPost('tag_id'));
            $to_return = [
                'status' => 'ok'
            ];
        }
        return redirect()->back();
    }

    private function _generateQrcode($data = "titulo"): array
    {
        $qrcode = new CiQrCode();

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
        $qrcode->initialize($config);

        /* QR Data  */
        $params['data'] = $data;
        $params['level'] = 'L';
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $saveName;

        $qrcode->generate($params);

        /* Return Data */
        return [
            'content' => $data,
            'file'    => $dir . $saveName,
        ];

    }
}