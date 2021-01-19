<?php
namespace App\Controllers\Shop;
use TCPDF;
use App\Controllers\BaseController;
use App\Models\OngkirModel;
use App\Models\PenjualanModel;
use App\Models\ProductModel;
use App\Models\ProsesJualModel;
use Wildanfuady\WFcart\WFcart;

class ProsesJualController extends BaseController
{
    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->proses_jual = new ProsesJualModel();
        $this->product = new ProductModel();
        $this->ongkir = new OngkirModel();
        $this->cart = new WFcart();
        helper('form');
        helper('date');
    }

    public function invoice()
    {
        if($this->request->getMethod() == 'post'){
            $session = session('cart');
            $session2 = session();
            $ongkir = $this->ongkir->where('kecamatan_tujuan',$this->request->getPost('cus_kecamatan'))->first();

            $data =[
                'items' => $this->cart->totals(),
                'total' => $this->cart->count_totals(),
                'total_weight' => $this->request->getPost('total_berat'),
                'total_array'=> is_array($session)? array_values($session): array(),
                'idtrx'=>$this->idPenjualan(),
                'penerima'=>$this->request->getPost('cus_name'),
                'alamat'=>$this->request->getPost('cus_address'),
                'kecamatan'=>$ongkir['id'],
                'namaKecamatan'=>$ongkir['kecamatan_tujuan'],
                'kota'=>$this->request->getPost('cus_city'),
                'nohp'=>$this->request->getPost('cus_phone'),
                'total_harga'=>$this->request->getPost('total_semua'),
                'total_harga_ongkir'=>$this->request->getPost('total_ongkir')
            ];
            // $_SESSION['dataItems'] = $data;
            // $this->response->setJSON($_SESSION['dataItems']);
            $this->penjualan->insertPenjualan($data);
            $this->proses_jual->insertProsesJual($data);
            unset($_SESSION['cart']);

            return view('shop/v_invoices', $data);
        }else{
            return redirect()->to('/cart');
        }
    }
    public function exportInvoice()
    {
        
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
