<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sensors extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'sensor_id'  => [
                'type'           => 'int',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'house_id'   => [
                'type'       => 'int',
                'constraint' => 11,
            ],
            'name'      => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
            'url'      => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('sensor_id', true);
        $this->forge->addForeignKey('house_id', 'houses', 'house_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sensors', true);
	}

	public function down()
	{
        $this->forge->dropTable('sensors', true);
	}
}
