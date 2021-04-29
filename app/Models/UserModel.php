<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    // this happens first, model removes all other fields from input data
    protected $allowedFields = [
        'user_id',
        'name',
        'email',
        'new_email',
        'password',
        'password_confirm',
        'activate_hash',
        'reset_hash',
        'reset_expires',
        'active'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];

    // we need different rules for registration, account update, etc
    protected $dynamicRules = [
        'registration' => [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]',
            'password_confirm' => 'matches[password]'
        ],
        'updateAccount' => [
            'user_id' => 'required|is_natural_no_zero',
            'name' => 'required|min_length[2]'
        ],
        'changeEmail' => [
            'user_id' => 'required|is_natural_no_zero',
            'new_email' => 'required|valid_email|is_unique[users.email]',
            'activate_hash' => 'required'
        ]
    ];

    protected $validationMessages = [];

    protected $skipValidation = false;

    // this runs after field validation
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];


    //--------------------------------------------------------------------

    public function getUserBy(string $key, $value): array
    {
        return $this->where($key, $value)->limit(1)->find();
    }

    /**
     * Retrieves validation rule
     * @param string $rule
     * @return array
     */
    public function getRule(string $rule): array
    {
        return $this->dynamicRules[$rule];
    }

    //--------------------------------------------------------------------

    /**
     * Hashes the password after field validation and before insert/update
     * @param array $data
     * @return array
     */
    protected function hashPassword(array $data): array
    {
        if (!isset($data['data']['password'])) return $data;

        $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password']);
        unset($data['data']['password_confirm']);

        return $data;
    }

}
