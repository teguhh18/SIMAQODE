@extends('layouts.main')


@section('container') 
<div class="card mb-3 mx-auto" style="max-width: 640px;">
    <div class="row no-gutters">
        <div class="col-md-8 pr-3">
            <img src="img/lab.jpg" class="card-img" alt="..." style="width: 100%; height: 100%;">
        </div>
        <div class="col-md-4">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Pilih Peminjaman</h5>
                
                <button type="button" class="btn btn-secondary mb-2">
                  <i class="fas fa-swatchbook mr-2"></i> ASET
                </button>
                {{-- <button type="button" class="btn btn-secondary" href="/ruangan">
                  <i class="fas fa-home mr-2"></i> RUANGAN
                </button> --}}

                <a href="/ruangan" class="btn btn-secondary">
                  <i class="fas fa-home mr-2"></i> RUANGAN
                </a>
            </div>
        </div>
    </div>
  </div>

 @endsection

   

    
    