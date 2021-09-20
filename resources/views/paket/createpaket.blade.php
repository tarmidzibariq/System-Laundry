@extends('master')
@section('content')
    <section id="createsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-user-plus pr-2" style="font-size: 15px;"></i> <span>Data Paket</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="{{ route('paket.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Outlet</label> 
                                <select name="id_outlet" id="" class="select-picker form-control  font-weight-lighter @error('id_outlet') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    @foreach ($outlet as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_outlet')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Paket</label>
                                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="" value="" name="nama_paket" >
                                @error('nama_paket')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Jenis</label>
                                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="" value="" name="jenis" >
                                @error('jenis')
                                <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="" value="" name="harga" >
                                @error('harga')
                                <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
@endpush