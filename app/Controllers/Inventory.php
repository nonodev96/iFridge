<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventoryModel;
use App\Models\TagModel;

class Inventory extends BaseController
{
    protected $inventory_model;
    protected $tag_model;

    public function __construct()
    {
        parent::__construct();
        $this->helpers = ['form'];

        $this->inventory_model = new InventoryModel();
        $this->tag_model = new TagModel();
    }

    public function index(): string
    {
        $user_id = $this->session->get('userData.user_id');
        $data = [
            'inventory' => $this->inventory_model->getAllElementsBy('user_id', $user_id),
            'tags'      => $this->tag_model->findAll(),
            'user_id'   => $user_id
        ];
        view('pages/inventory', $data);
        return view('template/layout');
    }

    public function insert(): \CodeIgniter\HTTP\RedirectResponse
    {
        $data = array(
            'user_id'    => $this->request->getPost('user_id'),
            'tag_id'     => $this->request->getPost('tag_id'),
            'name'       => $this->request->getPost('name'),
            'amount'     => $this->request->getPost('amount'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date'   => $this->request->getPost('end_date'),
        );
        $status = $this->inventory_model->insert_object($data);
        if ($status === FALSE) {
            return redirect()->to('/inventory')->with('errors', $this->inventory_model->errors());
        }
        return redirect()->to('/inventory')->with('success', lang('Form.added'));
    }

    public function delete(): \CodeIgniter\HTTP\RedirectResponse
    {
        $data = array(
            'id' => $this->request->getPost('id'),
        );
        $status = $this->inventory_model->delete_object($data['id']);
        if ($status === FALSE) {
            return redirect()->to('/inventory')->with('errors', $this->inventory_model->errors());
        }
        return redirect()->to('/inventory')->with('success', lang('Form.deleted'));
    }
}
