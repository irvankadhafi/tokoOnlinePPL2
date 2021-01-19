<?php
namespace App\Models;
use CodeIgniter\Model;

class OngkirModel extends Model{

    protected $table = "ongkir";
    public function getDataOngkir()
    {
        return $this->db->table($this->table)->get();
    }
    public function getKecamatan($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

}