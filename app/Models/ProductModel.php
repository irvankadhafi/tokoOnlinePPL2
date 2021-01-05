<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model{

    protected $table = "products";
    protected $primaryKey = "id";

    public function getProduct($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

    public function create($data) //Insert or Update
    {
        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $weight = $data['weight'];
        $description = $data['description'];
        $photo = $data['photo'];

        $this->db->query("INSERT INTO ".$this->table." (name, price, stock, weight, description, photo) VALUES ('$name', '$price', '$stock','$weight','$description','$photo')");
    }

}