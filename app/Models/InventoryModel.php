<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'inventory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDelete    = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'tag_id',
        'user_id',
        'name',
        'amount',
        'start_date',
        'end_date',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tag_id'     => 'required|numeric',
        'user_id'    => 'required|numeric',
        'name'       => 'required|alpha_numeric_space',
        'amount'     => 'required|numeric',
        'start_date' => 'required|regex_match[([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))]',
        'end_date'   => 'required|regex_match[([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))]',
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


    function fetch_all_inventory(): array
    {
        return $this->findAll();
    }

    function getAllElementsBy($key, $value): array
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


    function insert_object($data): bool
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

    function update_object($data, $id)
    {
        try {
            $this->where($this->primaryKey, $id)->update($id, $data);
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
    }

    function delete_object($id): bool
    {
        if ($this->where('id', $id)->countAllResults() > 0)
            return $this->where($this->primaryKey, $id)->delete() !== false;
        return false;
    }

}
