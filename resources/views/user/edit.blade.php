@extends('layouts.template')

@section('content')
    <form action="{{ route('user.update', $user['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> 
        @endif

        <div class="mb-3 row">
            <input type="hidden" class="form-control" id="name" name="passwordLama" value="{{ $user['password'] }}">

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
                </div>
            </div>
          
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Role :</label>
                <div class="col-sm-10">
                    <select name="role" id="role" class="form-select">
                        <option selected disabled hidden>Pilih</option>
                        <option value="Admin" {{ $user->role == 'admin' ? 'selected' : ''  }}>Admin</option>
                        <option value="Cashier" {{ $user->role == 'cashier' ? 'selected' : ''  }}>Cashier</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    
    </form>
@endsection



