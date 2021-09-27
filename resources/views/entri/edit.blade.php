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
                                    <option value="baru"{{ (old('status') ?? $transaksi->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="proses"{{ (old('status') ?? $transaksi->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai"{{ (old('status') ?? $transaksi->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="diambil"{{ (old('status') ?? $transaksi->status) == 'diambil' ? 'selected' : '' }}>Diambil</option>
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