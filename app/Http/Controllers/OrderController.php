<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public function __construct()
    {
        $this->middleware('authorization');
    }

    public function findOne(Orders $order)
    {
        return $this->out(data: $order, status: 'Ok');
    }

    public function findAll()
    {
        $order = Orders::query()
            ->leftJoin('customers', 'customers.id', '=', 'orders.customer_id')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id');

        if (request()->has('q')) {
            $q = request('q');
            $order->where('products.title', 'like', "%$q%");
        }



        $data = $order->paginate(
            10,
            [
                'orders.*',
                'customers.first_name',
                'customers.last_name',
                'customers.address',
                'customers.city',
                'products.title as product_title'
            ]
        );


        return $this->out(data: $data, status: 'Ok');
    }

    public function store()
    {
        $product = Products::find(request('product_id'));

        if ($product == null) {
            return $this->out(status: 'Gagal', code: 404, error: ['Produk tidak ditemukan']);
        }

        $order = new Orders();
        $order->order_date = Carbon::now('Asia/Jakarta');
        $order->product_id = $product->id;
        $order->customer_id = request('customer_id');
        $order->qty = request('qty');
        $order->price = $product->price;

        if ($order->save() == true) {
            return $this->out(data: $order, status: 'Ok', code: 201);
        } else {
            return $this->out(status: 'Gagal', error: ['Order gagal disimpan'], code: 540);
        }
    }

    public function update(Orders $order)
    {
        $product = Products::find(request('product_id'));


        if ($product == null) {
            return $this->out(status: 'Gagal', code: 404, error: ['Produk tidak ditemukan']);
        }

        $order->product_id = $product->id;
        $order->customer_id = request('customer_id');
        $order->qty = request('qty');
        $hasil = $order->save();

        return $this->out(
            status: $hasil ? 'OK' : 'Gagal',
            data: $hasil ? $order : null,
            error: $hasil ? null : ['gagal merubah data'],
            code: $hasil ? 201 : 504
        );
    }

    public function delete(Orders $order)
    {
        $hasil = $order->delete();

        return $this->out(
            status: $hasil ? 'OK' : 'Gagal',
            data: $hasil ? $order : null,
            error: $hasil ? null : ['Gagal hapus data'],
            code: $hasil ? 200 : 504,
        );
    }
}
