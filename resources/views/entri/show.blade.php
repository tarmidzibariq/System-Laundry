@extends('master')
@section('content')
    <section id="createsiswa">
        
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-cart-plus pr-2" style="font-size: 15px;"></i> <span>Data Pesanan</span>
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
                                            <label for="" class="form-label">Pengguna</label>
                                            <span class="form-control" style="text-transform: capitalize">{{ $user->name }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Member</label>
                                            <span class="form-control" style="text-transform: capitalize">{{ $member->nama }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Outlet</label>
                                            <span class="form-control" style="text-transform: capitalize">{{ $outlet->nama }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Paket</label>
                                            <span class="form-control">{{ $paket->nama_paket }}</span>
                                        </div>
                                        <div class="mb-3">
                                             <label for="" class="form-label">Diskon</label>
                                             <span class="form-control">{{ number_format($transaksi->diskon) }}%</span>
                                        </div>
                                        <div class="mb-3">
                                             <label for="" class="form-label">Pajak</label>
                                             <span class="form-control">Rp. {{ number_format($transaksi->pajak) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        
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
                                </div>
                                <a class="btn btn-success mt-2 " href="{{ route('entri.index') }}">Kembali</a>
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