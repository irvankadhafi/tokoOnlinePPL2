<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;
use App\Models\PenjualanModel;
use App\Models\ProductModel;
use App\Models\ProsesJualModel;
use Wildanfuady\WFcart\WFcart;

class PenjualanController extends BaseController
{
    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->proses_jual = new ProsesJualModel();
        $this->product = new ProductModel();
        $this->cart = new WFcart();
        helper('form');
        helper('date');
    }

    public function customerForm()
    {
        return view('shop/v_customer_form');
    }

    public function orderConfirm()
    {
        if($this->request->getMethod() == 'post'){
            $session = session('cart');
            $data =[
                'items' => $this->cart->totals(),
                'total' => $this->cart->count_totals(),
                'total_weight' => $this->cart->count_weight(),
                'total_array'=> is_array($session)? array_values($session): array(),
                'idtrx'=>$this->idPenjualan(),
                'penerima'=>$this->request->getPost('cus_name'),
                'alamat'=>$this->request->getPost('cus_address'),
                'kecamatan'=>$this->request->getPost('cus_kecamatan'),
                'kota'=>$this->request->getPost('cus_city'),
                'nohp'=>$this->request->getPost('cus_phone'),
            ];
            return view('shop/v_checkout', $data);
        }else{
            return redirect()->to('/customer/form');
        }
    }
    //Mengembalikan id penjualan dengan prefix TRX
    public function idPenjualan()
    {
        $new_id = $this->penjualan->get_idmax();
        if ($new_id>0){
            foreach ($new_id as $key){
                $auto_id = $key->id;
            }
        }
        return $this->penjualan->get_newid($auto_id,'TRX'); //TRX00001
    }
}
