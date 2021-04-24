<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tag extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tag_id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'label'  => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
            'url'    => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('tag_id', true);
        $this->forge->addUniqueKey('label');
        $this->forge->createTable('tags', true);
    }

    public function down()
    {
        $this->forge->dropTable('tags', true);
    }
}
