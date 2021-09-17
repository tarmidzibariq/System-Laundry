@extends('master')
@section('content')
    <section id="createsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-edit pr-2" style="font-size: 15px;"></i> <span>Edit Data</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="{{route('outlet.update',[$outlet->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Toko</label> 
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$outlet->nama}}" id="" >
                                @error('nama')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No Telephone</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="" value="{{$outlet->tlp}}" name="tlp" >
                                @error('tlp')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <textarea name="alamat" id="deks" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror"  maxlength="250">{{ $outlet->alamat }}</textarea>
                                <p class="mt-2" id="jk" style="opacity: 45%">Jumlah Karakter : <span id="outdeks">0</span>/250</p>
                                @error('tlp')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <button type="submit"  class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </section>
@endsection
@push('script')
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