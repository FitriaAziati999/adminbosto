<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statuss extends Migration
{
	public function up()
	
		{
			$this->forge->addField([
					'mode'          => [
						'type'           => 'INT',
						'constraint'     => 11,
							
				],
					
			]);
			$this->forge->addKey('mode', true);
			$this->forge->createTable('statuss');
	}//
	

	public function down()
	{
		$this->forge->dropTable('statuss');
	}
}
