<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
	public function up()
	
		{
			$this->forge->addField([
					'id_karyawan'          => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => true,
							'auto_increment' => true,
					],
					'nokartu'          => [
						'type'       => 'VARCHAR',
						'constraint' => '20',
							
				],
					'nik'          => [
						'type'           => 'INT',
						'constraint'     => 16,
					],
					'nama_karyawan'       => [
							'type'       => 'VARCHAR',
							'constraint' => '100',
							
					],
					'tgl_lahir'       => [
						'type'       => 'DATE',
			
						
					],
					'alamat' => [
						'type' => 'TEXT',
						'null' => true,
					],
					'jk'       => [
						'type'       => 'VARCHAR',
						'constraint' => '10',
						
					],
					'tgl_masuk'       => [
						'type'       => 'DATE',
						
						
					],
					'status'       => [
						'type'       => 'VARCHAR',
						'constraint' => '25',
						
					],
					'bagian'       => [
						'type'       => 'VARCHAR',
						'constraint' => '25',
						
					],
			]);
			$this->forge->addKey('id_karyawan', true);
			$this->forge->createTable('karyawan');
	}//
	

	public function down()
	{
		$this->forge->dropTable('karyawan');
	}
}
