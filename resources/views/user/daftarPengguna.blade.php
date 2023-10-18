<!-- NAMA : LESTARI
KELAS: D3IF-46-03
NIM  :  -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Manage Users</div>
        <div class="card-body overflow-x-auto">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module'])}}
@endpush