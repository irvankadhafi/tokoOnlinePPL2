<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class ProsesJual extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan' => [
                'type'  => 'VARCHAR',
                'constraint' => 8,
            ],
            'id_produk' => [
                'type'  => 'INT',
                'constraint' => 11,
            ],
            'price' => [
                'type'  => 'INT',
                'constraint' => 11
            ],
            'qty' => [
                'type'  => 'INT',
                'constraint' => 11
            ],
        ]);
        $this->forge->addForeignKey('id_penjualan','penjualan','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('id_produk','products','id');
        $this->forge->createTable('proses_jual');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //
    }
}