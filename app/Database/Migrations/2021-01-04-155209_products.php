<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'name' => [
                'type'  => 'VARCHAR',
                'constraint' => 50
            ],
            'price' => [
                'type'  => 'INT',
                'constraint' => 11
            ],
            'stock' => [
                'type'  => 'INT',
                'constraint' => 11
            ],
            'weight' => [
                'type'  => 'DOUBLE',
            ],
            'description' => [
                'type'  => 'TEXT'
            ],
            'photo' => [
                'type'  => 'VARCHAR',
                'constraint' => 50
            ]
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('products');
    }

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}