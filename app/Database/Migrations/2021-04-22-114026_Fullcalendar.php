<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fullcalendar extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'				    => ['type' => 'varchar', 'constraint' => 255],
            'start_event'           => ['type' => 'datetime'],
            'end_event'			    => ['type' => 'datetime'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('full_calendar', true);
	}

	public function down()
	{
        $this->forge->dropTable('full_calendar', true);

    }
}
