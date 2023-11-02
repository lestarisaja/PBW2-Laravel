@extends('layouts.app')
<!-- NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 -->
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Manage Transaction</div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
