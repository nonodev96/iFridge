<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tags';
    protected $primaryKey       = 'tag_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDelete    = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tag_id',
        'label',
        'url'
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


    function fetch_all_tags(): array
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


    function insert_tag($data): bool
    {
        $status = false;
        try {
            if (!$this->exist_tag($data['label'])) {
                $status = $this->insert($data);
            }
        } catch (\ReflectionException $e) {
            //var_dump($e);
        }
        return $status;
    }

    function update_tag($data, $id)
    {
        try {
            $this->where('tag_id', $id)->update($id, $data);
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
    }

    function delete_event($id)
    {
        $this->where('tag_id', $id)->delete($id);
    }

}
