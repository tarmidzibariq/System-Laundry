@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-list pr-2" style="font-size: 15px;"></i> <span>Data Siswa</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
                <a href=""><button class="btn mt-4 text-white" style="background-color:#43D39E;"><i class="fas fa-user-plus mr-1"></i> Tambah Data</button></a>
                {{-- <a href="{{route('crudsiswa.cetaksiswa')}}"><button class="btn btn-primary mt-4 text-white" ><i class="fas fa-file-pdf mr-1"></i> Print PDF</button></a> --}}

                {{-- @if ($message = Session::get('success'))
                  <div class="alert bg-success text-white alert-dismissible mt-3">
                      <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                      <span class="font-weight-semibold">Success!</span> {{$message}} 
                  </div>   
                @endif --}}
                <div class="table-responsive">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NAMA MEMBER</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user as $usr)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$usr->name}}</td>
                          <td>{{$usr->email}}</td>
                          {{-- <td>{{$usr->}}</td> --}}
                          {{-- <td class="text-center">
                            <form action="{{route('crudsiswa.delete',$sis->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                                <i class="fas fa-search text-primary"></i>&ensp; 
                                <a href="{{ route('crudsiswa.editsiswa', [$sis->id]) }}">
                                  <i class="fas fa-edit " style="color: #f39c12"></i>&ensp;     
                                </a>
                                
                                <button type="submit" class=" " style="border: none; background-color: transparent;"><i class="fas fa-trash text-danger"></i></button> 
                            </form>    
                          </td> --}}
                        </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                </div>
            </div>
            
        </div>
        
    </section>
@endsection