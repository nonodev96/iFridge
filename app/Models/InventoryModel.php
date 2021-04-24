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
        'user_id',
        'tag_id',
        'name',
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
    protected $validationRules      = [];
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

    function exist_tag($key): bool
    {
        $this->where('label', $key);
        if ($this->countAllResults() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function insert_object($data): bool
    {
        $status = false;
        try {
            if (!$this->exist_tag($data['label'])) {
                $status = $this->insert($data);
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

    function delete__object($id)
    {
        $this->where($this->primaryKey, $id)->delete($id);
    }

}
