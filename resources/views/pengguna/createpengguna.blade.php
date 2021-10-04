@extends('master')
@section('content')
    <section id="createsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-user-plus pr-2" style="font-size: 15px;"></i> <span>Data Pengguna</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container pt-4">
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="">
                                {{-- <label for="" class="form-label">NISN</label> --}}
                                <input type="hidden" class="form-control @error('role') is-invalid @enderror" id="" value="member" name="role">
                                @error('role')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="" name="name" >
                                @error('name')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tlp" class="form-label">No Telepone</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="tlp" value="" name="tlp" >
                                @error('tlp')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">-- Pilih satu --</option>
                                    <option value="laki-laki">Laki - laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                @error('alamat')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label> 
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="" >
                                @error('email')
                                <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="" value="" name="password" >
                                @error('password')
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