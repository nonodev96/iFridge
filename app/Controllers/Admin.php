<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventoryModel;
use App\Models\TagModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): string
    {
        $data = [];
        $user_model = new UserModel();
        $inventory_model = new InventoryModel();
        $tag_model = new TagModel();
        $data = [
            'users'     => $user_model->findAll(),
            'inventory' => $inventory_model->findAll(),
            'tags'      => $tag_model->findAll()
        ];
        view('pages/admin', $data);
        return view('template/layout');
    }
}
