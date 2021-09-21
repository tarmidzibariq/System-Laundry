@extends('master')
@section('content')
    <section id="crudsiswa">
        <div class="card-head">
            <div class="container text-white">
                <div style="font-size: 15px; padding-top: 14px;" >
                    <i class="fas fa-list pr-2" style="font-size: 15px;"></i> <span>Data Paket</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="container">
                <a href="{{ route('paket.createpaket') }}"><button class="btn mt-4 text-white" style="background-color:#3FC5F0;"><i class="fas fa-plus mr-1"></i> Tambah Data</button></a>
                {{-- <a href="{{route('crudsiswa.cetaksiswa')}}"><button class="btn btn-primary mt-4 text-white" ><i class="fas fa-file-pdf mr-1"></i> Print PDF</button></a> --}}
                <div class="table-responsive">
                  <table class="table table-bordered mt-2 table-hover">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">NO</th>
                          <th scope="col">NAMA OUTLET</th>
                          <th scope="col">JENIS</th>
                          <th scope="col">NAMA PAKET</th>
                          <th scope="col">HARGA</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($paket as $item)
                            
                        <tr>
                          <th scope="row" class="text-center">{{$loop->iteration}}</th>
                          <td>{{$item->outlets->nama}}</td>
                          <td>{{$item->jenis}}</td>
                          <td>{{$item->nama_paket}}</td>
                          <td>{{number_format($item->harga)}}</td>
                          <td class="text-center">
                            <form action="{{route('paket.delete',$item->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                                
                                <a href="{{ route('paket.editpaket', [$item->id]) }}">
                                  <i class="fas fa-edit " style="color: #f39c12"></i>&ensp;     
                                </a>
                                |&ensp;
                                <button type="submit" class=" " style="border: none; background-color: transparent;"><i class="fas fa-trash text-danger"></i></button> 
                            </form>    
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-left">
                    
                        {{-- {{ $outlet->links() }} --}}
                    
                </div>
            </div>
            
        </div>
        
    </section>
@endsection