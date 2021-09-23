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
                                <select name="id_outlet" id="" class="select-picker form-control  font-weight-lighter @error('id_outlet') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    @foreach ($outlet as $item)
                                        <option value="{{$item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_outlet')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="" class="form-label">Nama Paket</label>
                                <select name="id_outlet" id="" class="select-picker form-control  font-weight-lighter @error('id_outlet') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    @foreach ($outlet as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_outlet')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div> --}}
                            
                            
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Deksripsi

            $('#deks').keyup(function () {
                var out = $('#deks').val();
                $('#outdeks').html('<span>'+out.length +'</span>');

                if (out.length >= 250) {
                    $('#jk').css({'opacity':'100%'});
                }else{
                    $('#jk').css({'opacity':'45%'});
                }
            });

            // AKhir Deksripsi
        })
    </script>
@endpush