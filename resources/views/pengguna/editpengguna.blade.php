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
                <form action="{{route('pengguna.update',[$user->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control " id="id" name="id"
                            value="" />
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label> 
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" id="" >
                                @error('email')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="">
                                {{-- <label for="" class="form-label">NISN</label> --}}
                                <input type="hidden" class="form-contro" id="" value="member" name="role">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">New Password <i class="fw-light"> *kosongkan jika diisi</i></label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="" value="" name="password">
                                @error('password')
                                    <small class="text-danger ">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" value="{{$user->name}}" name="name" >
                                @error('name')
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