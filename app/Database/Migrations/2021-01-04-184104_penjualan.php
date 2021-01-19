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
            'nama_pembeli' => [
                'type'  => 'VARCHAR',
                'constraint' => 255
            ],
            'alamat_pembeli' => [
                'type'  => 'TEXT'
            ],
            'kecamatan_pembeli' => [
                'type'  => 'VARCHAR',
                'constraint' => 255
            ],
            'kota_tujuan' => [
                'type'  => 'VARCHAR',
                'constraint' => 255
            ],
            'telp_pembeli' => [
                'type'  => 'VARCHAR',
                'constraint' => 20
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
//        $this->forge->addForeignKey('kecamatan_pembeli','ongkir','kecamatan_tujuan');
        $this->forge->createTable('penjualan');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //
    }
}