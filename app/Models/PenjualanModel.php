<?php

namespace App\Models;
use CodeIgniter\Model;

class PenjualanModel extends Model{

    protected $table = "penjualan";
    protected $primaryKey = "id";

    public function getDataPenjualan()
    {
        $query = $this->db->query("SELECT * FROM ".$this->table);
        $results = $query->getResult('array');

        return $results;
    }

    //function mendapatkan id terakhir
    public function get_idmax()
    {
        $query = $this->db->query('SELECT MAX(id) as id FROM '.$this->table);
        $results = $query->getResult();
        return $results;
    }

    //function membuat prefix di id penjualan
    public function get_newid($auto_id, $prefix)
    {
        $newID = substr($auto_id, 4,8); //TRX00001
        $tambah = (int)$newID + 1;
        if (strlen($tambah)==1){
            $id_penjualan = $prefix."0000".$tambah;
        }
        elseif (strlen($tambah)==2){
            $id_penjualan = $prefix."000".$tambah;
        }
        elseif (strlen($tambah)==3){
            $id_penjualan = $prefix."00".$tambah;
        }
        elseif (strlen($tambah)==4){
            $id_penjualan = $prefix."0".$tambah;
        }
        elseif (strlen($tambah)==5){
            $id_penjualan = $prefix . $tambah;
        }
        return $id_penjualan;
    }

    //Function untuk insert ke penjualan
    public function insertPenjualan($data) //Insert or Update
    {
        $id = $data['idtrx'];
        $total = $data['total'];
        $totalHargaOngkir = $data['total_harga_ongkir'];
        $namaPembeli = $data['penerima'];
        $alamatPembeli = $data['alamat'];
        $kecamatanPembeli = $data['kecamatan'];
        $kotaPembeli = $data['kota'];
        $hpPembeli = $data['nohp'];
        $status = 0;
        $this->db->query("INSERT INTO penjualan(id, total_harga_barang,total_harga_ongkir, status_pembayaran, nama_pembeli, alamat_pembeli, 	id_kecamatan_pembeli, kota_tujuan, telp_pembeli) VALUES ('$id','$total','$totalHargaOngkir','$status','$namaPembeli','$alamatPembeli','$kecamatanPembeli','$kotaPembeli','$hpPembeli')");
    }
}