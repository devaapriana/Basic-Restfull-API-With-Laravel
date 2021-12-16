@extends('template')

@section('konten')
    <div class="container-fluid col-md-3">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">Masuk ke sistem</div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Email</small>
                    </div>
                   
                    <div class="mb-3">
                        <label for="password" class="form-label">Email</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helppass">
                        <small id="helppass" class="text-muted">Password</small>
                    </div>

                    <button id="btn-login" class="btn btn-sm btn-primary float-end">Login</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('/assets/pages/login.js?v=3')}}"></script>
@endsection