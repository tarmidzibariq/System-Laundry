@extends('master')
@section('content')
    <section id="createsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-user-plus pr-2" style="font-size: 15px;"></i> <span>Edit Data Toko</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="{{route('entri.update',[$transaksi->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" id="" class="select-picker form-control  font-weight-lighter @error('status') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    <option value="pending"{{ (old('status') ?? $transaksi->status) == 'pending' ? 'selected' : '' }}>pending</option>
                                    <option value="verifikasi"{{ (old('status') ?? $transaksi->status) == 'verifikasi' ? 'selected' : '' }}>verifikasi</option>
                                    <option value="pesanan_diambil"{{ (old('status') ?? $transaksi->status) == 'pesanan_diambil' ? 'selected' : '' }}>pesanan diambil</option>
                                    <option value="laundry"{{ (old('status') ?? $transaksi->status) == 'laundry' ? 'selected' : '' }}>laundry</option>
                                    <option value="selesai_laundry"{{ (old('status') ?? $transaksi->status) == 'selesai_laundry' ? 'selected' : '' }}>selesai laundry</option>
                                    <option value="barang_dikirim"{{ (old('status') ?? $transaksi->status) == 'barang_dikirim' ? 'selected' : '' }}>barang dikirim</option>
                                    <option value="barang_diterima"{{ (old('status') ?? $transaksi->status) == 'barang_diterima' ? 'selected' : '' }}>barang diterima</option>
                                </select>
                                @error('status')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Pembayaran</label>
                                <select name="dibayar" id="" class="select-picker form-control  font-weight-lighter @error('dibayar') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    <option value="belum_dibayar"{{ (old('dibayar') ?? $transaksi->dibayar) == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                    <option value="dibayar"{{ (old('dibayar') ?? $transaksi->dibayar) == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                                </select>
                                @error('dibayar')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit"  class="btn btn-primary float-right">Submit</button>
                        </div>
                        <div class="col-md-6">
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
    {{-- <script>
        $('.selectpicker').selectpicker();
    </script> --}}
@endpush