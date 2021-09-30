<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absensi extends Migration
{
	public function up()
	{
		
			$this->forge->addField([
					'id_absensi'          => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => true,
							'auto_increment' => true,
					],
					'nokartu'          => [
						'type'       => 'VARCHAR',
						'constraint' => '20',
							
					],
					
					'tanggal'       => [
						'type'       => 'DATE',
					],
					'jam_masuk' => [
						'type' => 'TIME',
						'null'           => true,
					],
					'jam_istirahat' => [
						'type' => 'TIME',
						'null'           => true,
					],
					
					'jam_kembali'       => [
						'type' => 'TIME',
						'null'           => true,
					],
					'jam_pulang'       => [
						'type' => 'TIME',
						'null'           => true,
					],
				
			]);
			$this->forge->addKey('id_absensi', true);
			$this->forge->createTable('absensi');
	//
	}

	public function down()
	{
		$this->forge->dropTable('absensi');//
	}
}
