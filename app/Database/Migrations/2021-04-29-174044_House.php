<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class House extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'house_id'  => [
                'type'           => 'int',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'user_id'   => [
                'type'       => 'int',
                'constraint' => 11,
            ],
            'name'      => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
            'broker'      => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
            'port'      => [
                'type'       => 'int',
                'constraint' => 5
            ],
            'city'      => [
                'type'       => 'varchar',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('house_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('houses', true);

        $this->db->query(
<<<EOC
INSERT INTO `houses` (`house_id`, `user_id`, `name`, `broker`, `port`, `city`) VALUES
(1, 1, 'nonodev96', 'broker.emqx.io', '8084', 'jaen');
EOC
        );
    }

    public function down()
    {
        $this->forge->dropTable('houses', true);
    }
}
