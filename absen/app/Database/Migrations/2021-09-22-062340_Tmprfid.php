<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tmprfid extends Migration
{
	public function up()
	
		{
			$this->forge->addField([
					'nokartu'          => [
						'type'       => 'VARCHAR',
						'constraint' => '20',
							
				],
					
			]);
			$this->forge->addKey('nokartu', true);
			$this->forge->createTable('tmprfid');
	}//
	

	public function down()
	{
		$this->forge->dropTable('tmprfid');
	}
}
