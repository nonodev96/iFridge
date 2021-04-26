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
        'name'       => 'required',
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


    public function fetch_all_inventory(): array
    {
        return $this->findAll();
    }

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

    public function prepareEmails(): array
    {
        $this->select('inventory.name as name');
        $this->select('users.user_id as user_id');
        $this->select('tags.tag_id as tag_id');
        $this->select('inventory.name as object_name');
        $this->select('users.name as user_name');
        $this->select('users.email as user_email');
        $this->select('tags.label as tag_name');
        $this->select('tags.url as tag_url');
        $this->select('inventory.start_date as start_date');
        $this->select('inventory.end_date as end_date');
        $this->join('users', 'users.user_id = inventory.user_id');
        $this->join('tags', 'tags.tag_id = inventory.tag_id');
        $this->where("DATE(inventory.end_date)", date('Y-m-d'));
        return $this->get()->getResultArray();
    }

}
