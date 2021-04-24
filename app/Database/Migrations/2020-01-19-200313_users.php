<?php

namespace Auth\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'       => [
                'type'           => 'int',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'email'         => [
                'type'       => 'varchar',
                'constraint' => 191
            ],
            'new_email'     => [
                'type'       => 'varchar',
                'constraint' => 191,
                'null'       => true
            ],
            'password_hash' => [
                'type'       => 'varchar',
                'constraint' => 191
            ],
            'name'          => [
                'type'       => 'varchar',
                'constraint' => 191
            ],
            'activate_hash' => [
                'type'       => 'varchar',
                'constraint' => 191,
                'null'       => true
            ],
            'reset_hash'    => [
                'type'       => 'varchar',
                'constraint' => 191,
                'null'       => true
            ],
            'reset_expires' => [
                'type' => 'bigint',
                'null' => true
            ],
            'active'        => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'null'       => 0,
                'default'    => 0
            ],
            'role'          => [
                'type'       => 'tinyint',
                'constraint' => 1,
                'null'       => true
            ],
            'created_at'    => [
                'type' => 'bigint',
                'null' => true
            ],
            'updated_at'    => [
                'type' => 'bigint',
                'null' => true
            ]
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);

        $this->db->query(
            <<<EOC
INSERT INTO `users` (`user_id`, `email`, `new_email`, `password_hash`, `name`, `activate_hash`, `reset_hash`, `reset_expires`, `active`, `role`, `created_at`, `updated_at`) VALUES
(1, 'nonodev96@gmail.com', NULL, '$2y$10\$q29owR6dzaZWb3C8kzUxoOJHe4q72LINBw5tPSJuFf90QLkn14S7W', 'Antonio Mudarra Machuca', 'Op9SWeqkrncPzDH2aLV4UFX3TZYwt5ul', NULL, NULL, 1, 1, 1619205036, 1619205052);
EOC
        );

    }


    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
