<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
class DashboardController extends BaseController
{
	public function index()
	{
		return view('admin/v_home');
    }

    public function createProduct()
	{
		return view('admin/v_add_product');
    }

    public function listProduct()
	{
		return view('admin/v_list_product');
	}

}
