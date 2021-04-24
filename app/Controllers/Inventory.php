<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventoryModel;

class Inventory extends BaseController
{
    protected $inventory_model;

    public function __construct()
    {
        parent::__construct();
        $this->helpers = ['form'];
        $this->inventory_model = new InventoryModel();
    }

    public function index(): string
    {
        $data = [
            'inventory' => $this->inventory_model->findAll()
        ];
        view('pages/inventory', $data);
        return view('template/layout');
    }

    public function insert(): \CodeIgniter\HTTP\RedirectResponse
    {
        $to_return = [];
        if ($this->request->getPost('label')) {
            $data = array(
                'user_id'    => $this->request->getPost('user_id'),
                'tag_id'     => $this->request->getPost('tag_id'),
                'name'       => $this->request->getPost('name'),
                'amount'     => $this->request->getPost('amount'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date'   => $this->request->getPost('end_date'),
            );

            $status = $this->inventory_model->insert_object($data);
            $to_return = [
                'status' => $status,
            ];
        }
        return redirect()->back();
    }
}
