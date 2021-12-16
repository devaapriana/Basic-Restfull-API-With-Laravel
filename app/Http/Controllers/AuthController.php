<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
    public function auth()
    {
        $header = \request()->header("Authorization"); // basic xxxbase64encodexxx
        $keyauth = base64_decode(substr($header, 6)); // hilangkan text basic
        $arr = explode(':', $keyauth); // pisahkan email:password
        $email = $arr[0];
        $password = $arr[1];

        $data = (new Customers())->newQuery()
            ->where(['email' => $email])->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

        if ($data == null) {
            return $this->out(
                status: 'Gagal',
                error: ["Hasil tidak ditemukan"],
                code: 404
            );
        } else {
            if (Hash::check($password, $data->password)) {
                $data->token = hash('sha256', Str::random(10));
                unset($data->password);
                $data->update();

                return $this->out(data: $data, status: 'Oke');
            } else {
                return $this->out(status: 'Gagal', code: 401, error: ['Anda tidak memiliki wewenang']);
            }
        }
    }
}
