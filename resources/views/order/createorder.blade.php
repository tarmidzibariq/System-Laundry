@extends('master')
@section('content')
    <section id="createsiswa">
         
        <div class="row">
            <div class="col-md-8">
                <div class="card-head">
                    <div class="container text-white">
                        <div style="font-size: 15px; padding-top: 14px;" >
                            <i class="fas fa-cart-plus pr-2" style="font-size: 15px;"></i> <span>Data Pesanan Baru</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="container pt-4">
                        <div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 40px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div style="font-size: 13px;">
                                &nbsp;Harap sebelum order melakukan <a href="{{ route('regispel.createmember') }}"><u>Registrasi Pelanggan</u></a>
                            </div>
                        </div>  
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Member</label>
                                        <select name="id_member" id="member" class="select-picker form-control  font-weight-lighter @error('id_member') is-invalid @enderror" data-live-search="true">
                                            <option value="">Pilih satu</option>
                                            @foreach ($member as $itm )
                                                <option value="{{ $itm->id }}">{{ $itm->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_member')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Toko</label>
                                        <select name="id_outlet" id="outlet" class="select-picker form-control  font-weight-lighter @error('id_outlet') is-invalid @enderror" data-live-search="true">
                                            <option value="">Pilih satu</option>
                                            @foreach ($outlet as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_outlet')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <label for="" class="form-label">Nama Paket</label>
                                        <select name="id_paket" id="paket" class="select-picker form-control font-weight-lighter @error('id_paket') is-invalid @enderror mb-3" data-live-search="true">
                                            <option value="">Pilih satu</option>
                                        </select>
                                        @error('id_paket')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    <div class="mb-3">
                                        <label for="" class="form-label">Harga</label>
                                        <div id="harga">
                                            {{-- <input type="number" class="form-control mb-4" name="harga"> --}}
                                            <span class="form-control" name="harga"></span>
                                        </div>
                                        @error('id_paket')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Diskon</label>
                                        <div id="diskon">
                                            {{-- <input type="number" class="form-control mb-4" name="tgl" value=""> --}}
                                            <span class="form-control" name="diskon"></span>
                                        </div>
                                        @error('id_paket')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Pajak</label>
                                        <div id="pajak">
                                            {{-- <input type="number" class="form-control mb-4" name="tgl" value=""> --}}
                                            <span class="form-control" name="pajak"></span>
                                        </div>
                                        @error('id_paket')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Total Harga</label>
                                        <div id="total">
                                            {{-- <input type="number" class="form-control mb-4" name="tgl" value=""> --}}
                                            <span class="form-control" name="biaya"></span>
                                        </div>
                                        @error('id_paket')
                                            <small class="text-danger ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="id_user" id="">
                                    <input type="date" class="d-none" name="tgl" value="{{ date("Y-m-d") }}">    
                                    <input type="date" class="d-none" name="batas_waktu" value="{{$batas}}">
                                    <input type="date" class="d-none" name="tgl_bayar" value="{{$batas}}">
                                    
                                    
                                    <button type="submit"  class="btn btn-primary float-right">Submit</button>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-12 ">
                                
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-head">
                    <div class="container text-white">
                        <div style="font-size: 15px; padding-top: 14px;" >
                            <i class="fas fa-info-circle pr-2" style="font-size: 15px;"></i> <span>Data Pesanan Baru</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="container pt-4">
                        <h6 style="font-size: 14px;">Langkah - langkah membuat pesanan</h6>
                        <ul style="font-size: 12px; line-height: 18px;">
                            <li>Pilih member yang telah diregistrasi jika belum <a href="{{ route('regispel.createmember') }}">Klik disini</a></li>
                            <li>Pilih salah satu Toko</li>
                            <li>Pilih salah satu paket yang ingin dipesan</li>
                            <li>Klik Submit untuk membuat pesanan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#outlet').change(function () {
               let cid=$(this).val();
               $.ajax({
                    url: '/order/getPaket',
                    type: 'post',
                    data: 'cid='+cid+'&_token={{csrf_token()}}',
                    success: function (result) {
                        $('#paket').html(result);
                        $('#harga').html('<span class="form-control" name="harga"></span>');
                        $('#diskon').html('<span class="form-control" name="harga"></span>');
                        $('#pajak').html('<span class="form-control" name="harga"></span>');
                        $('#total').html('<span class="form-control" name="harga"></span>');
                    },
               });
            });
            $('#paket').change(function () {
               let cid=$(this).val();
               $.ajax({
                    url: '/order/getHarga',
                    type: 'post',
                    data: 'cid='+cid+'&_token={{csrf_token()}}',
                    success: function (result) {
                        $('#harga').html(result);
                        diskon = $('#hargatot').val() * .10;
                        total = $('#hargatot').val() - diskon + 2000;
                        $('#diskon').html('<span class="form-control">10%</span><input class="d-none" name="diskon" value="10"></input>');
                        $('#pajak').html('<span class="form-control">2000</span><input class="d-none" name="pajak" value="2000"></input>');
                        $('#total').html('<span class="form-control">'+ total +'</span><input class="d-none" name="biaya" value="'+total+'"></input>');
                    },
               });
            });
        })
    </script>
@endpush