<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'username'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'pwd'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
					
				],
	]);
	$this->forge->addPrimaryKey('id_user', true);
	$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
