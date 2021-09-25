@extends('master')
@section('content')
    <section id="createsiswa">
        
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-users-cog pr-2" style="font-size: 15px;"></i> <span>Data Member</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="{{ route('regispel.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="" value="" name="nama" >
                                @error('nama')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Telephone</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="" value="" name="tlp" >
                                @error('tlp')
                                <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control  @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Satu</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <textarea name="alamat" id="deks" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror"  maxlength="250"></textarea>
                                <p class="mt-2" id="jk" style="opacity: 45%">Jumlah Karakter : <span id="outdeks">0</span>/250</p>
                                @error('alamat')
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