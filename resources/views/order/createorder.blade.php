@extends('master')
@section('content')
    <section id="createsiswa">
        
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-cart-plus pr-2" style="font-size: 15px;"></i> <span>Data Pesanan Baru</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
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
                                <select name="id_paket" id="paket" class="select-picker form-control font-weight-lighter @error('id_paket') is-invalid @enderror mb-4" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                </select>
                                @error('id_paket')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                             <label for="" class="form-label">Harga</label>
                                <div id="harga">
                                    <input type="number" class="form-control mb-4" name="harga">
                                </div>
                                @error('id_paket')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            
                            
                            <button type="submit"  class="btn btn-primary float-right">Submit</button>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-12 ">
                        
                    </div>
                    
                </form>
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
                    },
               });
            });
        })
    </script>
@endpush