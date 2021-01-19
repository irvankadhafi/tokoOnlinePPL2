<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;
use App\Models\ProductModel;


class ProductController extends BaseController
{
    public function __construct()
    {
      $this->product = new ProductModel();
    }
	public function index()
	{
        $session = session('cart');
        $data['total_array'] = is_array($session)? array_values($session): array();
        $data['items'] = $this->product->findAll();
		return view('shop/v_home',$data);
	}

	public function store()
	{
        $fileGambar = $this->request->getFile('productPhoto');
        $fileGambar->move('uploads/products',date('m-d-Y_H:i:s').'.'.$fileGambar->guessExtension());
        $namaGambar = $fileGambar->getName();

        $data =[
          'name'=>$this->request->getPost('productName'),
          'price'=>$this->request->getPost('productPrice'),
          'stock'=>$this->request->getPost('productStock'),
          'weight'=>$this->request->getPost('productWeight'),
          'description'=>$this->request->getPost('productDesc'),
          'photo'=> $namaGambar,
        ];

        $this->product->create($data);
        return redirect()->to('/');
  }

}
