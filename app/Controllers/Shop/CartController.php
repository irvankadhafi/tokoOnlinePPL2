<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use Wildanfuady\WFcart\WFcart;

class CartController extends BaseController
{
  public function __construct() {
    $this->product = new ProductModel();
    $this->cart = new WFcart();
    helper('form');
  }

  public function index()
  {
    $session = session('cart');
    $data['items'] = $this->cart->totals();
    $data['total'] = $this->cart->count_totals();
    $data['total_array'] = is_array($session)? array_values($session): array();
    return view('shop/v_cart', $data);
  }

  public function add($id = null)
  {
    $product = $this->product->getProduct($id);
    if($product != null){ // jika product tidak kosong
        $item = [
            'id'        => $product['id'],
            'name'      => $product['name'],
            'price'     => $product['price'],
            'weight'     => $product['weight'],
            'photo'     => $product['photo'],
            'quantity'  => 1
        ];
        // tambahkan product ke dalam cart
        $this->cart->add_cart($id, $item);
        // tampilkan nama product yang ditambahkan
        $product = $item['name'];
        // success flashdata
        session()->setFlashdata('success', "Berhasil memasukan {$product} ke karanjang belanja");
    } else {
        // error flashdata
        session()->setFlashdata('error', "Tidak dapat menemukan data product");
    }
//        return redirect()->to('/product');
    return redirect()->to('/');
  }

  // function untuk update cart berdasarkan id dan quantity
  public function update()
  {
      // update cart
      $this->cart->update();
      return redirect()->to('/cart');
  }

  // function untuk menghapus cart berdasarkan id
  public function remove($id = null)
  {
      // cari product berdasarkan id
      $product = $this->product->getProduct($id);

      // cek data product
      if($product != null){ // jika product tidak kosong
          // hapus keranjang belanja berdasarkan id
          $this->cart->remove($id);
          // success flashdata
          session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
      } else { // product tidak ditemukan
          // error flashdata
          session()->setFlashdata('error', "Tidak dapat menemukan data product");
      }
      return redirect()->to('/cart');
  }

}