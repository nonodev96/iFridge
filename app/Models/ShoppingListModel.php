<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingListModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'shopping_list';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDelete    = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'user_id',
        'name',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id' => 'required|numeric',
        'name'    => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllElementsBy($key, $value): array
    {
        return $this->where($key, $value)->findAll();
    }

    function exist_element($user_id, $key): bool
    {
        return $this
                ->where('name', $key)
                ->where('user_id', $user_id)
                ->countAllResults() > 0;
    }

    public function insert_object($data): bool
    {
        $status = false;
        try {
            if (!$this->exist_element($data['user_id'], $data['name'])) {
                $status = $this->save($data);
            }
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
        return $status;
    }

    public function update_object($data, $id)
    {
        try {
            $this->where($this->primaryKey, $id)->update($id, $data);
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
    }

    public function delete_object($id): bool
    {
        if ($this->where('id', $id)->countAllResults() > 0)
            return $this->where($this->primaryKey, $id)->delete() !== false;
        return false;
    }

}
