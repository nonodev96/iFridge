<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function __constructor()
    {
        $this->db = \Config\Database::connect();
    }
    protected $db;
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = [
        'user_id', 'name', 'email', 'category_id', 'inventory_id'
    ];


    public function all()
    {
        $query = $this->db->query('SELECT * FROM user');
        $results = $query->getResult();
        return $results;
    }
}
