<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'int',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'user_id'    => [
                'type'       => 'int',
                'constraint' => 11,
            ],
            'tag_id'     => [
                'type'       => 'int',
                'constraint' => 11,
            ],
            'name'       => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
            'amount'     => [
                'type'       => 'int',
                'constraint' => 10
            ],
            'start_date' => ['type' => 'datetime'],
            'end_date'   => ['type' => 'datetime'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'tag_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('inventory', true);
    }

    public function down()
    {
        $this->forge->dropTable('inventory', true);
    }
}
