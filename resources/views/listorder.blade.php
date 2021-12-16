@extends('template')

@section('konten')

    @include('modalorder')

    <table class="table table-border table-stripped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Customer</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table> 
    
    <script src="{{url('assets/pages/listorder.js')}}"></script>
@endsection