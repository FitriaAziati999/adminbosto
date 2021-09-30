<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cuti extends Migration
{
	public function up()
	{
		$this->forge->addField([
				'id_cuti'          => [
						'type'           => 'INT',
						'constraint'     => 5,
						'unsigned'       => true,
						'auto_increment' => true,
				],
				'id_karyawan'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					
					
				],
				
				'sisa_cuti'       => [
					'type'           => 'DECIMAL',
					'constraint'     => 2,
		
					
				],
				
		]);
		$this->forge->addKey('id_cuti', true);
		$this->forge->createTable('cuti');
}//
	public function down()
	{
		$this->forge->dropTable('cuti');
	}
}
