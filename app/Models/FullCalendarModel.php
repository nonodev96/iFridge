<?php

namespace App\Models;

use CodeIgniter\Model;

class FullCalendarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'full_calendar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDelete    = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'title',
        'user_id',
        'start_event',
        'end_event'
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

    function fetch_all_event(): array
    {
        return $this->findAll();
    }

    public function getAllElementsBy(string $key, $value): array
    {
        return $this->where($key, $value)->findAll();
    }

    function insert_event($data)
    {
        try {
            $this->insert($data);
        } catch (\ReflectionException $e) {
            //var_dump($e);
        }
    }

    function update_event($data, $id)
    {
        try {
            $this->where('id', $id)->update($id, $data);
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
    }

    function delete_event($id)
    {
        $this->where('id', $id)->delete($id);
    }

}
