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
                {{-- <form action="{{ route('order.store') }}" method="POST"> --}}
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Outlet</label>
                                            <span class="form-control" style="text-transform: capitalize">{{ $outlet->nama }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Paket</label>
                                            <span class="form-control">{{ $paket->nama_paket }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal Dipesan</label>
                                            <span class="form-control">{{ Carbon\Carbon::parse($transaksi->tgl)->isoFormat("D MMMM Y") }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Batas Tanggal</label>
                                            <span class="form-control">{{ Carbon\Carbon::parse($transaksi->batas_waktu)->isoFormat("D MMMM Y") }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal Dibayar</label>
                                            <span class="form-control">{{ Carbon\Carbon::parse($transaksi->tgl_bayar)->isoFormat("D MMMM Y") }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                             <label for="" class="form-label">Diskon</label>
                                             <span class="form-control">{{ number_format($transaksi->diskon) }}%</span>
                                        </div>
                                        <div class="mb-3">
                                             <label for="" class="form-label">Pajak</label>
                                             <span class="form-control">Rp. {{ number_format($transaksi->pajak) }}</span>
                                        </div>
                                       <div class="mb-3">
                                            <label for="" class="form-label">Biaya</label>
                                            <span class="form-control">Rp. {{ number_format($transaksi->biaya) }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Status</label>
                                            <span class="form-control" style="text-transform: capitalize">{{ $transaksi->status }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Pembayaran</label>
                                            @if ($transaksi->dibayar == 'belum_dibayar')
                                                <span class="form-control" style="text-transform: capitalize">belum dibayar</span>
                                            @endif
                                            @if ($transaksi->dibayar == 'dibayar')
                                                <span class="form-control" style="text-transform: capitalize">dibayar</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-success mt-2 " href="{{ route('order.riwayatorder') }}">Kembali</a>
                            </div>
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
                        $('#harga').html('<span class="form-control" name="harga"></span>');
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