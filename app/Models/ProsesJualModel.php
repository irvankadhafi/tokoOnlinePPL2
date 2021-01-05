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

            $productStock = $this->db->table('products')->where('id', $productId)->get()->getRowArray();
            $nowStock = $productStock['stock'] - $productQty;

            $this->db->query("UPDATE products SET stock = '$nowStock' where id = '$productId'");
            $this->db->query("INSERT INTO proses_jual(id_penjualan, id_produk, price, qty) VALUES ('$id','$productId','$productPrice','$productQty')");
        }
    }

}