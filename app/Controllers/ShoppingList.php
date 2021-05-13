<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShoppingListModel;

class ShoppingList extends BaseController
{
    protected $shopping_list_model;

    public function __construct()
    {
        parent::__construct();
        $this->helpers = ['form'];
        $this->shopping_list_model = new ShoppingListModel();
    }

    public function index(): string
    {
        $user_id = $this->session->get('userData.user_id');
        $data = [
            'shopping_list' => $this->shopping_list_model->getAllElementsBy('user_id', $user_id),
            'user_id'       => $user_id
        ];
        view('pages/shopping_list', $data);
        return view('template/layout');
    }

    public function insert(): \CodeIgniter\HTTP\RedirectResponse
    {
        $data = array(
            'user_id' => $this->request->getPost('user_id'),
            'name'    => $this->request->getPost('name'),
        );
        $status = $this->shopping_list_model->insert_object($data);
        if ($status === FALSE) {
            return redirect()->to('/ShoppingList')->with('errors', $this->shopping_list_model->errors());
        }
        return redirect()->to('/ShoppingList')->with('success', lang('Form.added'));
    }

    public function delete(): \CodeIgniter\HTTP\RedirectResponse
    {
        $data = array(
            'id' => $this->request->getPost('id'),
        );
        $status = $this->shopping_list_model->delete_object($data['id']);
        if ($status === FALSE) {
            return redirect()->to('/ShoppingList')->with('errors', $this->shopping_list_model->errors());
        }
        return redirect()->to('/ShoppingList')->with('success', lang('Form.deleted'));
    }
}
