@extends('layouts.main')


@section('container') 

<h1 class="mb-3 text-center">Daftar Ruangan</h1>
@foreach ($ruangans as $ruangan)
<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{ asset('storage/' . $ruangan->foto) }}" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $ruangan->nama_ruang }}</h5>
          <p class="card-text">Kapasitas : {{ $ruangan->kapasitas }}</p>
          <p class="card-text">Tipe : {{ $ruangan->tipe_ruangan }}</p>
          
        </div>
      </div>
    </div>
  </div>
@endforeach

{{-- @dd($ruangans) --}}

 

 @endsection