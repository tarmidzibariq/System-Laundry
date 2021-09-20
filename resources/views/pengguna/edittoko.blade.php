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
                <form action="{{route('toko.update',[$user->id])}}" method="POST">
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
                                <label for="" class="form-label">Email</label> 
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}" id="" >
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
                            <div class="mb-3">
                                <label for="" class="form-label">Role</label>
                                <select name="role" id="" class="select-picker form-control  font-weight-lighter @error('role') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    <option value="admin"{{ (old('role') ?? $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kasir"{{ (old('role') ?? $user->role) == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                    <option value="owner"{{ (old('role') ?? $user->role) == 'owner' ? 'selected' : '' }}>Owner</option>
                                </select>
                                @error('role')
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
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Toko</label>
                                <select name="id_outlet" id="" class="select-picker form-control  font-weight-lighter @error('id_outlet') is-invalid @enderror" data-live-search="true">
                                    <option value="">Pilih satu</option>
                                    <option value="{{ $user->id_outlet }}" selected>{{ $user->outlets->nama }}</option>
                                    @foreach ($outlet as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    
                                   
                                </select>
                                @error('id_outlet')
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