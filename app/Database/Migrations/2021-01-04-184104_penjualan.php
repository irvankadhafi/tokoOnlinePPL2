<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'VARCHAR',
                'constraint' => 8
            ],
            'total_pembayaran' => [
                'type'  => 'FLOAT',
                'constraint' => 20
            ],
            'status_pembayaran' => [
                'type'  => 'BOOLEAN',
            ],
            'waktu_transaksi' => [
                'type'  => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('penjualan');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //
    }
}