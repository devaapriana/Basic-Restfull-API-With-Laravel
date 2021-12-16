<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authorization');
    }

    public function findAll()
    {
        $customer = Customers::paginate(10);

        if (!$customer) {
            return $this->out(data: null, status: 'Gagal', error: 'Kesalahan pada saat meminta data', code: 404);
        }

        return $this->out(
            data: $customer,
            status: 'Oke',
            error: 'Berhasil mendapatkan data',
            code: 200
        );
    }
}
