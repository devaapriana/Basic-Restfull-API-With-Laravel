<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authorization');
    }


    public function findAll()
    {
        $data = Products::paginate(20, ['id', 'title', 'category', 'price', 'stock', 'free_shipping', 'rate']);

        if (count($data) == 0) {
            return $this->out(data: [], status: 'Kosong', code: 204);
        } else {
            return $this->out(data: $data, status: 'Ok');
        }
    }

    public function findOne(Products $produk)
    {
        dd($produk);
        return $this->out(data: $produk, status: 'Ok');
    }
}
