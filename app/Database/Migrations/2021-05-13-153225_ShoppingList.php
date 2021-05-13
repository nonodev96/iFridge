<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ShoppingList extends Migration
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
            'name'       => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('shopping_list', true);
	}

	public function down()
	{
        $this->forge->dropTable('shopping_list', true);
    }
}
