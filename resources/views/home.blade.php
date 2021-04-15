@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="ongkir-header text-center" style="padding: 3rem 1.5rem">
      <h1>Code Ongkir</h1>
      <p class="lead">Cek Ongkir ke Seluruh Kota dan Kabupaten di Indonesia</p>
    </div>

    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weigth-normal">Free</h4>
        </div>
        <div class="card-body">
          <i class="fas fa-truck" style="font-size: 80px;"></i>
          <ul class=" list-unstyled mt-3 mb-4">
            <li>Cek Ongkir Lebih Mudah</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weigth-normal">Pro</h4>
        </div>
        <div class="card-body">
          <i class="fas fa-box" style="font-size: 80px;"></i>
          <ul class=" list-unstyled mt-3 mb-4">
            <li>Lacak Lokasi Paket</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-primary">Get Started</button>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weigth-normal">Enterprise</h4>
        </div>
        <div class="card-body">
          <i class="fas fa-plane-departure" style="font-size: 80px;"></i>
          <ul class=" list-unstyled mt-3 mb-4">
            <li>Cek Ongkir Pengiriman Internasional</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-primary">Contact Us</button>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class=" my-0 font-weight-normal">Formulir Cek Ongkir</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="col">
              <h5 class=" text-muted">Asal Pengiriman</h5>
              <div class="form-group">
                <label for="">Provinsi</label>
                <select name="origin_province" class="form-control" id="">
                  <option value="" disabled selected>-</option>
                  @foreach ($province as $code => $title)
                    <option value="{{ $code }}">{{ $title }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">Kota/Kabupaten</label>
                <select name="origin_city" class="form-control" id="">
                  <option value="" disabled selected>-</option>
                </select>
              </div>
              <h5 class=" text-muted">Tujuan Pengirim:</h5>
              <div class="form-group">
                <label for="">Kota/Kabupaten</label>
                <select name="destination_city" class="form-control" id="destination_city">
                  <option value="" disabled selected>-</option>
                </select>
              </div>
            </div>
            <div class="col">
              <h5 class=" text-muted">Pilih Expedisi:</h5>
              @foreach ($courier as $code => $title)
                <div class=" form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="courier[]" id="courier-{{ $code }}"
                    value="{{ $code }}">
                  <label class="form-check-label" for="courier-{{ $code }}">{{ $title }}</label>
                </div>
              @endforeach

            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
