@extends('layouts.app')
<!--NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 -->
@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight: bold;">Rincian Koleksi</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                @php
                $jenisKoleksi = '';
                switch ($collection->jenisKoleksi) {
                case 1:
                $jenisKoleksi = 'Buku';
                break;
                case 2:
                $jenisKoleksi = 'Majalah';
                break;
                case 3:
                $jenisKoleksi = 'Cakram Digital';
                break;
                }
                @endphp
                <form action="{{ route('koleksiUpdate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id" value="{{ $collection -> id }}">
                        <label for="namaKoleksi" class="form-label">Nama Koleksi</label>
                        <input type="text" class="form-control" id="namaKoleksi" name="namaKoleksi" value="{{ $collection->namaKoleksi }}">
                    </div>
                    
                    <div class="form-group">
                    <label for="jenisKoleksi">Jenis Koleksi</label>
                    <select name="jenisKoleksi" id="jenisKoleksi" class="form-control">
                        <option value="1" {{ $collection->jenisKoleksi === 1 ? 'selected' : '' }}>Buku</option>
                        <option value="2" {{ $collection->jenisKoleksi === 2 ? 'selected' : '' }}>Majalah</option>
                        <option value="3" {{ $collection->jenisKoleksi === 3 ? 'selected' : '' }}>Cakram Digital
                        </option>
                    </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahKoleksi" class="form-label">Jumlah Koleksi</label>
                        <input type="text" class="form-control" id="jumlahKoleksi" name="jumlahKoleksi" value="{{ $collection->jumlahKoleksi }}">
                    </div>

                    <div class="mb-3">
                        <label for="namaPengarang" class="form-label">Nama Pengarang</label>
                        <input type="text" class="form-control" id="namaPengarang" name="namaPengarang" value="{{ $collection->namaPengarang }}">
                    </div>

                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" value="{{ $collection->tahunTerbit }}">
                    </div>
                    <center>
                    <button style="background-color:blue;" type="submit" class="btn btn-primary" >Simpan Perubahan</button>
                    <a href style="background-color:red; "{{ route('koleksi') }}" class="btn btn-primary">Back</a>
                </form></center>
        </div>
    </div>
</div>
</div>
@endsection