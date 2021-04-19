<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * User Model
 *
 * @category  Model
 * @package   IFridge
 * @author    nonodev96 <nonodev96@gmail.com>
 * @copyright 2017 British Columbia Institute of Technology
 * @license   https://github.com/bcit-ci/CodeIgniter4-Standard/blob/master/LICENSE MIT License
 * @link      /UserModel
 */
class User extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
             'user_id'      => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE,
             ],
             'name'         => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
             ],
             'email'        => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
             ],
             'password'     => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
             ],
             'category_id'  => [
                                'type'       => 'INT',
                                'constraint' => 5,
                                'unsigned'   => TRUE,
             ],
             'inventory_id' => [
                                'type'       => 'INT',
                                'constraint' => 5,
                                'unsigned'   => TRUE,
             ],
            ]
        );
        $this->forge->addKey('user_id', TRUE);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');

        //
    }
}
