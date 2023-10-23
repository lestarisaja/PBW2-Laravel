@extends('layouts.app')
<!-- NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 -->
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Rincian Pengguna</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                @php
                $gender = '';
                switch ($user->gender) {
                case 1:
                $gender = 'Pria';
                break;
                case 2:
                $gender = 'Wanita';
                break;
                }
                @endphp
                <form action="{{ route('userUpdate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id" value="{{ $user -> id }}">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"readonly>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}"readonly>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    </div> 

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $user->phoneNumber }}">
                    </div>

                    <div class="mb-3">
                        <label for="birtdate" class="form-label">Birthdate</label>
                        <input type="text" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}"readonly>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="{{ $user->agama }}">
                    </div>
                    
                    <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>Pria</option>
                        <option value="2" {{ $user->gender === 2 ? 'selected' : '' }}>Wanita</option>
                        </option>
                    </select>
                    </div>
                    <center>
                    <div class="mt-3">  
                    <button style="background-color:blue;" type="submit" class="btn btn-primary" >Simpan Perubahan</button>
                    <a href style="background-color:red; "{{ route('koleksi') }}" class="btn btn-primary">Back</a>
                    </div> 
                </form></center>
        </div>
    </div>
</div>
</div>
@endsection