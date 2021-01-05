<?php

namespace App\Models;
use CodeIgniter\Model;

class ProsesJualModel extends Model{

    protected $table = "proses_jual";

    public function insertProsesJual($data)
    {
        $id = $data['idtrx'];
        $items = $data['items'];
        foreach($items as $key => $item) {
            $productId = $item['id'];
            $productPrice = $item['price'];
            $productQty = $item['quantity'];
            $this->db->query("INSERT INTO proses_jual(id_penjualan, id_produk, price, qty) VALUES ('$id','$productId','$productPrice','$productQty')");
        }
    }

}